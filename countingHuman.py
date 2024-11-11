import cv2
import imutils
import numpy as np
import argparse
import mysql.connector
from datetime import datetime, timedelta
import os

face_cascade = cv2.CascadeClassifier(cv2.data.haarcascades + 'haarcascade_frontalface_default.xml')

# Fungsi untuk koneksi ke database MySQL
def connect_to_database():
    return mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="iotproject"
    )

# Fungsi untuk menyimpan jumlah deteksi orang bersama dengan gambar
def insert_detection_count(person_count, image):
    db = connect_to_database()
    cursor = db.cursor()
    query = "INSERT INTO detection_log (time, person_count, image) VALUES (%s, %s, %s)"
    time = datetime.now()
    cursor.execute(query, (time, person_count, image))
    db.commit()
    cursor.close()
    db.close()
    print(f"Data inserted at {time} with count: {person_count} and image path: {image}")

# Fungsi untuk menyimpan gambar deteksi
def save_detection_image(frame, person_count):
    save_directory = r"D:\D-III Teknologi Informasi\IoT\iot\public\detections"
    if not os.path.exists("save_directory"):
        os.makedirs("save_directory")
    
    time_str = datetime.now().strftime("%Y%m%d_%H%M%S")
    filename = f"detection_{time_str}_{person_count}.jpg"
    file_path = os.path.join(save_directory, filename)

    cv2.imwrite(file_path, frame)
    print(f"Image saved: {filename}")
    
    return filename

# Fungsi untuk mendeteksi wajah pada frame
def detect(frame):
    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)
    faces = face_cascade.detectMultiScale(gray, scaleFactor=1.1, minNeighbors=5, minSize=(30, 30))
    person_count = len(faces)
    
    # Gambar persegi untuk setiap wajah yang terdeteksi
    for (x, y, w, h) in faces:
        cv2.rectangle(frame, (x, y), (x + w, y + h), (0, 255, 0), 2)
    
    cv2.putText(frame, 'Status : Detecting Person', (40, 40), cv2.FONT_HERSHEY_DUPLEX, 0.8, (255, 0, 0), 2)
    cv2.putText(frame, f'Total Person : {person_count}', (40, 70), cv2.FONT_HERSHEY_DUPLEX, 0.8, (255, 0, 0), 2)
    cv2.imshow('output', frame)
    
    return frame, person_count

# Deteksi melalui kamera
def detectByCamera(writer):
    video_url = "http://192.168.155.2:4747/video"
    video = cv2.VideoCapture(video_url)
    print('Detecting people using camera...')

    last_saved_time = datetime.now()  # Waktu saat data terakhir disimpan
    accumulated_person_count = 0       # Akumulasi jumlah orang

    while True:
        check, frame = video.read()
        if not check:
            print("Failed to capture video from camera.")
            break

        frame, person_count = detect(frame)
        accumulated_person_count = person_count  

        # Cek jika sudah 10 menit dari penyimpanan terakhir
        current_time = datetime.now()
        if (current_time - last_saved_time).total_seconds() >= 600:
            # Simpan gambar hanya ketika data deteksi akan dimasukkan ke database
            image_path = save_detection_image(frame, accumulated_person_count)
            insert_detection_count(accumulated_person_count, image_path)
            last_saved_time = current_time
            accumulated_person_count = 0  # Reset akumulasi deteksi

        if writer is not None:
            writer.write(frame)

        key = cv2.waitKey(1)
        if key == ord('q'):
            break

    video.release()
    cv2.destroyAllWindows()

# Fungsi utama untuk memulai deteksi
def humanDetector(args):
    camera = args["camera"]
    writer = None
    if args['output'] is not None:
        writer = cv2.VideoWriter(args['output'], cv2.VideoWriter_fourcc(*'MJPG'), 10, (640, 480))

    if camera:
        print('[INFO] Opening Web Cam.')
        detectByCamera(writer)

def argsParser():
    arg_parse = argparse.ArgumentParser()
    arg_parse.add_argument("-c", "--camera", action="store_true", help="Set this flag if you want to use the camera.")
    arg_parse.add_argument("-o", "--output", type=str, help="path to optional output video file")
    args = vars(arg_parse.parse_args())
    return args

if __name__ == "__main__":
    HOGCV = cv2.HOGDescriptor()
    HOGCV.setSVMDetector(cv2.HOGDescriptor_getDefaultPeopleDetector())
    
    args = argsParser()
    humanDetector(args)

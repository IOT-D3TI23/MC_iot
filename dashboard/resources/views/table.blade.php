@extends('layouts.layout')

@section('content')

<!-- DataTables CSS -->
<div class="container-fluid">

    <!-- Judul Halaman -->
    <h1 class="h3 m-2 text-gray-800">Tabel</h1>
    <p class="mb-4">
        DataTables adalah plugin pihak ketiga yang digunakan untuk membuat tabel demo di bawah ini.
        Untuk informasi lebih lanjut tentang DataTables, silakan kunjungi 
        <a target="_blank" href="https://datatables.net">dokumentasi resmi DataTables</a>.
    </p>

    <!-- Contoh DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Contoh DataTables</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center h5">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jumlah Orang</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getLog as $item)
                            <tr class="text-center">
                                <td>{{ $loop->iteration + ($getLog->currentPage() - 1) * $getLog->perPage() }}</td>
                                <td>{{$item -> time}}</td>
                                <td>{{$item -> person_count}}</td>
                                <td class="w-50"><img src="{{ URL::asset('detections/'.$item->image) }}" style="height: 25em;"></td>
                            </tr>
                        @endforeach
                        <!-- Tambahkan data lainnya sesuai kebutuhan -->
                    </tbody>
                </table>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $getLog->links('vendor.pagination.bootstrap-4') }}
                    </ul>
                  </div>
            </div>
        </div>
    </div>
</div>

@endsection



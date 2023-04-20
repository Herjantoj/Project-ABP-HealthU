@extends('layouts.admin')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard Admin HealthU</h1>
                </div><!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </div>

            <div class="container">
            <a href="{{ route('TambahDataDokter') }}" class="btn btn-success">Tambah Data +</a>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Spesialis</th>
                            <th scope="col">No_Telepon</th>
                            <th scope="col">Hari Praktik</th>
                            <th scope="col">Mulai Jam Praktik</th>
                            <th scope="col">Akhir Jam Praktik</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    @php
                        $no = 1;
                    @endphp

                    @foreach ($data as $row)
                        <tr>
                            <th scope="row">{{ $no++}}</th>
                            <td>{{ $row->nama}}</td>
                            <td>{{ $row->spesialis}}</td>
                            <td>0{{ $row->no_telepon}}</td>
                            <td>{{ $row->hari_praktik}}</td>
                            <td>{{ $row->awal_jam_praktik}}</td>
                            <td>{{ $row->akhir_jam_praktik}}</td>
                            <td>
                                <a href="/TampilkanData/{{ $row->id }}" class="btn btn-info">Edit</a>
                                <a href="/DeleteData/{{ $row->id }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>

                    @endforeach 
                        
                    </tbody>
                </table>                  
            </div>
        </div>

    </div>
@endsection



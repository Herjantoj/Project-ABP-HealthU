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
                    @foreach($appointments_columns as $appointment)
                        <th scope="col">{{ $appointment }}</th> 
                    @endforeach
                    </tr>
                    </thead>
                    <tbody>

                    @php
                        $no = 1;
                    @endphp

                        @foreach($appointments as $appointment)
                            <tr>
                                <td>{{$no += 1}}</td>
                                <td>{{$appointment['name']}}</td>
                                <td>{{$appointment['email']}}</td>
                                <td>{{$appointment['date']}}</td>
                                <td>{{$appointment['time']}}</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>                  
            </div>
        </div>

    </div>
@endsection



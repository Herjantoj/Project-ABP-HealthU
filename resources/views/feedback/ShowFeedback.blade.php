@extends('layouts.admin')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Feedback</h1>
                </div><!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </div>

            <div class="container">

        </div>
                <table class="table">
        <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $row)
            <tr>
                <th scope="row">{{$row->id}}</th>
                <td>{{$row->name}}</td>
                <td>{{$row->email}}</td>
                <td>{{$row->subject}}</td>
                <td>{{$row->message}}</td>
            </tr>
        @endforeach
        </tbody>
        </table>

    </div>
@endsection



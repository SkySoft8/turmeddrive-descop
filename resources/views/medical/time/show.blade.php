@extends('medical.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2"> {{$medicalTime->title}}</h1>
                        <a href="{{route('medical.time.edit', $medicalTime->id)}}" class='text-success'><i class="fas fa-pencil-alt"></i></a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    
                                    <tr>
                                        <td>Начало</td>
                                        <td>{{$medicalTime->time_start}}</td>
                                    </tr>
                                    <tr>
                                        <td>Конец</td>
                                        <td>{{$medicalTime->time_end}}</td>
                                    </tr>
                                    <tr>
                                        <td>Дни работы</td>
                                        <td>{{$medicalTime->time_date}}</td>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

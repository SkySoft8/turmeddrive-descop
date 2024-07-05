@extends('turoperator.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Время работы</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-1 mb-3">
                        <a href="{{route('turoperator.time.create')}}" class="btn btn-block btn-primary">Cоздать</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Начало</th>
                                        <th>Конец</th>
                                        <th>День</th>
                                        <th colturoperatorn="3" class="text-center">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($turoperatorTimes as $turoperatorTime)
                                        <tr>
                                            <td>{{$turoperatorTime->time_start}}</td>
                                            <td>{{$turoperatorTime->time_end}}</td>
                                            <td>{{$turoperatorTime->time_date}}</td>
                                            <td><a href="{{route('turoperator.time.show', $turoperatorTime->id)}}"><i
                                                            class="far fa-eye"></i></a></td>
                                            <td><a href="{{route('turoperator.time.edit', $turoperatorTime->id)}}"
                                                   class='text-success'><i class="fas fa-pencil-alt"></i></a></td>
                                            <td>
                                                <form action="{{route('turoperator.time.delete', $turoperatorTime->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent" l>
                                                        <i class="fas fa-trash text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
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

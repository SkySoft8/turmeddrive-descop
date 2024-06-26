@extends('medical.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Категории услуги</h1>
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
                        <a href="{{route('medical.product.create')}}" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th colspan="3" class="text-center">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($medicalProducts))
                                    @foreach($medicalProducts as $medicalProduct)
                                        <tr>
                                            <td>{{$medicalProduct->id}}</td>
                                            <td>{{$medicalProduct->title}}</td>
                                            <td><a href="{{route('medical.product.show', $medicalProduct->id)}}"><i
                                                            class="far fa-eye"></i></a></td>
                                            <td><a href="{{route('medical.product.edit', $medicalProduct->id)}}"
                                                   class='text-success'><i class="fas fa-pencil-alt"></i></a></td>
                                            <td>
                                                <form action="{{route('medical.product.delete', $medicalProduct->id)}}" method="post">
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
                                    @else
                                    @endif
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                </div>
            </div>
        </section>
        <section class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-3">

<div class="card card-primary">
<div class="card-header d-flex justify-content-between">
    <h3 class="card-title">Категории услуг</h3>
    <a href="{{route('medical.product.create')}}">Добавить</a>
</div>
<div class="card-body">
<table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название</th>
                                        <th colspan="3" class="text-center">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($medicalProducts))
                                    @foreach($medicalProducts as $medicalProduct)
                                        <tr>
                                            <td>{{$medicalProduct->id}}</td>
                                            <td><a href="#{{$medicalProduct->title}}">{{$medicalProduct->title}}</td>
                                            <td><a href="{{route('medical.product.edit', $medicalProduct->id)}}"
                                                   class='text-success'><i class="fas fa-pencil-alt"></i></a></td>
                                            <td>
                                                <form action="{{route('medical.product.delete', $medicalProduct->id)}}" method="post">
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
                                    @else
                                    @endif
                                </table>

</div>

</div>
<a class="nav-link active "  href="{{route('medical.item.create')}}" >Добавить</a>
</div>

<div class="col-md-9">
@if(isset($medicalProducts))
    @foreach($medicalProducts as $medicalProduct)    
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">
<li style="display:flex;" class="nav-item pr-2">
    <a class="nav-link active mr-5"  id="{{$medicalProduct->title}}" href="#{{$medicalProduct->title}}" data-toggle="tab">{{$medicalProduct->title}}</a>
</li>
</ul>
</div>
<div class="card-body">
<div class="tab-content">
<div class="tab-pane active" id="activity">
    @foreach($medicalItems as $medicalItem)
    <div class="tab-pane">
    {{$medicalItem->title}}
    {{$medicalItem->price}}
    <a href="{{route('medical.item.edit', $medicalItem->id)}}"class='text-success'>
    <i class="fas fa-pencil-alt"></i></a>
                                                <form action="{{route('medical.item.delete', $medicalItem->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent" l>
                                                        <i class="fas fa-trash text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            
    </div>
    @endforeach
  
</div>

</div>
</div>
</div>
@endforeach
@else
@endif
</div>

</div>
</section>
    </div>
    
@endsection

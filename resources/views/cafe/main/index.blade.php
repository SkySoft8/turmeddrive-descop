@extends('cafe.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Главная</h1>
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
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>10</h3>

                                <p>Мои посты</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-paste"></i>
                            </div>
                            <a href="{{route('cafe.post.index')}}" class="small-box-footer">Подобнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>10</h3>

                                <p>Категории</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-clipboard-list"></i>
                            </div>
                            <a href="{{route('cafe.category.index')}}" class="small-box-footer">Подобнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

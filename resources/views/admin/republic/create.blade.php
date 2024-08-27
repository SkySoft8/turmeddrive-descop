@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить регион</h1>
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
                <div class="col-12">
                    <form action="{{route('admin.republic.store')}}" method="POST" class="w-25">
                        @csrf
                        <div class="form-group w-100">
                            <label>Выберите страну</label>
                                <select name="district_id" id="country" class="form-control input-lg dynamic" data-dependent="state">
                                @foreach($country_list as $country)
                            <option value="{{ $country->id}}">{{ $country->name }}</option>
                         @endforeach
                    </select>
                            </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" id="state" class="form-control input-lg dynamic"  placeholder="Название региона">
                            @error('title')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" value="Добавить">
                    </form>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
@endsection

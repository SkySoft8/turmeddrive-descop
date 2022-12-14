@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование организации</h1>
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
                    <form action="{{route('admin.user.update', $user->id)}}" method="POST" class="w-25">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Название организации" value="{{$user->name}}">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email"  value="{{$user->email}}">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label>Выберите область/республику</label>
                            <select name="republic_id" class="form-control">
                                @foreach($republics as $republic)
                                    <option value="{{$republic->id}}"
                                            {{$republic->id == $user->republic_id ? ' selected' : '' }}>{{$republic->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-50">
                            <label>Выберите город</label>
                            <select name="city_id" class="form-control">
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}"
                                            {{$city->id == $user->city_id ? ' selected' : '' }}>{{$city->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-50">
                            <label>Выберите роль организации</label>
                            <select name="role" class="form-control">
                                @foreach($roles as $id => $role)
                                    <option value="{{$id}}"
                                            {{$id == $user->role ? ' selected' : '' }}>{{$role}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-50">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Обновить">
                    </form>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
@endsection

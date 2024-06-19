@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper ">
        <section class="content  d-flex justify-content-center">
                        <div class="card mt-5 p-3">
                        <h5>Вы уверенны, что хотите удалить этого пользователя? </h5>
                        <h3 class="py-2">{{$user->name}}</h3>
                        <div class="d-flex">
                        <a href="{{route('admin.user.index')}}" class='text-success'>
                            <button type="button" class="btn btn-warning">Отменить</button>
                        </a>
                        <form class="px-3" action="{{route('admin.user.delete', $user->id)}}"
                            method="post">
                            @csrf
                            @method('DELETE')
                            <button  type="submit" class="btn btn-danger ">Подтвердить</button>
                        </form>
                        </div>
                        </div>
        </section>
    </div>
@endsection
<style>
    .content{
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
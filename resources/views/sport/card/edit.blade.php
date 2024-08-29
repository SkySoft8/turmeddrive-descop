@extends('sport.layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование карточку спортбазы</h1>
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
                        <form action="{{route('sport.card.update', $sportCard->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="title" placeholder="Название центра"
                                       value="{{$sportCard->title}}">
                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <label> Email (для получения уведомлений:промокод,заказ) </label>
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="user_email" placeholder="Email"
                                       value="{{$sportCard->user_email}}">
                                @error('title')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <label> Краткое описание </label>
                            <div class="form-group">
                                <textarea class="textarea" rows='5' cols='70' name="desc">{{$sportCard->desc}}</textarea>
                                <div class="counter">
                                    <span class="current">0</span>&nbsp;/
                                    <span class="total">225</span>
                                </div>
                                @error('content')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="textarea1"  rows='10' cols='70' name="content">{{$sportCard->content}}</textarea>
                                <div class="counter1">
                                    <span class="current1">0</span>&nbsp;/
                                    <span class="total">225</span>
                                </div>
                                @error('content')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="address" placeholder="Укажите локацию"
                                       value="{{$sportCard->address}}">
                                @error('address')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Обновить превью</label>
                                <div class="mb-3 d-flex">
                                    <img class="img-thumbnail" style="height: 30vh;"
                                         src="{{ url('storage/' . $sportCard->preview_image)}}" alt="preview_image">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label">Выберите изображение</label>
                                    </div>
                                </div>
                                @error('preview_image')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Обновить логотип</label>
                                <div class="mb-3 d-flex">
                                    <img class="img-thumbnail" style="height: 30vh;"
                                         src="{{ url('storage/' . $sportCard->logo)}}" alt="logo">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="logo">
                                        <label class="custom-file-label">Выберите изображение</label>
                                    </div>
                                </div>
                                @error('logo')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <input type="tel" class="form-control" name="phone" placeholder="Введите номер телефона"
                                       value="{{$sportCard->phone}}">
                                @error('phone')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="name_link" placeholder="Обновить название ссылки на Вашу организацию"
                                       value="{{$sportCard->name_link}}">
                                @error('message')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="link" placeholder="Обновить ссылку на Вашу организацию"
                                       value="{{$sportCard->link}}">
                                @error('phone')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="coordinate_l" placeholder="Введите координаты до запятой"
                                       value="{{$sportCard->coordinate_l}}">
                                @error('coordinate')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="coordinate_r" placeholder="Введите координаты после запятой"
                                       value="{{$sportCard->coordinate_r}}">
                                @error('coordinate')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                            <label>Выберите страну</label>
                            <select name="district_id" id="country" class="form-control input-lg dynamic" data-dependent="state">
                                @foreach($districts as $district)
                                    <option value="{{$district->id}}"
                                            {{$district->id == $sportCard->district_id ? ' selected' : '' }}>{{$district->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-50">
                            <label>Выберите регион (область)</label>
                            <select name="republic_id" id="state" class="form-control input-lg dynamic" data-dependent="city">
                                @foreach($republics as $republic)
                                    <option value="{{$republic->id}}"
                                            {{$republic->id == $sportCard->republic_id ? ' selected' : '' }}>{{$republic->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group w-50">
                            <label>Выберите город</label>
                            <select name="city_id" id="city" class="form-control">
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}"
                                            {{$city->id == $sportCard->city_id ? ' selected' : '' }}>{{$city->title}}</option>
                                @endforeach
                            </select>
                        </div>
                            <div class="form-group w-50">
                                <label>Тэги</label>
                                <select class="select2" name="sport_cardTag_ids[]" multiple="multiple"
                                        data-placeholder="Выберите услугу" style="width: 100%;">
                                    @foreach($sportCardTags as $sportCardTag)
                                        <option
                                        <option
                                                {{is_array( $sportCard->tags->pluck('id')->toArray()) && in_array($sportCardTag->id, $sportCard->tags->pluck('id')->toArray()) ? ' selected' : ''}}
                                                value="{{$sportCardTag->id}}">{{$sportCardTag->title}}
                                        </option>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Обновить">
                            </div>
                            <div class="form-group w-25">
                                <a style="width: 300px;height: 40px;"
                                   href="{{route('sport.card.image', $sportCard->id)}}"
                                   class="btn btn-block btn-primary"> Обновить фото</a>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

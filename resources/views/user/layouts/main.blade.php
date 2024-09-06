<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
</head>
<body>
<div class="wrapper">
    <header>
        <div class="nav">
            <a href="http://127.0.0.1:8000/"><img src="{{asset('assets/img/logo-s.png')}}"></a>
            <div class="mob-menu-div">
                <img onclick="openBlockMenu('mob-menu')" class="burger" src="{{asset('assets/img/menu.svg')}}">
                <div id="mob-menu" class="menu">
                    <ul>
                        <li><a href="http://127.0.0.1:8000/catalog/medical">Каталог</a></li>
                        <li><a href="#">О проекте</a>
                            <ul>
                                <li><a href="http://127.0.0.1:8000/rules-organization">Для организаций</a></li>
                                <li><a href="http://127.0.0.1:8000/rules-client">Для клиентов</a></li>
                                <li><a href="http://127.0.0.1:8000/ecosistem">Экосистема турмеддрайвер</a></li>
                            </ul>
                        </li>
                        <li><a href="http://127.0.0.1:8000/contact">Контакты</a></li>
                    </ul>
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-outline-primary" value="Выйти">
                        </form>
                    </li>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer>
        <div>
            <div class="menu">
                <ul>
                    <li><a href="http://127.0.0.1:8000/catalog/medical">Каталог</a></li>
                    <li><a href="http://127.0.0.1:8000/rules-organization">О проекте</a></li>
                    <li><a href="http://127.0.0.1:8000/contact">Контакты</a></li>
                </ul>
            </div>
            <div class="media">
                <img src="{{asset('assets/img/vk.svg')}}">
                <img src="{{asset('assets/img/fb.svg')}}">
            </div>
        </div>
        <img class="f-logo" src="{{asset('assets/img/logo-l.png')}}">
    </footer>
</div>
    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    <script src="{{asset('assets/js/fillter.js')}}"></script>
    <script src="{{asset('assets/js/main-js.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
        });
        $(function () {
            bsCustomFileInput.init();
        });
        $('.select2').select2()
    </script>
    
    <style>
        .custom-file-input:lang(en)~.custom-file-label::after{
            content: "...";
        }
    </style><script type='text/javascript'>
    $(document).ready(function(){
        $('#country').change(function(){
            var id = $(this).val();
            $('#state').find('option').not(':first').remove();
            $.ajax({
                url:'/state/'+id,
                type: 'get',
                dataType:'json',
                success:function(response){
                    var len=0;
                    if(response['data'] != null){
                        len = response['data'].length;
                    }
                    if(len > 0 ){
                        for(var i = 0; i<len; i++){
                            
                            var id = response['data'][i].id;
                            var name = response['data'][i].title;
                            var option = "<option value='"+id+"'>"+name+"</option>";
                            
                            $('#state').append(option);
                        }
                    }
                }
            })
        });
        $('#state').change(function(){
            var ids = $(this).val();
            $('#city').find('option').not(':first').remove();
            $.ajax({
                url:'/city/'+ids,
                type: 'get',
                dataType:'json',
                success:function(response){
                    var len=0;
                    if(response['data'] != null){
                        len = response['data'].length;
                    }
                    if(len > 0 ){
                        for(var i = 0; i<len; i++){
                            var id = response['data'][i].id;
                            var name = response['data'][i].title;
                            var option = "<option value='"+id+"'>"+name+"</option>";
                            $('#city').append(option);
                   
                        }
                    }
                }
            })
        });
    });
</script>
</div>

</body>
</html>

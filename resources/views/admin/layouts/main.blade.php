<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60"
             width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <div class="col-12  d-flex justify-content-between">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item mr-3">
                <a href="http://127.0.0.1:8000/">
                    <input type="submit" class="btn btn-outline-primary" value="Перейти на сайт">
                </a>
            </li>
            <li class="nav-item">
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <input type="submit" class="btn btn-outline-primary" value="Выйти">
                </form>
            </li>
        </ul>
        </div>
    </nav>
    @include('admin.includes.sidebar')
    @yield('content')
<!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy;</strong>
    </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
<script>
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function (event) {
  // Кнопка, запускающая модальное окно
  var button = event.relatedTarget
  // Извлечь информацию из атрибутов data-bs- *
  var recipient = button.getAttribute('data-bs-whatever')
  var recipient_id = button.getAttribute('data-bs-whatever-id')
  console.log(recipient_id)
  // При необходимости вы можете инициировать запрос AJAX здесь
  // а затем выполните обновление в обратном вызове.
  //
  // Обновите содержимое модального окна.

  var modalTitle = exampleModal.querySelector('.modal-title')
  var modalBodyInput = exampleModal.querySelector('.modal-body input')
        
  modalTitle.textContent = 'Вы действительно хотите удалить пользователя ' + ': ' + recipient
  var text = recipient_id;
    document.getElementById("myDiv").setAttribute("ids", text);
})
</script>
<script type='text/javascript'>
    $(document).ready(function(){
        $('#country').change(function(){
            var id = $(this).val();
            console.log(id)
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
                            console.log(response['data'])
                            var id = response['data'][i].id_city;
                            var name = response['data'][i].name;
                            var option = "<option value='"+id+"'>"+name+"</option>";
                            $('#city').append(option);
                   
                        }
                    }
                }
            })
        });
    });
</script>
<style>
    .custom-file-input:lang(en)~.custom-file-label::after{
        content: "...";
    }
</style>
</body>
</html>

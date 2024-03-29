<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('admin.main.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Главная
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Организации
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.type.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Добавить вид организации
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.city.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-city"></i>
                    <p>
                        Добавить город
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.republic.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-globe-asia"></i>
                    <p>
                        Добавить регион
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.district.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-globe"></i>
                    <p>
                        Добавить страну
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.post.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-clipboard"></i>
                    <p>
                        Посты в блог
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.category.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>
                        Категории
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.baner.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-images"></i>
                    <p>
                        Банер
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.consulting.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-user-friends"></i>
                    <p>
                        Консалтинг Организации
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.consultingCat.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-clipboard-list"></i>
                    <p>
                        Консалтинг категории
                    </p>
                </a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a href="{{route('admin.tag.index')}}" class="nav-link">--}}
{{--                    <i class="nav-icon fas fa-tags"></i>--}}
{{--                    <p>--}}
{{--                        Тэги--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>

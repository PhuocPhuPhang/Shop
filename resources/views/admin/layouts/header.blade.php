<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
    <nav>
        <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
        <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            @if(isset(Auth::user()->email))
            <img src="../../../upload/user/{{Auth::user()->avatar}}" alt="{{Auth::user()->ten}}">
            <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="shop/admin/user/sua/{{Auth::user()->id}}">Hồ sơ</a></li>
            <li><a href="{{ url('shop/admin/logout') }}"><i class="fa fa-sign-out pull-right"></i>Đăng xuất</a></li>
            </ul>
            @else
                <script>window.location = "shop/admin/login";</script>
             @endif
        </li>
        <li><a href="{{ url('shop') }}" target="_blank"><i class="fa fa-reply" style="padding-right:5px"></i>Vào trang web</a></li>
        </ul>
    </nav>
    </div>
</div>
<!-- /top navigation -->


@if(Auth::check())
<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{url('admin/index')}}" class="site_title"><i class="fa fa-paw"></i> <span>Shop</span></a>
        </div>
        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="../../../upload/user/{{Auth::user()->avatar}}" alt="hinh" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome</span>
                <h2>{{Auth::user()->ten}}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a href="{{url('admin/index')}}"><i class="fa fa-home"></i>Trang chủ</a></li>
                    <li><a href="{{url('admin/nhacungcap/danhsach')}}"><i class="fa fa-industry"></i>Nhà Cung Cấp</a></li>

                    <li><a><i class="fa fa-newspaper-o"></i>Bài Viết<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('admin/tintuc/gioithieu')}}">Giới thiệu</a></li>
                            <li><a href="{{url('admin/tintuc/danhsach')}}">Tin Tức</a></li>
                            <li><a href="{{url('admin/tintuc/chinhsach')}}">Chính sách</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-image"></i>Media<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('admin/slide/danhsach')}}">Slide</a></li>
                            <li><a href="{{url('admin/social/danhsach')}}">Mạng xã hội</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-mobile"></i>Sản Phẩm<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <!-- <li><a href="{{url('admin/sanpham/loaicauhinh/danhsach')}}">Danh sách loại cấu hình</a></li>
                    <li><a href="{{url('admin/sanpham/cauhinh/danhsach')}}">Danh sách cấu hình</a></li> -->
                            <li><a href="{{url('admin/sanpham/danhsach')}}">Danh sách sản phẩm</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="{{url('admin/khuyenmai/danhsach')}}"><i class="fa fa-percent"></i>Khuyến mãi</a></li> -->
                    <li><a><i class="fa fa-file-text"></i>Hóa đơn<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('admin/hoadon/danhsach')}}">Đơn hàng chưa duyệt</a>
                            <li><a href="{{url('admin/hoadon/danhsachduyet')}}">Đơn hàng chưa duyệt</a></li>
                        </ul>
                    </li>
                    @if( Auth::user()->quyen == 1 )
                    <li><a><i class="fa fa-user"></i>Users<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{url('admin/user/khachhang')}}">Khách hàng</a></li>
                            <li><a href="{{url('admin/user/nhanvien')}}">Nhân viên</a></li>
                        </ul>
                    </li>
                    <li><a href="{{url('admin/website/thongtin')}}"><i class="fa fa-cogs"></i>Cấu hình website</a></li>
                    @endif

                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <!-- <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div> -->
        <!-- /menu footer buttons -->
    </div>
</div>
@endif

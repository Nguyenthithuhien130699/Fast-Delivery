<ul class="sidebar-menu">
    <li class="menu-header">Main</li>
    <li class="dropdown">
        <a href="{{route('home')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Bill</li>
    <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Đơn hàng</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="">Danh sách</a></li>
        </ul>
    </li>
    @if(Auth::user()->role == 'admin')
    <li class="menu-header">User</li>
    <li><a class="nav-link" href=""><i data-feather="sliders"></i><span>Tạo mới</span></a></li>
    <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="shopping-bag"></i><span>Khách hàng</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="">Người nhận hàng</a></li>
            <li><a class="nav-link" href="">Người bán hàng</a></li>
        </ul>
    </li>

    <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Shipper</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="">Danh sách</a></li>
        </ul>
    </li>
        <li class="menu-header">Location</li>
        <li class="menu-header">Location</li>
        <li><a class="nav-link" href="{{route('admin.province.index')}}"><i data-feather="sliders"></i><span>Thành phố</span></a></li>
        <li><a class="nav-link" href=""><i data-feather="sliders"></i><span>Quận - Huyện</span></a></li>
        <li><a class="nav-link" href=""><i data-feather="sliders"></i><span>Phường - Xã</span></a></li>
    @endif
        <li class="menu-header">Report</li>
        <li><a class="nav-link" href=""><i data-feather="sliders"></i><span>Báo cáo - Thống Kê</span></a></li>
</ul>

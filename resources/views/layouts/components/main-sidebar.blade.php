<ul class="sidebar-menu">

    <!-- <li class="menu-header">Main</li>
        <li class="dropdown">
            <a href="{{route('home')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Bill</li>
    <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Đơn hàng</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('admin.bill.index')}}">Danh sách</a></li>
        </ul>
    </li> -->

    @if(Auth::user()->role == 'admin') 

    <li class="menu-header">Main</li>
    <li class="dropdown">
        <a href="{{route('home')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Bill</li>
    <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Đơn hàng</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('admin.bill.index')}}">Danh sách</a></li>
        </ul>
    </li>

    <li class="menu-header">User</li>
    <li><a class="nav-link" href="{{route('admin.user.create')}}"><i data-feather="sliders"></i><span>Tạo mới</span></a></li>
    <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="shopping-bag"></i><span>Khách hàng</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('admin.user.index')}}">Người nhận hàng</a></li>
            <li><a class="nav-link" href="{{route('admin.user.seller')}}">Người bán hàng</a></li>
        </ul>
    </li>

    <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Shipper</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('admin.staff.staffList')}}">Danh sách</a></li>
        </ul>
    </li>
        <li class="menu-header">Location</li>
        <li><a class="nav-link" href="{{route('admin.province.index')}}"><i data-feather="sliders"></i><span>Thành phố</span></a></li>
        <li><a class="nav-link" href="{{route('admin.province.district')}}"><i data-feather="sliders"></i><span>Quận - Huyện</span></a></li>
        <li><a class="nav-link" href="{{route('admin.province.ward')}}"><i data-feather="sliders"></i><span>Phường - Xã</span></a></li>

        <li class="menu-header">Report</li>
        <li><a class="nav-link" href="{{route('admin.report.index')}}"><i data-feather="sliders"></i><span>Báo cáo - Thống Kê</span></a>
    </li>
    @else
        @if(Auth::user()->role == 'shipper')
                <li class="menu-header">Main</li>
            <li class="dropdown">
                <a href="{{route('home')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Bill</li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Đơn hàng</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('admin.bill.index')}}">Danh sách</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <!-- <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Shipper</span></a> -->
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('admin.staff.staffList')}}">Danh sách</a></li>
                </ul>
            </li>
                <!-- <li class="menu-header">Location</li>
                <li><a class="nav-link" href="{{route('admin.province.index')}}"><i data-feather="sliders"></i><span>Thành phố</span></a></li>
                <li><a class="nav-link" href="{{route('admin.province.district')}}"><i data-feather="sliders"></i><span>Quận - Huyện</span></a></li>
                <li><a class="nav-link" href="{{route('admin.province.ward')}}"><i data-feather="sliders"></i><span>Phường - Xã</span></a></li> -->

                <li class="menu-header">Report</li>
                <li><a class="nav-link" href="{{route('admin.report.index')}}"><i data-feather="sliders"></i><span>Báo cáo - Thống Kê</span></a>
            </li>
        @endif
    @endif
</ul>

<div class="left-sidebar-pro">
    <nav id="sidebar">
        <div class="sidebar-header">
            <a href="#"><img src="" alt="" />
            </a>
            <h3 style="background: var(--color-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-weight: bold;">
                VNPT Sóc Trăng
            </h3>
            <p>Trung tâm Công nghệ thông tin</p>
            <strong style="background: var(--color-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">VNPT</strong>
        </div>
        <div class="left-custom-menu-adp-wrap">
            <ul class="nav navbar-nav left-sidebar-menu-pro">
            @if(Auth::guard('admin')->check())
                <li class="nav-item">
                    <a href="{!! route('admin.website.information.index') !!}" class="nav-link">
                        <i class="fa big-icon fa-info-circle"></i>
                        <span class="mini-dn">Thông tin website</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('admin.get.dashboard') !!}" class="nav-link">
                        <i class="fa big-icon fa-home"></i>
                        <span class="mini-dn">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('admin.get.module') !!}" class="nav-link">
                        <i class="fa big-icon fa-clone"></i>
                        <span class="mini-dn">Quản lý module</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{!! route('admin.get.logs.index') !!}" class="nav-link">
                        <i class="fa big-icon fa-clock-o"></i>
                        <span class="mini-dn">Lịch sử logs</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Tuỳ biến giao diện</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                    <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                        <a href="{!! route('user.custominterface.get.layout') !!}" class="dropdown-item">Quản lý layout</a>
                        <a href="dashboard-2.html" class="dropdown-item">Dashboard v.2</a>
                        <a href="analytics.html" class="dropdown-item">Analytics</a>
                        <a href="widgets.html" class="dropdown-item">Widgets</a>
                    </div>
                </li>
            @elseif(Auth::guard('user')->check())
                <li class="nav-item">
                    <a href="{!! route('user.get.dashboard') !!}" class="nav-link">
                        <i class="fa big-icon fa-home"></i>
                        <span class="mini-dn">Dashboard</span>
                    </a>
                </li>
                @if($function_permissions_according_to_user) 
                    @foreach($function_permissions_according_to_user as $function_permission)
                    @if($function_permission == 1)
                        <li class="nav-item">
                            <a href="{!! route('user.get.list.module') !!}" class="nav-link">
                                <i class="fa big-icon fa-puzzle-piece"></i>
                                <span class="mini-dn">Danh sách module</span>
                            </a>
                        </li>
                    @elseif($function_permission == 2)
                        <li class="nav-item">
                            <a href="{!! route('user.get.index') !!}" class="nav-link">
                                <i class="fa big-icon fa-users"></i>
                                <span class="mini-dn">Danh sách người dùng</span>
                            </a>
                        </li>
                    @elseif($function_permission == 3)
                        <li class="nav-item">
                            <a href="{!! route('user.get.function.permission') !!}" class="nav-link">
                                <i class="fa big-icon fa-user-times"></i>
                                <span class="mini-dn">Phân quyền chức năng người dùng</span>
                            </a>
                        </li>
                    @elseif($function_permission == 4)
                        <li class="nav-item">
                            <a href="{!! route('user.get.module.permission') !!}" class="nav-link">
                                <i class="fa big-icon fa-ban"></i>
                                <span class="mini-dn">Phân quyền module</span>
                            </a>
                        </li>
                    @elseif($function_permission == 5)
                        <li class="nav-item">
                            <a href="{!! route('admin.website.information.index') !!}" class="nav-link">
                                <i class="fa big-icon fa-info-circle"></i>
                                <span class="mini-dn">Thông tin website</span>
                            </a>
                        </li>
                    <!-- @elseif($function_permission == 6)
                    <li class="nav-item">
                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Tuỳ biến giao diện</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                        <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                            <a href="{!! route('user.custominterface.get.layout') !!}" class="dropdown-item">Quản lý layout</a>
                            <a href="dashboard-2.html" class="dropdown-item">Dashboard v.2</a>
                            <a href="analytics.html" class="dropdown-item">Analytics</a>
                            <a href="widgets.html" class="dropdown-item">Widgets</a>
                        </div>
                    </li> -->
                    @endif
                    @endforeach
                @endif 
            @endif
            </ul>
        </div>
    </nav>
</div>
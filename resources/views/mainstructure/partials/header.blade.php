<div class="header-top-area">
    <div class="fixed-header-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                    <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="admin-logo logo-wrap-pro">
                        <a href="#"><img src="" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12">
                    <div class="header-top-menu tabl-d-n">
                        <ul class="nav navbar-nav mai-top-nav">
                            <li class="nav-item"><a href="" class="nav-link">Trang chủ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                    <div class="header-right-info">
                        <ul class="nav navbar-nav mai-top-nav header-right-menu">
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="adminpro-icon adminpro-chat-pro"></span><span class="indicator-ms"></span></a>
                                <div role="menu" class="author-message-top dropdown-menu animated flipInX">
                                    <div class="message-single-top">
                                        <h1>Message</h1>
                                    </div>
                                    <ul class="message-menu">
                                        <li>
                                            <a href="#">
                                                <div class="message-img">
                                                    <img src="img/message/1.jpg" alt="">
                                                </div>
                                                <div class="message-content">
                                                    <span class="message-date">16 Sept</span>
                                                    <h2>Advanda Cro</h2>
                                                    <p>Please done this project as soon possible.</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="message-img">
                                                    <img src="img/message/4.jpg" alt="">
                                                </div>
                                                <div class="message-content">
                                                    <span class="message-date">16 Sept</span>
                                                    <h2>Sulaiman din</h2>
                                                    <p>Please done this project as soon possible.</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="message-img">
                                                    <img src="img/message/3.jpg" alt="">
                                                </div>
                                                <div class="message-content">
                                                    <span class="message-date">16 Sept</span>
                                                    <h2>Victor Jara</h2>
                                                    <p>Please done this project as soon possible.</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="message-img">
                                                    <img src="img/message/2.jpg" alt="">
                                                </div>
                                                <div class="message-content">
                                                    <span class="message-date">16 Sept</span>
                                                    <h2>Victor Jara</h2>
                                                    <p>Please done this project as soon possible.</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="message-view">
                                        <a href="#">View All Messages</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa fa-bell-o" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                <div role="menu" class="notification-author dropdown-menu animated flipInX">
                                    <div class="notification-single-top">
                                        <h1>Notifications</h1>
                                    </div>
                                    <ul class="notification-menu">
                                        <li>
                                            <a href="#">
                                                <div class="notification-icon">
                                                    <span class="adminpro-icon adminpro-checked-pro"></span>
                                                </div>
                                                <div class="notification-content">
                                                    <span class="notification-date">16 Sept</span>
                                                    <h2>Advanda Cro</h2>
                                                    <p>Please done this project as soon possible.</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="notification-icon">
                                                    <span class="adminpro-icon adminpro-cloud-computing-down"></span>
                                                </div>
                                                <div class="notification-content">
                                                    <span class="notification-date">16 Sept</span>
                                                    <h2>Sulaiman din</h2>
                                                    <p>Please done this project as soon possible.</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="notification-icon">
                                                    <span class="adminpro-icon adminpro-shield"></span>
                                                </div>
                                                <div class="notification-content">
                                                    <span class="notification-date">16 Sept</span>
                                                    <h2>Victor Jara</h2>
                                                    <p>Please done this project as soon possible.</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="notification-icon">
                                                    <span class="adminpro-icon adminpro-analytics-arrow"></span>
                                                </div>
                                                <div class="notification-content">
                                                    <span class="notification-date">16 Sept</span>
                                                    <h2>Victor Jara</h2>
                                                    <p>Please done this project as soon possible.</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="notification-view">
                                        <a href="#">View All Notification</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                    <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                                    <span class="admin-name">{{Auth::user()->name}}</span>
                                    <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                                </a>
                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                    <li>
                                        <a href="{!! route('account.get.index') !!}">
                                            <span class="adminpro-icon adminpro-user-rounded author-log-ic"></span>Tài khoản
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!! route('user.get.changepassword') !!}">
                                            <span class="adminpro-icon adminpro-locked author-log-ic"></span>Đổi mật khẩu
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{!! route('auth.get.logout') !!}">
                                            <span class="adminpro-icon adminpro-settings author-log-ic"></span>Đăng xuất
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

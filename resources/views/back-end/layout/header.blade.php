<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="javascript:void(0);" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="backend/images/logo.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="backend/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>

                <a href="javascript:void(0);" class="logo logo-light">
                    <span class="logo-sm">
                        <!--<img src="backend/images/logo-light.svg" alt="" height="22">-->
                        <h4 style="margin-top:20px; color: #ffffff;">O</h4>
                    </span>
                    <span class="logo-lg">
                        <!--<img src="backend/images/logo-light.png" alt="" height="19">-->
                        <h4 style="margin-top:20px; color: #ffffff;">Orange Technology</h4>
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>
        <style>
            .alert_icon{
                animation: shake-animation 4.72s ease infinite;
                transform-origin: 50% 50%;
                /* font-size:3rem; */
                color:red;
                -webkit-animation-name: spaceboots;
                -webkit-animation-duration: 0.8s;
                -webkit-transform-origin:50% 50%;
                -webkit-animation-iteration-count: infinite;
                -webkit-animation-timing-function: linear;
            }@-webkit-keyframes spaceboots {
                0% { -webkit-transform: translate(2px, 1px) rotate(0deg); }
                10% { -webkit-transform: translate(-1px, -2px) rotate(-1deg); }
                20% { -webkit-transform: translate(-3px, 0px) rotate(1deg); }
                30% { -webkit-transform: translate(0px, 2px) rotate(0deg); }
                40% { -webkit-transform: translate(1px, -1px) rotate(1deg); }
                50% { -webkit-transform: translate(-1px, 2px) rotate(-1deg); }
                60% { -webkit-transform: translate(-3px, 1px) rotate(0deg); }
                70% { -webkit-transform: translate(2px, 1px) rotate(-1deg); }
                80% { -webkit-transform: translate(-1px, -1px) rotate(1deg); }
                90% { -webkit-transform: translate(2px, 2px) rotate(0deg); }
                100% { -webkit-transform: translate(1px, -2px) rotate(-1deg); }
            }
        </style>
        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <a href="/webpanel">
                    <button type="button" class="btn header-item alert_icon noti-icon waves-effect"data-toggle="modal"data-target="#notify_modal">
                        <i style="color:red" class="bx bxs-bell-ring"></i>
                    </button>
                </a>
                    <!-- Modal -->
                        
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="backend/images/users/avatar-1.jpg"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1">Menu</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <a class="dropdown-item" href="javascript:void(0)"><i class="bx bx-user font-size-16 align-middle mr-1"></i> Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ url('/webpanel/logout') }}"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i>ออกจากระบบ</a>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>
        </div>
    </div>
</header>
<style>
    .modal-backdrop {
        position: none;
    }
</style>

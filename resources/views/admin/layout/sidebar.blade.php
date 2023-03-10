<div class="pcoded-inner-navbar main-menu">

    <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation"></div>
    <ul class="pcoded-item pcoded-left-item">
        <li class="active">
            <a href="{{route('home')}}">
                <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                <span class="pcoded-mtext"
                    data-i18n="nav.basic-components.main">Items Description</span>
                <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
                <li class=" ">
                    <a href="{{route('admin.item.product')}}">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.basic-components.alert">Product Details</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{route('admin.item.item-dimension')}}">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.basic-components.breadcrumbs">Dimension Details</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{route('admin.item.item-thickness')}}">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.basic-components.alert">GSM details</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{route('admin.item.item-company')}}">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.basic-components.alert">Item Company</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{route('admin.item.item')}}">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.basic-components.alert">Item details</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                <span class="pcoded-mtext"
                    data-i18n="nav.basic-components.main">JOB CARD SECTION</span>
                <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
                <li class=" ">
                    <a href="{{route('admin.job_card')}}">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.basic-components.alert">Job Card</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{route('admin.job_orders')}}">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.basic-components.alert">Job Order</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    {{-- <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Forms &amp; Tables
    </div>
    <ul class="pcoded-item pcoded-left-item">
        <li>
            <a href="form-elements-component.html">
                <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Form
                    Components</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li>
            <a href="bs-basic-table.html">
                <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Basic
                    Table</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>

    </ul>

    <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Chart &amp; Maps
    </div>
    <ul class="pcoded-item pcoded-left-item">
        <li>
            <a href="chart.html">
                <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                <span class="pcoded-mtext"
                    data-i18n="nav.form-components.main">Chart</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li>
            <a href="map-google.html">
                <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                <span class="pcoded-mtext"
                    data-i18n="nav.form-components.main">Maps</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="pcoded-hasmenu">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                <span class="pcoded-mtext"
                    data-i18n="nav.basic-components.main">Pages</span>
                <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
                <li class=" ">
                    <a href="auth-normal-sign-in.html">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.basic-components.alert">Login</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="auth-sign-up.html">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.basic-components.breadcrumbs">Register</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class=" ">
                    <a href="sample-page.html">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.basic-components.breadcrumbs">Sample Page</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>

    <div class="pcoded-navigatio-lavel" data-i18n="nav.category.other">Other</div>
    <ul class="pcoded-item pcoded-left-item">
        <li class="pcoded-hasmenu ">
            <a href="javascript:void(0)">
                <span class="pcoded-micon"><i class="ti-direction-alt"></i><b>M</b></span>
                <span class="pcoded-mtext" data-i18n="nav.menu-levels.main">Menu
                    Levels</span>
                <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
                <li class="">
                    <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.menu-levels.menu-level-21">Menu Level 2.1</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="pcoded-hasmenu ">
                    <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.menu-levels.menu-level-22.main">Menu Level
                            2.2</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="javascript:void(0)">
                                <span class="pcoded-micon"><i
                                        class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext"
                                    data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Menu
                                    Level 3.1</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                        <span class="pcoded-mtext"
                            data-i18n="nav.menu-levels.menu-level-23">Menu Level 2.3</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>

            </ul>
        </li>
    </ul> --}}
</div>

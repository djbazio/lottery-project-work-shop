<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('branch.view.home') }}" class="brand-link">
        <!--<img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">-->
        <i class="fas fa-laptop-code fa-1x"></i>
        {{-- <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span> --}}
        สาขาย่อย
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        {{-- Sidebar user panel (optional) --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">คุณ: {{ Auth::guard('branch')->user()->fname }}
                    {{ Auth::guard('branch')->user()->lname }}</a>
            </div>
        </div>
        @section('sidebar')
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                {{-- เริ่มจัดการข้อมูล --}}
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                                                                                               with font-awesome or any other icon font library -->
                    <li class="nav-header">หน้าแรก</li>
                    <li class="nav-item">
                        <a href="{{ route('branch.view.home') }}"
                            class="nav-link {{ Request::routeIs('branch.view.home') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                หน้าแรก
                                {{-- <span class="badge badge-info right">2</span> --}}
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">เกี่ยวกับสลาก</li>
                    <li class="nav-item">
                        <a href="{{ route('branch.lottery.view.home') }}"
                            class="nav-link {{ Request::routeIs('branch.lottery.view.home') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                ข้อมูลสลาก
                                {{-- <span class="badge badge-info right">2</span> --}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}"
                            class="nav-link {{ Request::routeIs('admin.add') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                จัดการการสแกนสลาก​
                                {{-- <span class="badge badge-info right">2</span> --}}
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">ข้อมูลของสาขา</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}"
                            class="nav-link {{ Request::routeIs('admin.add') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                ข้อมูลรายรับค่าฝากของสาขา
                                {{-- <span class="badge badge-info right">2</span> --}}
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}"
                            class="nav-link {{ Request::routeIs('admin.add') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                จ่ายรายได้ค่าฝากขายให้ส่วนกลาง
                                {{-- <span class="badge badge-info right">2</span> --}}
                            </p>
                        </a>
                    </li>
                </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}
                </ul>
            </nav>
        @show
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

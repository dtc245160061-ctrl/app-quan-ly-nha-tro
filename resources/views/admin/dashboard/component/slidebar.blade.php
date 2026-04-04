<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<nav style="position:fixed;z-index:1; top:0; bottom:0;overflow:auto; height: 100vh" class="scroll navbar-default navbar-static-side" role="navigation">
    <div  class="sidebar-collapse ">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle" width="50px" height="50px" src="{{ asset('uploads/avatars/'. $employee->avatar) }}" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"> {{ $employee->name }}</strong>
                            </span> <span class="text-muted text-xs block">{{ $position_name }} <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{route('user.profileView')}}">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('auth.logout')}}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    NT
                </div>
            </li>
            <li class="active">
                <a href="{{route('dashboard.index')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Tong quan</span> </a>
            </li>

            <li>
                <a href="#"><i class="fa fa-file-signature"></i> <span class="nav-label">Hop dong va khach thue</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('contract.index')}}">Danh sach hop dong</a></li>
                    <li><a href="{{route('student.index')}}">Danh sach khach thue</a></li>
                    <li><a href="{{route('student.createView')}}">Them khach thue</a></li> 
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-bed"></i> <span class="nav-label">Phong tro</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('room.index')}}">Danh sach phong</a></li>
                    <li><a href="{{route('room.createView')}}">Them phong</a></li>
                    <li><a href="{{route('roomType.index')}}">Loai phong</a></li>
                    <li><a href="{{route('roomType.createView')}}">Them loai phong</a></li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-file-invoice-dollar"></i> <span class="nav-label">Hoa don va doanh thu</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('bill.index')}}">Danh sach hoa don</a></li>
                    <li><a href="{{route('bill.createView')}}">Lap hoa don</a></li>
                    <li><a href="{{route('bill.room.index')}}">Dien nuoc hang thang</a></li>
                    <li><a href="{{route('bill.room.createView')}}">Them chi so dien nuoc</a></li>
                </ul>
            </li>
            @if($user->permission_id<=2)
            <li>
                <a href="#"><i class="fa fa-user-tag"></i> <span class="nav-label">Nhan su he thong</span><span class="fa arrow"></span></a>

                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('employee.index')}}">Danh sach nhan vien</a></li>
                    <li><a href="{{route('employee.createView')}}">Them nhan vien</a></li>
                    <li><a href="{{route('position.index')}}">Chuc vu</a></li>
                    <li><a href="{{route('position.createView')}}">Them chuc vu</a></li>
                </ul>
            </li>
            @if($user->permission_id==1)
            <li>
                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Tai khoan</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('user.index')}}">Danh sach tai khoan</a></li>
                    <li><a href="{{route('user.createView')}}">Them tai khoan</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-user-shield"></i> <span class="nav-label">Phan quyen</span><span class="fa arrow"></span></a>

                <ul class="nav nav-second-level collapse">
                    <li><a href="{{route('permission.index')}}">Danh sach quyen</a></li>
                    <li><a href="{{route('permission.createView')}}">Them quyen</a></li>
                </ul>
            </li>
            @endif
           @endif
        </ul>

    </div>
</nav>

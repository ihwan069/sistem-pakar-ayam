<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="/dashboard">EXChick.id
                        <!-- <img src="asset/images/logo/logo.png" alt="Logo" srcset=""></a> -->
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item {{ $title == 'Home' ? 'active' : '' }} ">
                    <a href="/" class='sidebar-link'>
                        <i class="bi bi-house-door-fill"></i>
                        <span>Home</span>
                    </a>
                </li>
                @if (auth()->check())
                <li class="sidebar-item {{ $title == 'Dashboard' ? 'active' : '' }} ">
                    <a href="/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{ ($title == 'Evidences' || $title == 'Hypotheses') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Management CF</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item {{ $title == 'Evidences' ? 'active' : '' }} ">
                            <a href="{{ route('evidence.index') }}">Evidence CF</a>
                        </li>
                        <li class="submenu-item {{ $title == 'Hypotheses' ? 'active' : '' }} ">
                            <a href="{{ route('hypothesis.index') }}">Hypothesis CF</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item {{ ($title == 'Evidences DS' || $title == 'Hypotheses DS') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Management DS</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item {{ $title == 'Evidences DS' ? 'active' : '' }} ">
                            <a href="{{ route('evidence_ds.index') }}">Evidence DS</a>
                        </li>
                        <li class="submenu-item {{ $title == 'Hypotheses DS' ? 'active' : '' }} ">
                            {{-- <a href="{{ route('hypothesis.index') }}">Hypothesis</a> --}}
                            <a href="{{ route('hypothesis_ds.index') }}">Hypothesis DS</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item {{ $title == 'Role' ? 'active' : '' }}">
                    <a href="{{ route('role.index') }}" class='sidebar-link'>
                        <i class="bi bi-gear-wide-connected"></i>
                        <span>Role CF</span>
                    </a>
                </li>

                <li class="sidebar-item {{ ($title == 'Data Role DS' || $title == 'Role DS') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-gear-wide"></i>
                        <span>Role DS</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item {{ $title == 'Data Role DS' ? 'active' : '' }} ">
                            <a href="{{ route('role_data.index') }}">Data Role DS</a>
                        </li>
                        <li class="submenu-item {{ $title == 'Role DS' ? 'active' : '' }} ">
                            {{-- <a href="{{ route('hypothesis.index') }}">Hypothesis</a> --}}
                            <a href="{{ route('role_ds.index') }}">Role DS</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item {{ ($title == 'History CF' || $title == 'History DS') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-clock-history"></i>
                        <span>History</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item {{ $title == 'History CF' ? 'active' : '' }} ">
                            <a href="{{route('history.index') }}">History CF</a>
                        </li>
                        <li class="submenu-item {{ $title == 'History DS' ? 'active' : '' }} ">
                            {{-- <a href="{{ route('hypothesis.index') }}">Hypothesis</a> --}}
                            <a href="{{ route('history_ds.index') }}">History DS</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">
                    <hr>
                </li>

                <li class="sidebar-item {{ ($title == 'Setting' || $title == 'Users') ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-gear"></i>
                        <span>Setting</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item {{ $title == 'Setting' ? 'active' : '' }}">
                            <a href="{{ route('setting.index') }}">Setting</a>
                        </li>
                        @if (auth()->user()->level == 'admin')
                        <li class="submenu-item {{ $title == 'User' ? 'active' : '' }}">
                            <a href="{{ route('user.index') }}">User data</a>
                        </li>
                        @endif
                    </ul>
                </li>
                @else
                <li class="sidebar-item {{ $title == 'Login' ? 'active' : '' }} ">
                    <a href="/login" class='sidebar-link'>
                        <i class="bi bi-box-arrow-in-left"></i>
                        <span>Login</span>
                    </a>
                </li>
                @endif


                <!-- <li class="sidebar-title">Setting</li> -->

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
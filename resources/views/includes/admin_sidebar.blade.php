<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('dashboard::dashboard')}}">MINING</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('dashboard::dashboard')}}">M</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{request()->is('dashboard/panel*') ? 'active' : ''}}"><a class="nav-link" href="{{route('dashboard::dashboard')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            @if (auth()->user()->branch_id == 1 || auth()->user()->level == 'branch_manager')
                <li class="{{request()->is('dashboard/vehicles*') ? 'active' : ''}}"><a class="nav-link" href="{{route('dashboard::vehicles::index')}}"><i class="fas fa-car"></i> <span>Kendaraan</span></a></li>
                <li class="{{request()->is('dashboard/drivers*') ? 'active' : ''}}"><a class="nav-link" href="{{route('dashboard::drivers::index')}}"><i class="fas fa-user"></i> <span>Driver</span></a></li>
            @endif
            @if (auth()->user()->branch_id == 1)
                <li class="{{request()->is('dashboard/branches*') ? 'active' : ''}}"><a class="nav-link" href="{{route('dashboard::branches::index')}}"><i class="fas fa-building"></i> <span>Cabang</span></a></li>
            @endif
            <li class="{{request()->is('dashboard/bookings*') ? 'active' : ''}}"><a class="nav-link" href="{{route('dashboard::bookings::index')}}"><i class="fas fa-shopping-cart"></i> <span>Pemesanan</span></a></li>
        </ul>
    </aside>
</div>

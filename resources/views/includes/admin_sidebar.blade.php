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
            <li class="{{request()->is('dashboard/vehicles*') ? 'active' : ''}}"><a class="nav-link" href="{{route('dashboard::vehicles::index')}}"><i class="fas fa-car"></i> <span>Kendaraan</span></a></li>
        </ul>
    </aside>
</div>

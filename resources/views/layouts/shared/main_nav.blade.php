<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="\">
        <div class="sidebar-brand-icon">
            <img src="image/logo/norsulogo.png" alt="Norsu" class="brand-image img-circle elevation-3" style="opacity: .8;max-height: 55px;margin-left: auto" >
        </div>
        <div class="sidebar-brand-text mx-3"><span style="font-size: 8.10pt;">NORSU-G DBPMS</span></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
        
        
        <!-- for admin nav -->
        @if(Auth::user()->rule_id==1)
            @include('layouts.shared.main_navs.admin_nav')
        @endif
        
        <!-- for spmo nav -->
        @if(Auth::user()->rule_id==2)
            @include('layouts.shared.main_navs.spmo_nav')
        @endif
        
        <!-- for user nav -->
        @if(Auth::user()->rule_id==3)
            @include('layouts.shared.main_navs.user_nav')
        @endif
        
        
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
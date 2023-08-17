
<li class="nav-item">
    <a class="nav-link" href="dashboard">
        <i class="fas fa-fw fa-home"></i>
        <span style="font-size: 12px;">Home</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1"
        aria-expanded="true" aria-controls="collapse1">
        <i class="fas fa-fw fas fa-user-cog"></i>
        <span style="font-size: 12px;">Manage Accounts</span>
    </a>
    <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded" style="font-size: 12px;">
            <a class="collapse-item" href="admin-table">Admin</a>
            <a class="collapse-item" href="spmo-table">SPMO</a>
            <a class="collapse-item" href="user-table">Users</a>
        </div>
    </div>
</li> 

<li class="nav-item">
    <a class="nav-link" href="admin-submitted-purchase-request-table">
        <i class="fas fa-fw fa-rocket"></i>
        <span style="font-size: 12px;">Submitted Purchase Request</span><span class="badge badge-secondary badge-counter">
            
            
            <livewire:admin-panel.badge.submitted-purchase-request-badge />
            
        </span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="admin-approve-purchase-request-table">
        <i class="fas fa-fw fa-thumbs-up"></i>
        <span style="font-size: 12px;">Approved Purchase Request</span><span class="badge badge-warning badge-counter">
            
            
            <livewire:admin-panel.badge.approved-purchase-request-badge />
            
            
        </span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="admin-completely-delevered-table">
        <i class="fas fa-fw fa-check-circle"></i>
        <span style="font-size: 12px;">Completely Delivered</span><span class="badge badge-success badge-counter">
            
            
            <livewire:admin-panel.badge.completely-delivered-badge />
            
            
        </span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="budget-allocation">
        <i class="fas fa-fw fa-chart-area"></i>
        <span style="font-size: 12px;">Budget Allocation</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="budget-utilization">
        <i class="fas fa-fw fa-edit"></i>
        <span style="font-size: 12px;">Budget Utilization</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="procurement-report-table">
        <i class="fas fa-fw fa-file"></i>
        <span style="font-size: 12px;">Procurement Report</span>
    </a>
</li>
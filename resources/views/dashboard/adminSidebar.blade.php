<li class="menu-header"><span> Main Menu</span></li>
<li class="nav-item{{ request()->is('admin/users') ? ' active' : '' }}"><a href="{{ url('/admin/users') }}"><i class="fas fa-user-friends"></i><span>Users</span></a></li>
<li class="nav-item{{ request()->is('admin/tenants') ? ' active' : '' }}"><a href="{{ url('/admin/tenants') }}"><i class="fas fa-hands-holding-child"></i><span>Tenants</span></a></li>
<li class="nav-item{{ request()->is('admin/receipts') ? ' active' : '' }}"><a href="{{ url('/admin/receipts') }}"><i class="fas fa-receipt"></i><span>Receipts</span></a></li>
<li class="nav-item{{ request()->is('admin/vehicles') ? ' active' : '' }}"><a href="{{ url('/admin/vehicles') }}"><i class="fas fa-car"></i><span>Vehicles</span></a></li>
<li class="nav-item{{ request()->is('admin/rents') ? ' active' : '' }}"><a href="{{ url('/admin/rents') }}"><i class="fas fa-warehouse"></i><span>Rents</span></a></li>
<li class="nav-item{{ request()->is('admin/invoices') ? ' active' : '' }}"><a href="{{ url('/admin/invoices') }}"><i class="fas fa-file-invoice-dollar"></i><span>Invoices</span></a></li>
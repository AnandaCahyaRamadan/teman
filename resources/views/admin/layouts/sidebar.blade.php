<div class="l-navbar" id="nav-bar">
  <nav class="nav">
      <div> <a href="" class="nav_link"> <i class='bx bx-qr nav_icon'></i><span class="nav_name">Teman Semarang</span> </a>
          <div class="nav_list">
            <a href="/admin/dashboard" class="nav_link {{ Request::is('admin/dashboard') ? 'active' : '' }}"> <i class='bx bx-home nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
            <a href="/admin/users" class="nav_link {{ Request::is('admin/users*') ? 'active' : '' }}"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> 
            <a href="/admin/konsultasi" class="nav_link {{ Request::is('admin/pusatbantuan*') ? 'active' : '' }}"> <i class='bx bx-help-circle nav_icon'></i> <span class="nav_name">Konsultasi</span> </a> 
            <a href="/admin/pendaftaran" class="nav_link {{ Request::is('admin/pendaftaran*') ? 'active' : '' }}"> <i class='bx bx-list-ul nav_icon'></i> <span class="nav_name">Pendaftaran</span> </a>
            <a href="/admin/posts" class="nav_link {{ Request::is('admin/posts*') ? 'active' : '' }}"> <i class='bx bxs-book-add nav-icon'></i> <span class="nav_name">Postingan</span> </a>
            <a href="/admin/logbook" class="nav_link {{ Request::is('admin/logbook*') ? 'active' : '' }}"> <i class='bx bx-book-content nav_icon'></i> <span class="nav_name">Logbook</span> </a> </div>
      </div> 
        <a href="/logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Log out</span> </a>
    </nav>
</div>
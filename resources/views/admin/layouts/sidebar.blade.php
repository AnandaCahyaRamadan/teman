<div class="l-navbar" id="nav-bar">
  <nav class="nav">
      <div> <a href="" class="nav_link"> <i class='bx bx-qr nav_icon'></i><span class="nav_name">Teman Kota Semarang</span> </a>
          <div class="nav_list">
            <a href="/admin/dashboard" class="nav_link {{ Request::is('admin/dashboard') ? 'active' : '' }}"> <i class='bx bx-home nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
            <a href="/admin/users" class="nav_link {{ Request::is('admin/users*') ? 'active' : '' }}"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> 
            <a href="/admin/pendaftaran" class="nav_link {{ Request::is('admin/pendaftaran*') ? 'active' : '' }}"> <i class='bx bx-list-ul nav_icon'></i> <span class="nav_name">Pendaftaran</span> </a>
            <a href="/admin/posts" class="nav_link {{ Request::is('admin/posts*') ? 'active' : '' }}"> <i class='bx bxs-book-add nav-icon'></i> <span class="nav_name">Postingan</span> </a>
            <a href="/admin/comment" class="nav_link {{ Request::is('admin/comment') ? 'active' : '' }}"> <i class='bx bx-comment-dots'></i> <span class="nav_name">Komentar</span> </a>
            <a href="/admin/logbook" class="nav_link {{ Request::is('admin/logbook*') ? 'active' : '' }}"> <i class='bx bx-book-content nav_icon'></i> <span class="nav_name">Logbook</span> </a> </div>
      </div> 
        <a href="/logout" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Log out</span> </a>
    </nav>
</div>
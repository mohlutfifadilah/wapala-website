<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) != 'dashboard' ? 'collapsed' : '' }}" href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Data</li>

      <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) != 'user' ? 'collapsed' : '' }}" href="{{ route('user.index') }}">
          <i class="bi bi-person"></i>
          <span>Anggota</span>
        </a>
      </li><!-- End -->
      <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) != 'divisi' ? 'collapsed' : '' }}" href="{{ route('divisi.index') }}">
          <i class="bi bi-person"></i>
          <span>Divisi</span>
        </a>
      </li><!-- End -->
      <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) != 'status' ? 'collapsed' : '' }}" href="{{ route('status.index') }}">
          <i class="bi bi-person"></i>
          <span>Status Keanggotaan</span>
        </a>
      </li><!-- End -->
      <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) != 'prodi' ? 'collapsed' : '' }}" href="{{ route('prodi.index') }}">
          <i class="bi bi-person"></i>
          <span>Program Studi</span>
        </a>
      </li><!-- End -->

      <li class="nav-heading">Halaman</li>

      <li class="nav-item">
        <a class="nav-link {{ Request::segment(1) != 'galeri' ? 'collapsed' : '' }}" href="{{ route('galeri.index') }}">
          <i class="bi bi-person"></i>
          <span>Galeri</span>
        </a>
      </li><!-- End -->

    </ul>

  </aside><!-- End Sidebar-->

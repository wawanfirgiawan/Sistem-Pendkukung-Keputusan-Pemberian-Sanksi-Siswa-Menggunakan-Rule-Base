<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">BK-SMK 5 Majene</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">

        @if (Auth::user()->role == "superAdmin")
        <li class="menu-header">Dashboard</li>
        <li>
          <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Administrator</li>
        <li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data</span></a>
          <ul class="dropdown-menu" style="display: none;">
            <li><a class="nav-link" href="{{ route('kelas-index') }}">Kelas</a></li>
            <li><a class="nav-link" href="{{ route('siswa-index') }}">Siswa</a></li>
            <li><a class="nav-link" href="{{ route('tatib-index') }}">Tata Tertib</a></li>
            <li><a class="nav-link" href="{{ route('sanksi-index') }}">Sanski Pelanggaran</a></li>
          </ul>
        </li>
        <li>
          <a href="{{ route('user-create') }}" class="nav-link"><i class="fas fa-users"></i><span>Manajemen User</span></a>
        </li>
        <li class="menu-header">Guru / Siswa</li>
        <li>
        <li>
          <a href="{{ route('lappel-create') }}" class="nav-link"><i class="fas fa-user-edit"></i><span>Lapor Pelanggaran</span></a>
        </li>
        <li class="menu-header">Team BK</li>
        <li>
        <li>
          <a href="{{ route('lappel-index') }}" class="nav-link"><i class="fas fa-user-edit"></i><span>Data Lapor Pelanggaran</span></a>
        </li>
        <li>
          <a href="{{ route('riwayat-select') }}" class="nav-link"><i class="fas fa-receipt"></i><span>Riwayat</span></a>
        </li>
        <li>
          <a href="{{ route('rule-index') }}" class="nav-link"><i class="fas fa-gavel"></i><span>Rule</span></a>
        </li>
        <li>
          <a href="{{ route('laporan_sanksi-index') }}" class="nav-link"><i class="fas fa-id-card"></i><span>Laporan Sanksi</span></a>
        </li>
        @endif
        
        @if (Auth::user()->role == "siswa")
        <li class="menu-header">Dashboard</li>
        <li>
          <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
        </li>
          <li class="menu-header">Guru / Siswa</li>
          <li>
            <li>
              <a href="{{ route('tatib-siswa') }}" class="nav-link"><i class="fas fa-gavel"></i><span>Tata Tertib</span></a>
            </li>
            <li>
              <a href="{{ route('riwayat-siswa') }}" class="nav-link"><i class="fas fa-receipt"></i></i><span>Riwayat Pelanggaran</span></a>
            </li>
          <li>
            <a href="{{ route('lappel-create') }}" class="nav-link"><i class="fas fa-user-edit"></i><span>Lapor Pelanggaran</span></a>
          </li>
          <li class="menu-header">Ganti Password</li>
          <li>
            <a href="{{ route('user-ganti') }}" class="nav-link"><i class="fas fa-key"></i><span>Ganti Password</span></a>
          </li>
        @endif

        @if (Auth::user()->role == "guru")
        <li class="menu-header">Dashboard</li>
        <li>
          <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
        </li>
          <li class="menu-header">Guru</li>
          <li>
            <li>
              <a href="{{ route('tatib-siswa') }}" class="nav-link"><i class="fas fa-gavel"></i><span>Tata Tertib</span></a>
            </li>
            <li>
              <a href="{{ route('riwayat-siswa-semua') }}" class="nav-link"><i class="fas fa-receipt"></i></i><span>Riwayat Pelanggaran</span></a>
            </li>
          <li>
            <a href="{{ route('lappel-create') }}" class="nav-link"><i class="fas fa-user-edit"></i><span>Lapor Pelanggaran</span></a>
          </li>
          <li class="menu-header">Ganti Password</li>
          <li>
            <a href="{{ route('user-ganti') }}" class="nav-link"><i class="fas fa-key"></i><span>Ganti Password</span></a>
          </li>
        @endif

        @if (Auth::user()->role == "bk")
        <li class="menu-header">Dashboard</li>
        <li>
          <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data</span></a>
          <ul class="dropdown-menu" style="display: none;">
            <li><a class="nav-link" href="{{ route('kelas-index') }}">Kelas</a></li>
            <li><a class="nav-link" href="{{ route('siswa-index') }}">Siswa</a></li>
            <li><a class="nav-link" href="{{ route('tatib-index') }}">Tata Tertib</a></li>
            <li><a class="nav-link" href="{{ route('sanksi-index') }}">Sanksi Pelanggaran</a></li>
          </ul>
        </li>
        <li class="menu-header">Team BK</li>
        <li>
          <li>
            <a href="{{ route('rule-index') }}" class="nav-link"><i class="fas fa-gavel"></i><span>Rule</span></a>
          </li>
        <li>
          <a href="{{ route('lappel-index') }}" class="nav-link"><i class="fas fa-user-edit"></i><span>Data Lapor Pelanggaran</span></a>
        </li>
        <li>
          <a href="{{ route('riwayat-select') }}" class="nav-link"><i class="fas fa-receipt"></i><span>Riwayat</span></a>
        </li>
        <li>
          <a href="{{ route('laporan_sanksi-index') }}" class="nav-link"><i class="fas fa-id-card"></i><span>Laporan Sanksi</span></a>
        </li>
        <li class="menu-header">Ganti Password</li>
          <li>
            <a href="{{ route('user-ganti') }}" class="nav-link"><i class="fas fa-key"></i><span>Ganti Password</span></a>
          </li>

        @endif

        @if (Auth::user()->role == "operator")
        <li class="menu-header">Dashboard</li>
        <li>
          <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Operator</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data</span></a>
          <ul class="dropdown-menu" style="display: none;">
            <li><a class="nav-link" href="{{ route('kelas-index') }}">Kelas</a></li>
            <li><a class="nav-link" href="{{ route('siswa-index') }}">Siswa</a></li>
            <li><a class="nav-link" href="{{ route('tatib-index') }}">Tata Tertib</a></li>
            <li><a class="nav-link" href="{{ route('sanksi-index') }}">Sanksi Pelanggaran</a></li>
          </ul>
        </li>
        <li>
          <a href="{{ route('user-create') }}" class="nav-link"><i class="fas fa-users"></i><span>Manajemen User</span></a>
        </li>
        <li class="menu-header">Ganti Password</li>
          <li>
            <a href="{{ route('user-ganti') }}" class="nav-link"><i class="fas fa-key"></i><span>Ganti Password</span></a>
          </li>
        @endif
        @if (Auth::user()->role == "ortu")
        <li class="menu-header">Dashboard</li>
        <li>
          <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Ortu</li>
        <li>
          <a href="{{ route('riwayat-siswa') }}" class="nav-link"><i class="fas fa-receipt"></i></i><span>Riwayat Pelanggaran Anak</span></a>
        </li>
        <li>
          <a href="{{ route('laporan_sanksi-index') }}" class="nav-link"><i class="fas fa-id-card"></i><span>Laporan Sanksi Anak</span></a>
        </li>
        <li class="menu-header">Ganti Password</li>
          <li>
            <a href="{{ route('user-ganti') }}" class="nav-link"><i class="fas fa-key"></i><span>Ganti Password</span></a>
          </li>
        @endif
        @if (Auth::user()->role == "kepsek")
        <li class="menu-header">Dashboard</li>
        <li>
          <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
        </li>
        <li class="menu-header">Kepsek</li>
        <li>
          <a href="{{ route('laporan_sanksi-index') }}" class="nav-link"><i class="fas fa-id-card"></i><span>Laporan Sanksi</span></a>
        </li>
        <li class="menu-header">Ganti Password</li>
        <li>
            <a href="{{ route('user-ganti') }}" class="nav-link"><i class="fas fa-key"></i><span>Ganti Password</span></a>
        </li>
        @endif
      </ul>
    </aside>
  </div>
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="<?= base_url('uploads/pictures/') . $this->session->foto ?>" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block"><?= $this->session->nama ?></a>
    </div>
  </div>

  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <?php if ($this->session->level === 0): ?>
      <li class="nav-item">
        <a href="<?= base_url() ?>admin-dashboard.html" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url() ?>admin-formulir.html" class="nav-link">
          <i class="nav-icon fas fa-list"></i>
          <p>Formulir</p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-file"></i>
          <p>Pengajuan <i class="fas fa-angle-left right"></i></p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url() ?>admin-pengajuan-diproses.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Diproses</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>admin-pengajuan-diterima.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Diterima</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>admin-pengajuan-dipending.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dipending</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>admin-pengajuan-ditolak.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Ditolak</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-database"></i>
          <p>Master Data <i class="fas fa-angle-left right"></i></p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url() ?>admin-daftar-user.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>admin-daftar-admin.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Admin</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Website</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="<?= base_url() ?>admin-pengajuan-report.html" class="nav-link">
          <i class="nav-icon fas fa-print"></i>
          <p>Report</p>
        </a>
      </li>
      <?php elseif($this->session->level === 1): ?>

      <li class="nav-item">
        <a href="<?= base_url() ?>admin-dashboard.html" class="nav-link">
          <i class="nav-icon fas fa-list"></i>
          <p>Pengajuan Anda</p>
        </a>
      </li>

      <?php endif ?>
      <li class="nav-item">
        <a href="<?= base_url() ?>logout.html" class="nav-link">
          <i class="nav-icon fas fa-power-off"></i>
          <p>Logout</p>
        </a>
      </li>
    </ul>
  </nav>

</div>
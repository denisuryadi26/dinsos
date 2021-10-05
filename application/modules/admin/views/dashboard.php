<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?= $title ?></h1>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $jml_user ?></h3>
              <p>User</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?= base_url() ?>admin-daftar-user.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?= $jml_pengajuan ?></h3>
              <p>Pengajuan</p>
            </div>
            <div class="icon">
              <i class="fa fa-file"></i>
            </div>
            <a href="<?= base_url() ?>admin-pengajuan-diproses.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $jml_pengajuan_diproses ?></h3>
              <p>Diproses</p>
            </div>
            <div class="icon">
              <i class="fa fa-hourglass-half"></i>
            </div>
            <a href="<?= base_url() ?>admin-pengajuan-diproses.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $jml_pengajuan_diterima ?></h3>
              <p>Diterima</p>
            </div>
            <div class="icon">
              <i class="fa fa-hourglass"></i>
            </div>
            <a href="<?= base_url() ?>admin-pengajuan-diterima.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-dark">
            <div class="inner">
              <h3><?= $jml_pengajuan_dipending; ?></h3>
              <p>Dipending</p>
            </div>
            <div class="icon">
              <i class="fa fa-times"></i>
            </div>
            <a href="<?= base_url() ?>admin-pengajuan-dipending.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $jml_pengajuan_ditolak; ?></h3>
              <p>Ditolak</p>
            </div>
            <div class="icon">
              <i class="fa fa-times"></i>
            </div>
            <a href="<?= base_url() ?>admin-pengajuan-ditolak.html" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
      </div>
    </div>

  </section>
</div>
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
          <div class="small-box bg-dark">
            <div class="inner">
              <h3><?= $jml_user ?></h3>
              <p>User</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?= base_url() ?>admin-daftar-user.html" class="small-box-footer">Lihat berkas <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $jml_pengajuan ?></h3>
              <p>Total Pengajuan</p>
            </div>
            <div class="icon">
              <i class="fa fa-copy"></i>
            </div>
            <a href="<?= base_url() ?>admin-daftar-pengajuan.html" class="small-box-footer">Lihat berkas <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?= $jml_pengajuan_masuk ?></h3>
              <p>Masuk</p>
            </div>
            <div class="icon">
              <i class="fa fa-arrow-alt-circle-down"></i>
            </div>
            <a href="<?= base_url() ?>admin-pengajuan-masuk.html" class="small-box-footer">Lihat berkas <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $jml_pengajuan_diproses; ?></h3>
              <p>Sedang Diproses</p>
            </div>
            <div class="icon">
              <i class="fas fa-3x fa-sync-alt"></i>
            </div>
            <a href="<?= base_url() ?>admin-pengajuan-diproses.html" class="small-box-footer">Lihat berkas <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $jml_pengajuan_diterima ?></h3>
              <p>Diterima/sah</p>
            </div>
            <div class="icon">
              <i class="fa fa-check-square"></i>
            </div>
            <a href="<?= base_url() ?>admin-pengajuan-diterima.html" class="small-box-footer">Lihat berkas <i class="fas fa-arrow-circle-right"></i></a>
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
            <a href="<?= base_url() ?>admin-pengajuan-ditolak.html" class="small-box-footer">Lihat berkas <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>   

      </div>
    </div>

  </section>
</div>




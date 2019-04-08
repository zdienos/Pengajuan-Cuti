<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title ?></title>
    <!-- css -->
    <?php $this->load->view('include/base_css'); ?>
  </head>
  <body id="page-top">
    <!-- navbar -->
    <?php $this->load->view('include/base_nav'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <!-- Basic Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Kode Pelanggan <?php echo $pegawai['kd_pegawai'] ?></h6>
        </div>
        <div class="card-body">             
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <p>Nama Pegawai     : <b><?php echo $pegawai['nama_pegawai'] ?></b></p>
                  <p>Email    : <b><?php echo $pegawai['email_pegawai']; ?></b></p>
                  <p>Nomor HP     : <b><?php echo $pegawai['no_hp_pegawai'] ?></b></p>
                  <p>Alamat  : <b><?php echo $pegawai['alamat_pegawai']; ?></b></p>
                  <p>Jenis Kelamin : <b><?php echo $pegawai['kelamin_pegawai']; ?></b></p>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
            <hr>
            <a class="btn btn-default" href="javascript:history.back()"> Kembali</a>

          </div>
      </div>
    </div>
  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <?php $this->load->view('include/base_footer'); ?>
  <!-- End of Footer -->
<!-- js -->
<?php $this->load->view('include/base_js'); ?>
</body>
</html>
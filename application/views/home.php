<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- css -->
  <?php $this->load->view('include/base_css'); ?>

</head>

<body id="page-top">

  <!-- navbar -->
  <?php $this->load->view('include/base_nav'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">DashBoard</h1>
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="<?php echo base_url('pegawai') ?>">List Pegewai</a></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pegawai['count(kd_pegawai)']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="<?php echo base_url('cuti') ?>">List Cuti</a></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cuti['count(kd_cuti)']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-qrcode fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="<?php echo base_url('admin') ?>">List Admin</a></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $admin['count(kd_admin)']; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-qrcode fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

         </div>   

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php $this->load->view('include/base_footer'); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- js -->
  <?php $this->load->view('include/base_js'); ?>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tambah Pegawai</title>
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
          <h6 class="m-0 font-weight-bold text-primary">Tambah Pegawai</h6>
        </div>
        <div class="card-body">             
            <div class="card-body">
                <form  action="<?php echo base_url('cuti/ajukancuti') ?>" method="post">
                  <?php echo $this->session->flashdata('pesan'); ?>
                  <div class="form-group row">
                  <label>Pilih Pegewai</label>
                 <select class="form-control js-example-basic-single" name="pegawai" required>
                    <option value="" selected disabled="">-Pilih Pegawai-</option>
                    <?php foreach ($pegawai as $row ) { ?>
                    <option value="<?php echo $row['kd_pegawai'] ?>" ><?php echo $row['nama_pegawai'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group row">
                  <label>Mulai Tanggal Cuti</label>
                  <input type="text" class="form-control datepicker" required="" placeholder="Masukkan Tanggal" name="mulai">
                  <?php echo form_error('mulai'),'<small class="text-danger pl-3">','</small>'; ?>
                </div>
                 <div class="form-group row">
                  <label>Selesai Tanggal Cuti</label>
                  <input type="text" class="form-control datepicker" required="" placeholder="Masukkan Tanggal" name="selesai" >
                  <?php echo form_error('Selesai'),'<small class="text-danger pl-3">','</small>'; ?>
                </div>
                 <div class="form-group row">
                  <label>Alasan Cuti</label>
                  <textarea type="text" class="form-control form-control" required="" placeholder="alasan" name="alasan"> </textarea>
                  <?php echo form_error('alasan'),'<small class="text-danger pl-3">','</small>'; ?>
                </div>
                <a class="btn btn-default" href="javascript:history.back()"> Kembali</a>
                <button type="submit" class="btn btn-primary ">
                  Tambah Cuti
                </button> 
              </form>
          </div>
      </div>
    </div>
  </div>
  <!-- End of Main Content -->
  <!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

  <!-- Footer -->
  <?php $this->load->view('include/base_footer'); ?>
  <!-- End of Footer -->
<?php $this->load->view('include/base_js'); ?>
<script type="text/javascript">
       $(function(){
        var date = new Date();
        date.setDate(date.getDate());

        $(".datepicker").datepicker({
            startDate: date,
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
       });
      </script>
  <script type="text/javascript">
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
    });
  </script>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                
            </div>
          </div>
        </div>
        </div>
</body>
</html>
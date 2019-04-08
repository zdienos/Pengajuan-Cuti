<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CUTI</title>
    <!-- css -->
    <?php $this->load->view('include/base_css'); ?>
  </head>
  <body id="page-top">
    <!-- navbar -->
    <?php $this->load->view('include/base_nav'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <h1 class="h3 mb-2 text-gray-800">Data Cuti</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <a href="<?php echo base_url('cuti/ajukancuti') ?>" class="btn btn-primary pull-right" >
          Ajukan Cuti
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pegawai </th>
                  <th>Tanggal Mulai Cuti</th>
                  <th>Tanggal Selesai Cuti</th>
                  <th>Alasan Cuti</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
               <?php $i = 1 ; foreach ($cuti as $row ) { ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['nama_pegawai'] ?></td>
                  <td><?php echo hari_indo(date('N',strtotime($row['tgl_mulai_cuti']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$row['tgl_mulai_cuti'].''))); ?></td>
                  <td><?php echo hari_indo(date('N',strtotime($row['tgl_selesai_cuti']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$row['tgl_selesai_cuti'].''))); ?></td>
                  <td><?php echo $row['alasan_cuti'] ?></td>
                  <td><a href="<?php echo base_url('cuti/view/'.$row['kd_cuti']) ?>" class="btn btn-primary">View</a></td>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Footer -->
<?php $this->load->view('include/base_footer'); ?>
<!-- End of Footer -->
<!-- Modal -->
<div class="modal fade" id="ModalTujuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Cuti</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>jadwal/tambahjadwal" method="post">
         
          <div class="form-group">
            <label class="">Tanggal Berangkat</label>
            <input placeholder="Masukkan tanggal" type="text" class="form-control datepicker" name="tanggal" required="">
          </div>
          <div class="form-group">
            <label  class="">Jam Berangkat</label>
            <input type="text" class="form-control"  id="timepicker" name="berangkat" required="" placeholder="Jam Berangkat">
          </div>
          <div class="form-group">
            <label  class="">Jam Tiba</label>
            <input type="text" class="form-control"  id="timepicker1" name="tiba" required="" placeholder="Jam Tiba">
          </div>
          <div class="form-group">
            <label  class="">Harga Jadwal</label>
            <input type="number" class="form-control" id="harga" name="harga" required="" placeholder="Harga">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            <button class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- js -->
<?php $this->load->view('include/base_js'); ?>
</body>
</html>
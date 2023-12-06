<head>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<?php
include "conf/conn.php";
$query = mysqli_query($koneksi, "SELECT tanggapan.*, petugas.nama_petugas, pengaduan.isi_laporan FROM tanggapan
                INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas
                INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan            
                ORDER BY tanggapan.id_tanggapan DESC") or die(mysqli_error($koneksi));
$row = mysqli_fetch_array($query)

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      UBAH TANGGAPAN
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">UBAH TANGGAPAN</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="post" action="pages/tanggapan/ubah_tanggapan_proses.php">
            <div class="box-body">
              <input type="hidden" name="id" value="<?php echo $row['id_tanggapan']; ?>">
              <div class="form-group">
                <label>Pengaduan</label>
                <input type="text" name="pengaduan" class="form-control pencarian-pengaduan" value="<?php echo $row['id_pengaduan']; ?>" required>
              </div>
              <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tgl" class="form-control" value="<?php echo $row['tgl_tanggapan']; ?>" required>
              </div>

              <div class="form-group">
                <label>Tanggapan</label>
                <textarea name="tanggapan" class="form-control" required><?php echo $row['tanggapan']; ?></textarea>
              </div>

              <div class="form-group">
                <label>ID Petugas</label>
                <input type="text" name="id_petugas" class="form-control" value="<?php echo isset($row['id_petugas']) ? $row['id_petugas'] : ''; ?>" required>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
            </div>
          </form>
        </div>
        <div class="modal fade" id="pengaduanModal" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title">Pengaduan</h4>
              </div>
              <div class="modal-body">
                <table id="pengaduanTable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>TANGGAL PENGADUAN</th>
                      <th>NIK</th>
                      <th>ISI LAPORAN</th>
                      <th>FOTO</th>
                      <th>STATUS</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    include "conf/conn.php";
                    $no = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM pengaduan ORDER BY id_pengaduan DESC") or die(mysqli_error($koneksi));
                    while ($row = mysqli_fetch_array($query)) {
                    ?>

                      <tr class="pilih-pengaduan" data-laporan="<?php echo $row['id_pengaduan']; ?>">
                        <td><?php echo $no = $no + 1; ?></td>
                        <td><?php echo $row['tgl_pengaduan']; ?></td>
                        <td><?php echo $row['nik']; ?></td>
                        <td><?php echo $row['isi_laporan']; ?></td>
                        <!-- <td><?php echo $row['foto']; ?></td> -->
                        <td><img src="dist/img/<?php echo $row['foto']; ?>" width="150" height="150"></td>
                        <td><?php echo $row['status']; ?></td>
                      </tr>

                    <?php } ?>

                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  $(document).ready(function() {
    $(".pencarian-pengaduan").focusin(function() {
      $("#pengaduanModal").modal('show');
    });

    $(document).on('click', '.pilih-pengaduan', function(e) {
      document.getElementById("pengaduan").value = $(this).attr('data-laporan');
      $("#pengaduanModal").modal('hide');
    });
  });
</script>
<!-- /.box -->
</div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<head>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<?php
$query = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE id_pengaduan='" . $_GET['id'] . "'") or die(mysqli_error($koneksi));
$row = mysqli_fetch_array($query);

// $query =mysqli_query($koneksi,"SELECT * FROM pengaduan ORDER BY id_pengaduan DESC") or die (mysqli_error($koneksi));
//                 while ($row=mysqli_fetch_array($query))

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      UBAH PENGADUAN
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
      <li class="active">UBAH PENGADUAN</li>
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
          <form role="form" method="post" action="pages/pengaduan/ubah_pengaduan_proses.php" enctype="multipart/form-data">
            <div class="box-body">
              <input type="hidden" name="id" value="<?php echo $row['id_pengaduan']; ?>">
              <?php if ($_SESSION["level"] == 'admin' || $_SESSION["level"] == 'masyarakat') { ?>
              <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tgl" class="form-control" value="<?php echo $row['tgl_pengaduan']; ?>">
              </div>
              <div class="form-group">
                <label>Nik</label>
                <input type="text" name="nik" id="nik" class="form-control pencarian" value="<?php echo $row['nik']; ?>" required readonly>
              </div>
              <div class="form-group">
                <label>isi laporan</label>
                <input type="text" name="isi" class="form-control" value="<?php echo $row['isi_laporan']; ?>">
              </div>
              <div class="form-group">
                <label>Foto</label>
                <input type="file" name="gambar"> <!-- Untuk gambar baru -->
                <?php if (!empty($row['foto'])) : ?>
                  <input type="hidden" name="foto_lama" value="<?php echo $row['foto']; ?>"> <!-- Gambar lama -->
                  <p>Gambar saat ini: <?php echo $row['foto']; ?></p>
                <?php endif; ?>
              </div>
              <?php } ?>
              <?php if ($_SESSION["level"] == 'admin' || $_SESSION["level"] == 'petugas') { ?>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                  <option value="0" <?php if ($row['status'] == '0') echo 'selected'; ?>>0</option>
                  <option value="proses" <?php if ($row['status'] == 'proses') echo 'selected'; ?>>proses</option>
                  <option value="selesai" <?php if ($row['status'] == 'selesai') echo 'selected'; ?>>selesai</option>
                </select>
              </div>
              <?php } ?>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>

            </div>
          </form>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title">Masyarakat</h4>
              </div>
              <div class="modal-body">
                <table id="masyarakatTable" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NIK</th>
                      <th>NAMA</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    include "conf/conn.php";
                    $no = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM masyarakat ORDER BY nik DESC") or die(mysqli_error($koneksi));
                    while ($row = mysqli_fetch_array($query)) {
                    ?>

                      <tr class="pilih" data-nik="<?php echo $row['nik']; ?>">
                        <td><?php echo $no = $no + 1; ?></td>
                        <td><?php echo $row['nik']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
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
        <script>
          $(document).ready(function() {
            $(".pencarian").focusin(function() {
              $("#myModal").modal('show');
            });

            // Handle the selection of masyarakat data
            $(document).on('click', '.pilih', function(e) {
              document.getElementById("nik").value = $(this).attr('data-nik');
              // Optionally, you can update other fields as needed
              $("#myModal").modal('hide');
            });
          });
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
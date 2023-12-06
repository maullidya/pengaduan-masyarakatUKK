<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      DATA PENGADUAN
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">DATA PENGADUAN</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
        <?php if ($_SESSION["level"] == 'admin' || $_SESSION["level"] == 'masyarakat' ) { ?>
          <a href="index.php?page=tambah_pengaduan" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
          <?php } ?>
          <button class="btn btn-default" onclick="printData()" title="Print Data"><i class="glyphicon glyphicon-print"></i> Print</button>
          </div>
            <div class="box-body table-responsive">
              <table id="pengaduan" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>ID</th>
                  <th>TANGGAL PENGADUAN</th>
                  <th>NIK</th>
                  <th>ISI LAPORAN</th>
                  <th>FOTO</th>
                  <th>STATUS</th>
                  <?php if ($_SESSION["level"] == 'admin' || $_SESSION["level"] == 'masyarakat') { ?>
                  <th>AKSI</th> <?php }?>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conf/conn.php";
                $no=0;
                $query=mysqli_query($koneksi,"SELECT * FROM pengaduan ORDER BY id_pengaduan DESC") or die (mysqli_error($koneksi));
                while ($row=mysqli_fetch_array($query))
                {
                ?>

                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['id_pengaduan'];?></td>
                  <td><?php echo $row['tgl_pengaduan'];?></td>
                  <td><?php echo $row['nik'];?></td>
                  <td><?php echo $row['isi_laporan'];?></td>
                  <!-- <td><?php echo $row['foto'];?></td> -->
                  <td><img src="dist/img/<?php echo $row['foto'];?>" width="150" height="150"></td>
                  <td><?php echo $row['status'];?></td>
                  <?php if ($_SESSION["level"] == 'admin' || $_SESSION["level"] == 'masyarakat') { ?>
                  <td>
                    <a href="index.php?page=ubah_pengaduan&id=<?=$row['id_pengaduan'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="pages/pengaduan/hapus_pengaduan.php?id=<?=$row['id_pengaduan'];?>" class="btn btn-danger" role="button"  title="Hapus Data"> <onclick="return confirm ('Yakin mau hapus data <?php echo $row['tgl_pengaduan']?>?')"> <i class="glyphicon glyphicon-trash"></i></a>
                  </td> <?php } ?>
                </tr>

                <?php } ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->

<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#pengaduan').DataTable();
  });
  function printData() {
    // Open a new window and write the content to be printed
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>Data Aduan</title></head><body>');

    // Add inline styles for a bordered table
    printWindow.document.write('<style>table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #dddddd; text-align: left; padding: 8px; }</style>');

    // Create a table and copy the content
    printWindow.document.write('<table>');
    printWindow.document.write(document.getElementById('pengaduan').innerHTML);
    printWindow.document.write('</table>');

    printWindow.document.write('</body></html>');
    printWindow.document.close();

    // Call the print function
    printWindow.print();
  }
</script>
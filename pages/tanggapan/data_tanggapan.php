  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      DATA TANGGAPAN
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">DATA TANGGAPAN</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
        <?php if ($_SESSION["level"] == 'admin' || $_SESSION["level"] == 'petugas' ) { ?>
          <a href="index.php?page=tambah_tanggapan" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
          <button class="btn btn-default" onclick="printData()" title="Print Data"><i class="glyphicon glyphicon-print"></i> Print</button>
        </div>
        <?php }?>  
            <div class="box-body table-responsive">
              <table id="tanggapan" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>PENGADUAN</th>
                  <th>TANGGAL TANGGAPAN</th>
                  <th>TANGGAPAN</th>
                  <th>PETUGAS</th>
                  <?php if ($_SESSION["level"] == 'admin' || $_SESSION["level"] == 'petugas' ) { ?>
                  <th>AKSI</th>
                  <?php } ?>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conf/conn.php";
                $no=0;
                $query = mysqli_query($koneksi, "SELECT tanggapan.*, petugas.nama_petugas, pengaduan.isi_laporan FROM tanggapan
                INNER JOIN petugas ON tanggapan.id_petugas = petugas.id_petugas
                INNER JOIN pengaduan ON tanggapan.id_pengaduan = pengaduan.id_pengaduan
                ORDER BY tanggapan.id_tanggapan DESC") or die (mysqli_error($koneksi));
                while ($row=mysqli_fetch_array($query))
                {
                ?>
 
                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['isi_laporan'];?></td>
                  <td><?php echo $row['tgl_tanggapan'];?></td>
                  <td><?php echo $row['tanggapan'];?></td>
                  <td><?php echo $row['nama_petugas'];?></td>
                  <?php if ($_SESSION["level"] == 'admin' || $_SESSION["level"] == 'petugas' ) { ?>

                  <td>
                    <a href="index.php?page=ubah_tanggapan&id_tanggapan=<?=$row['id_tanggapan'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="pages/tanggapan/hapus_tanggapan.php?id_tanggapan=<?=$row['id_tanggapan'];?>" class="btn btn-danger" role="button"  title="Hapus Data"> <onclick="return confirm ('Yakin mau hapus data <?php echo $row['tanggapan']?>?')"> <i class="glyphicon glyphicon-trash"></i></a>
                  </td>
                  <?php } ?>
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
    $('#tanggapan').DataTable();
  });
  function printData() {
    // Open a new window and write the content to be printed
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>Data Tanggapan</title></head><body>');

    // Add inline styles for a bordered table
    printWindow.document.write('<style>table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #dddddd; text-align: left; padding: 8px; }</style>');

    // Create a table and copy the content
    printWindow.document.write('<table>');
    printWindow.document.write(document.getElementById('tanggapan').innerHTML);
    printWindow.document.write('</table>');

    printWindow.document.write('</body></html>');
    printWindow.document.close();

    // Call the print function
    printWindow.print();
  }
</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      DATA PETUGAS
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">DATA PETUGAS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <a href="index.php?page=tambah_petugas" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
          <button class="btn btn-default" onclick="printData()" title="Print Data"><i class="glyphicon glyphicon-print"></i> Print</button>
          </div>
            <div class="box-body table-responsive">
              <table id="petugas" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>NAMA</th>
                  <th>USERNAME</th>
                  <th>PASSWORD</th>
                  <th>TELP</th>
                  <th>LEVEL</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conf/conn.php";
                $no=0;
                $query=mysqli_query($koneksi,"SELECT * FROM petugas ORDER BY id_petugas DESC") or die (mysqli_error($koneksi));
                while ($row=mysqli_fetch_array($query))
                {
                ?>

                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['nama_petugas'];?></td>
                  <td><?php echo $row['username'];?></td>
                  <td><?php echo $row['password'];?></td>
                  <td><?php echo $row['telp'];?></td>
                  <td><?php echo $row['level'];?></td>
                  <td>
                    <a href="index.php?page=ubah_petugas&id=<?=$row['id_petugas'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="pages/petugas/hapus_petugas.php?id=<?=$row['id_petugas'];?>" class="btn btn-danger" role="button"  title="Hapus Data"><i class="glyphicon glyphicon-trash"></i></a>
                  </td>
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
    <script type="text/javascript">
  function printData() {
    // Open a new window and write the content to be printed
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>Data Petugas</title></head><body>');

    // Add inline styles for a bordered table
    printWindow.document.write('<style>table { border-collapse: collapse; width: 100%; } th, td { border: 1px solid #dddddd; text-align: left; padding: 8px; }</style>');

    // Create a table and copy the content
    printWindow.document.write('<table>');
    printWindow.document.write(document.getElementById('petugas').innerHTML);
    printWindow.document.write('</table>');

    printWindow.document.write('</body></html>');
    printWindow.document.close();

    // Call the print function
    printWindow.print();
  }
</script>

    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->

<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#petugas').DataTable();
  });
</script>

<?php
$query = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE nik='".$_GET['nik']."'")or die (mysqli_error($koneksi));
$row=mysqli_fetch_array($query);

?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      UBAH MASYARAKAT
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">UBAH MASYARAKAT</li>
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
            <form role="form" method="post" action="pages/masyarakat/ubah_masyarakat_proses.php">
              <div class="box-body">
              <div class="form-group">
                  <label>Nik</label>
                  <input type="text" name="nik" class="form-control" value="<?php echo $row['nik']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="usn" class="form-control" value="<?php echo $row['username']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="pass" class="form-control" value="<?php echo $row['password']; ?>" required>
                </div>
                <div class="form-group">
                  <label>No. Telp</label>
                  <input type="number" name="telp" class="form-control" value="<?php echo $row['no_telp']; ?>" required>
                </div>
               </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
            
            </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
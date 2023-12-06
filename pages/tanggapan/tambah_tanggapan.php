<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      TAMBAH TANGGAPAN
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">TAMBAH TANGGAPAN</li>
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
            <form role="form" method="post" action="pages/tanggapan/tambah_tanggapan_proses.php">
              <div class="box-body">
              <div class="form-group">
                  <label>Pengaduan</label>
                  <input type="text" name="pengaduan" id="pengaduan" class="form-control pencarian-pengaduan" placeholder="Pengaduan" required>
                </div>
                <div class="form-group">
                  <label>Tanggal Tanggapan</label>
                  <input type="date" name="tgl" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Isi Tanggapan</label>
                <textarea name="tanggapan" class="form-control" required></textarea>
                </div>
                  <input type="hidden" name="petugas" id="petugas" value="<?php echo  $_SESSION['id_petugas']?>">
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
                    $query=mysqli_query($koneksi,"SELECT * FROM pengaduan ORDER BY id_pengaduan DESC") or die (mysqli_error($koneksi));
                    while ($row = mysqli_fetch_array($query)) {
                    ?>

                      <tr class="pilih-pengaduan" data-laporan="<?php echo $row['id_pengaduan']; ?>">
                      <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['tgl_pengaduan'];?></td>
                  <td><?php echo $row['nik'];?></td>
                  <td><?php echo $row['isi_laporan'];?></td>
                  <!-- <td><?php echo $row['foto'];?></td> -->
                  <td><img src="dist/img/<?php echo $row['foto'];?>" width="150" height="150"></td>
                  <td><?php echo $row['status'];?></td>
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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>     
        <div class="modal fade" id="petugasModal" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"></button>
                <h4 class="modal-title">Petugas</h4>
              </div>
              <div class="modal-body">
                <table id="petugasTable" class="table table-bordered">
                  <thead>
                    <tr>
                    <th>#</th>
                  <th>NAMA</th>
                  <th>USERNAME</th>
                  <th>PASSWORD</th>
                  <th>TELP</th>
                  <th>LEVEL</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    include "conf/conn.php";
                    $no = 0;
                    $query=mysqli_query($koneksi,"SELECT * FROM petugas ORDER BY id_petugas DESC") or die (mysqli_error($koneksi));
                    while ($row = mysqli_fetch_array($query)) {
                    ?>

                      <tr class="pilih-petugas" data-nama="<?php echo $row['id_petugas']; ?>">
                      <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['nama_petugas'];?></td>
                  <td><?php echo $row['username'];?></td>
                  <td><?php echo $row['password'];?></td>
                  <td><?php echo $row['telp'];?></td>
                  <td><?php echo $row['level'];?></td>
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
            $(".pencarian-petugas").focusin(function() {
              $("#petugasModal").modal('show');
            });

            $(document).on('click', '.pilih-petugas', function(e) {
              document.getElementById("petugas").value = $(this).attr('data-nama');
              $("#petugasModal").modal('hide');
            });
          });
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>     
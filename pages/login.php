<?php
include "../conf/conn.php";
include "../conf/session.php";

if (isset($_POST['username'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $status = $_POST['level'];

  if ($status == 'admin') {
    $sql = "SELECT * FROM petugas  WHERE username = '$username' AND password = '$password' AND level = '$status'";
    $result = mysqli_query($koneksi, $sql);
  
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['id_petugas'] = $row['id_petugas'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['nama'] = $row['nama_petugas'];
      $_SESSION['level'] = $row['level'];
      header("location: ../index.php");
    } else {
      $error = "Username, password, atau level salah";
    }
  }if ($status == 'petugas') {
    $sql = "SELECT * FROM petugas  WHERE username = '$username' AND password = '$password' AND level = '$status'";
    $result = mysqli_query($koneksi, $sql);
  
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['id_petugas'] = $row['id_petugas'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['nama'] = $row['nama_petugas'];
      $_SESSION['level'] = $row['level'];
      header("location: ../index.php");
    } else {
      $error = "Username, password, atau level salah";
    }
  }if ($status == 'masyarakat'){
    $sql = "SELECT * FROM masyarakat  WHERE username = '$username' AND password = '$password' AND level = '$status'";
    $result = mysqli_query($koneksi, $sql);
  
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['nik'] = $row['nik'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['nama'] = $row['nama'];
      $_SESSION['level'] = $row['level'];
      header("location: ../index.php");
    } else {
      $error = "Username, password, atau level salah";
    }
  }
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tambahkan file CSS Bootstrap jika belum ada -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="../src/login.css" rel="stylesheet" />
</head>
<body>
<form method="post" action="">
<section class="vh-100" style="background-color: #E0E0E0;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
                <h2 class="text-center">Login</h2>
                    <?php if (isset($error)) { ?>
                      <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                      <label>Level</label>
                      <select class="form-control" name="level">
                        <option value="petugas">Petugas</option>
                        <option value="admin">Admin</option>
                        <option value="masyarakat">Masyarakat</option>
                      </select>
                    </div>
                    <div>
                      <p class="mb-0">Don't have an account? <a href="reg.php" class="text-black-50 fw-bold">Register!</a></p>
                    </div><br>
                    <button type="submit" class="btn btn-primary btn-block" href="index.php">Login</button>
            </div>
        </div>
    </div>
    </form>
    <!-- Tambahkan file JavaScript Bootstrap jika diperlukan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
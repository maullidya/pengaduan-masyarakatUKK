<?php
include "../conf/conn.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input from the form
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telp = $_POST['telp'];

    // You should add validation and sanitization here

    // Perform the registration process (insert into the database)
    $query = "INSERT INTO masyarakat (nik,nama, username, password, no_telp) VALUES ('$nik', '$nama', '$username', '$password', '$telp')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo '<script>alert("Registrasi berhasil. Silahkan Log in.");
        window.location.href="login.php"</script>';
    } else {
        echo '<script>alert("Registrasi gagal. Silahkan mencoba lagi.");
        window.location.href="reg.php"</script>';
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

<section class="vh-100" style="background-color: #E0E0E0;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
                <h2 class="text-center">Register</h2>
                <form action="" method="post">
                <div class="form-group">
                        <label for="nik">Nik:</label>
                        <input type="text" class="form-control" id="nik" name="nik" required>
                    </div>
                    <div class="form-group">
                        <label for="nik">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password">No Telp:</label>
                        <input type="number" class="form-control" id="telp" name="telp" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
        </div>
    </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
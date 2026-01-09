<?php

session_start();


include "koneksi.php";


if (isset($_SESSION['username'])) { 
	header("location:admin.php"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['user'];
  
 
  $password = md5($_POST['pass']);

	
  $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

	 
  $stmt->bind_param("ss", $username, $password);
  
  
  $stmt->execute();
  
 
  $hasil = $stmt->get_result();
  
  
  $row = $hasil->fetch_array(MYSQLI_ASSOC);

  
  if (!empty($row)) {
    
    $_SESSION['username'] = $row['username'];

    
    header("location:admin.php");
  } else {
	  
    header("location:login.php");
  }

	
  $stmt->close();
  $conn->close();
} else {
?>


<?php
// Deklarasikan variabel
$username_valid = "admin";
$password_valid = "123456";

$login_error = ""; 
$input_username = '';
$input_password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['user'] ?? '';
    $input_password = $_POST['pass'] ?? '';

    // Logika Login
    if ($input_username === $username_valid && $input_password === $password_valid) {
         
        
        $login_error = "LOGIN BERHASIL!"; 
    } else {
        $login_error = "Username atau Password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login | My Daily Journal</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      xintegrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <link rel="icon" href="img/logo.png" />
    <style>
        :root {
            --bs-primary: #D17887; 
            --bs-primary-rgb: 209, 120, 135;
        }
        .btn-primary {
            --bs-btn-bg: var(--bs-primary);
            --bs-btn-border-color: var(--bs-primary);
            --bs-btn-hover-bg: #FF85A2;
            --bs-btn-hover-color: #ffffff;
            --bs-btn-hover-border-color: #FF85A2;
        }
        .bg-primary {
            background-color: var(--bs-primary) !important;
        }
        .bg-danger-subtle {
            background-color: #FADADD !important; 
        }
        /* Style kustom untuk kotak simulasi pink */
        .alert-custom-pink {
            --bs-alert-bg: #f1c3cdff; /* Pink muda */
            --bs-alert-color: #495057;
            border-color: #ca758bff;
        }
    </style>
  </head>
  <body class="bg-danger-subtle">
    
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card border-0 shadow rounded-5">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <i class="bi bi-person-circle h1 display-4 text-primary"></i>
                            <p class="h5">Welcome to My Daily Journal</p>
                            <hr />
                        </div>
                        
                        <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): 
                            $alert_class = ($input_username === $username_valid && $input_password === $password_valid) ? 'success' : 'danger';
                            $icon_class = ($alert_class == 'success') ? 'check-circle-fill' : 'exclamation-triangle-fill';
                        ?>
                        <!-- Menampilkan pesan Berhasil/Gagal di bagian atas form -->
                        <div class="alert alert-<?php echo $alert_class; ?> py-2" role="alert">
                            <i class="bi bi-<?php echo $icon_class; ?>"></i> <?php echo $login_error; ?>
                        </div>
                        <?php endif; ?>

                        <form action="" method="post">
                            <input
                                type="text"
                                name="user"
                                class="form-control my-4 py-2 rounded-4"
                                placeholder="Username"
                                required
                            />
                            <input
                                type="password"
                                name="pass"
                                class="form-control my-4 py-2 rounded-4"
                                placeholder="Password"
                                required
                            />
                            <div class="text-center my-3 d-grid">
                                <button class="btn btn-primary rounded-4">Login</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <a href="index.php" class="btn btn-sm btn-outline-secondary"><i class="bi bi-house-door-fill"></i> Kembali ke Beranda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
   
    <div class="container mt-4">
        <div class="row">
             <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="alert alert-custom-pink">
                    <p class="mb-1">User: Admin</p>
                    <p class="mb-2">Password: 123456</p>
                    <hr>
                    <?php
                    // Menampilkan pesan BENAR/SALAH hanya jika form telah disubmit
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        echo "<h6>Status Login:</h6>";

                        // Validasi Ulang untuk Display Simulasi
                        if($input_username == $username_valid && $input_password == $password_valid){
                            echo "<p class='text-success'><strong>Username dan Password Benar</strong></p>";
                        }else{
                            echo "<p class='text-danger'><strong>Username dan Password Salah</strong></p>";
                        }
                    } else {
                        echo "<p class='text-muted'>*Belum ada data yang dikirimkan. Silakan coba login.*</p>";
                    }
                    ?>
                </div>
             </div>
        </div>
    </div>
        
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      xintegrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

<?php
}
?>
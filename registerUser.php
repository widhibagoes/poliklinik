<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {
        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = $mysqli->query($query);

        if ($result === false) {
            die("Query error: " . $mysqli->error);
        }

        if ($result->num_rows == 0) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $insert_query = "INSERT INTO user (username, password) VALUES ('$username', '$hashed_password')";
            if (mysqli_query($mysqli, $insert_query)) {
                echo "<script>
                alert('Pendaftaran Berhasil'); 
                document.location='index.php?page=loginUser';
                </script>";
            } else {
                $error = "Pendaftaran gagal";
            }
        } else {
            $error = "Username sudah digunakan";
        }
    } else {
        $error = "Password tidak cocok";
    }
}
?>
<style>

    .card {
        border: none;
    }

    .card-header {
        background-color: #007BFF;
        color: black;
        font-weight: bold; /* Make the text bold */
        font-size: 18px;   /* Specify the font size, adjust as needed */
    }

    .card-body {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-label {
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #007BFF;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .text-danger {
        color: #dc3545;
    }

    a {
        color: #007BFF;
    }

    a:hover {
        text-decoration: none;
    }
</style>    
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Bootstrap Offline -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!-- Bootstrap Online -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include_once("koneksi.php"); ?>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                <div class="card-header text-center" style="font-weight: bold; font-size: 32px;">Register</div>
                    <div class="card-body">
                        <form method="POST" action="index.php?page=registerUser">
                            <?php
                                if (isset($error)) {
                                    echo '<div class="alert alert-danger">' . $error . '
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>';
                                }
                            ?>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" required placeholder="Masukkan nama anda">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" required placeholder="Masukkan password">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" required placeholder="Masukkan password konfirmasi">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </form>
                        <div class="text-center">
                            <p class="mt-3">Sudah Punya Akun? <a href="index.php?page=loginUser">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRfJ9f5jz3I4/3r5F5I5j5qofnVf5U1kAl7vC4ks7x" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-nDLU77O4f9vG4JqF01f8Uxl5KveGqZyl5Ci8FQITu97uQOGcnJw92ag0C6w5W/pj" crossorigin="anonymous"></script>
</body>

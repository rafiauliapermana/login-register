<?php
    session_start();
 
?>
<?php
include "./database/config.php";
$err = array();
if (isset($_POST['login'])) {
    array_push($err,"Harap masukan email");
    $username = $_POST['username'];
    // $no_user = $_POST['no_user'];
    $cek_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    $row      = mysqli_num_rows($cek_user);
    if ($row == 1) {
        $fetch_pass = mysqli_fetch_assoc($cek_user);
        $cek_pass = $fetch_pass['username'];
        if ($cek_pass != $username) {
        echo "<script>alert('No salah');</script>";
        } else{
        $_SESSION['log'] =  $fetch_pass ;
        $_SESSION['username'] = $username;
        echo "<script>alert('Konfirmasi Berhasil');document.location.href='lupa-pass.php';</script>";
        }
    } else {
    echo "<script>alert('email/no salah');</script>";
    }
}
?>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> Reset Password </title>
<link href="css/css.css" rel="stylesheet" type="text/css" media="all" />


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://pandyaripal.blogspot.com/2021/07/bootstrap-5-with-css-bootstrap-login.html">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<style>
body {
	font-family: 'Varela Round', sans-serif;
}
.modal-login {		
	color: #636363;
	width: 350px;
}
.modal-login .modal-content {
	padding: 20px;
	border-radius: 5px;
	border: none;
}
.modal-login .modal-header {
	border-bottom: none;   
	position: relative;
	justify-content: center;
}
.modal-login h4 {
	text-align: center;
	font-size: 26px;
	margin: 30px 0 -15px;
}
.modal-login .form-control:focus {
	border-color: #70c5c0;
}
.modal-login .form-control, .modal-login .btn {
	min-height: 40px;
	border-radius: 3px; 
}
.modal-login .close {
	position: absolute;
	top: -5px;
	right: -5px;
}	
.modal-login .modal-footer {
	background: #ddf002;
	border-color: #dee4e7;
	text-align: center;
	justify-content: center;
	margin: 0 -20px -20px;
	border-radius: 5px;
	font-size: 13px;
}
.modal-login .modal-footer a {
	color: white;
}		
.modal-login .avatar {
	position: absolute;
	margin: 0 auto;
	left: 0;
	right: 0;
	top: -70px;
	width: 95px;
	height: 95px;
	border-radius: 50%;
	z-index: 9;
	background: #60c7c1;
	padding: 15px;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.modal-login .avatar img {
	width: 100%;
}
.modal-login.modal-dialog {
	margin-top: 80px;
}
.modal-login .btn, .modal-login .btn:active {
	color: #fff;
	border-radius: 4px;
	background: #60c7c1 !important;
	text-decoration: none;
	transition: all 0.4s;
	line-height: normal;
	border: none;
}
.modal-login .btn:hover, .modal-login .btn:focus {
	background: #45aba6 !important;
	outline: none;
}
.trigger-btn {
	display: inline-block;
	margin: 100px auto;
}
</style>
</head>

<body>
<div class="text-center">
	<!-- Button HTML (to Trigger Modal) -->
	<a href="#myModal" class="trigger-btn" data-toggle="modal">Reset Password Here</a>
</div>

<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">		
				<h4 class="modal-title">Reset Passsword</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="Username" required="required">		
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password" required="required">	
					</div>        
					<div class="form-group">
						<button type="submit" class="btn btn-success btn-lg btn-block login-btn" name="login">Login</button>
					</div>
				</form>
			</div>
			<!-- <div class="login-help">
    <a href="registrasi.php">Register</a> ??? <a href="lupa-pass.php">Forgot Password</a>
    </div> -->
    </div>
		</div>
	</div>
</div>  
</body>
</html>
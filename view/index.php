<?php
include '../controller/Auth.php';

$ctrl = new Auth();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>login_adinda</title>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=3306cc45003c36350c4b5fb8bb1d51b9">
<link rel="stylesheet" href="assets/fonts/ionicons.min.css?h=a436bee1e5ae414f98db7ca13adfd7c0">
<link rel="stylesheet" href="assets/css/styles.min.css?h=149bcb86f63a745480deb3b8261e0376">
</head>
<body>
	<?php
            if (isset($_GET['pesan'])=='success' && (isset($_GET['frm']))== 'logout') {
                 ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Berhasil!</strong>Anda berhasil Logout.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                }
                 ?>
           <!--       <?php
            if (isset($_GET['pesan'])=='gagal' && (isset($_GET['frm']))== 'login') {
                 ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
             <strong>Gagal!</strong>Username atau Password salah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php 
                }
                 ?> -->
	<section class="login-clean"><form method="post" action="<?php echo $ctrl->login();?>">
		<h2 class="visually-hidden">Login Form</h2>
		<div class="illustration"><i class="icon ion-ios-navigate"></i></div>
		<div class="mb-3"><input class="form-control" type="text" name="user" placeholder="Username"></div>
		<div class="mb-3"><input class="form-control" type="password" name="pass" placeholder="Password"></div>
<!-- tentukan letak script generate gambar -->
<div>
<td><img src="captcha.php"  alt="gambar" /> </td>
</tr>
</div>
<td>Isikan captcha </td>
<td><input name="code" value="" maxlength="5"/></td>
         
<tr>
		<div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" name="login">Log In</button></div>
		
		<!-- <footer class="footer-basic">
			<div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a>
				<a href="#"><i class="icon ion-social-snapchat"></i></a>
				<a href="#"><i class="icon ion-social-twitter"></i></a>
				<a href="#"><i class="icon ion-social-instagram"></i></a>
			</div><ul class="list-inline"><li class="list-inline-item"><a href="#">Home</a></li>
				<li class="list-inline-item"><a href="#">Services</a></li>
				<li class="list-inline-item"><a href="#">About</a></li>
				<li class="list-inline-item"><a href="#">Terms</a></li>
				<li class="list-inline-item"><a href="#">Privacy Policy</a></li>
			</ul><p class="copyright">Adinda Nur Aulia Rizki © MI20B</p></footer> -->
		
<script src="assets/bootstrap/js/bootstrap.min.js?h=0de0a05340ecfd010938b6967a030757"></script>
</body>
</html>

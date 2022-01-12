<?php
	include '../Database.php';
	include '../model/Auth_model.php';
class Auth{

	public $model;

	function __construct(){
		$db = new Database();
		$conn = $db->DBConnect();
		$this->model = new Auth_model($conn);
		//menghilangkan pesan error
	}

	function index(){	//function index = pertama kali diakses

		$pegawai = $this->model->tampil_data();

		return $pegawai;
	}
	function acakCaptcha() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
   
//untuk menyatakan $pass sebagai array
$pass = array(); 
 
   //masukkan -2 dalam string length
    $panjangAlpha = strlen($alphabet) - 2; 
    for ($i = 0; $i < 5; $i++) {
        $n = rand(0, $panjangAlpha);
        $pass[] = $alphabet[$n];
    }
 
   //ubah array menjadi string
    return implode($pass); 
}
	// function captcha(){
	// 	session_start();
	// 	header("Content-type: image/png");
 
	// 	// menentukan session
	// 	$_SESSION["Captcha"]="";
		 
	// 	// membuat gambar dengan menentukan ukuran
	// 	$gbr = imagecreate(200, 50);
		 
	// 	//warna background captcha
	// 	imagecolorallocate($gbr, 69, 179, 157);
		 
	// 	// pengaturan font captcha
	// 	$color = imagecolorallocate($gbr, 253, 252, 252);
	// 	$font = "Allura-Regular.otf"; 
	// 	$ukuran_font = 20;
	// 	$posisi = 32;
	// 	// membuat nomor acak dan ditampilkan pada gambar
	// 	for($i=0;$i<=5;$i++) {
	// 		// jumlah karakter
	// 		$angka=rand(0, 9);
		 
	// 		$_SESSION["Captcha"].=$angka;
		 
	// 		$kemiringan= rand(20, 20);
		 	
	// 		imagettftext($gbr, $ukuran_font, $kemiringan, 8+15*$i, $posisi, $color, $font, $angka);	
	// 		}
	// 		imagepng($gbr); 
	// 		imagedestroy($gbr);
	// }
	function login(){
		if(isset($_POST['login']))
		{
			session_start();
			if ($_POST["code"] != $_SESSION["code"] OR $_SESSION["code"]=='') {
			}else{
			$user = strip_tags($_POST['user']);
			$pass = strip_tags($_POST['pass']);
			$result = $this->model->proses_login($user,$pass);

			if($result == 'gagal')
			{
				header("Location:index.php?pesan=gagal&frm=login");
			}else{
				session_start();
				$_SESSION['nama_pengguna'] = $result['nama_pengguna'];
				$_SESSION['username'] = $result['username'];
				header("Location:content.php?pesan=success&frm=login");
			}
		}

	}
}
}



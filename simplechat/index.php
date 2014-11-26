<?PHP
include("koneksi.php");
if (isset($_SESSION['login_chat_gue'])){
header("location:home.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Contoh Program Chattingan Mirip Facebook - Megasoft Informer</title>
<meta name='Author' content='Dewa'/>
<meta name='Description' content='Contoh Program Chattingan Mirip Facebook Menggunakan PHP'/>
<link rel='stylesheet' type='text/css' href='bootstrap/bootstrap.css'/>
</head>
<body>
<div class='container' style='margin-top:20px;'>
	<?PHP
	if (isset($_SERVER['HTTP_REFERER'])){
	if (isset($_GET['pesan'])){
	$pesan = $_GET['pesan'];
	$isi = $_GET['isi'];
	if ($pesan == 1){
	echo "
	<div class='alert alert-success'>
	<a class='close' data-dismiss='alert'>×</a>
	<strong>Sukses!</strong> $isi.
	</div>
	";
	}
	if ($pesan == 2){
	echo "
	<div class='alert alert-danger'>
	<a class='close' data-dismiss='alert'>×</a>
	<strong>Gagal!</strong> $isi.
	</div>
	";
	}
	if ($pesan == 3){
	echo "
	<div class='alert alert-info'>
	<a class='close' data-dismiss='alert'>×</a>
	<strong>Info!</strong> $isi.
	</div>
	";
	}
	}
	}
	?>
	<div class='span4 well'>
	<form action='ceklogin.php' method='post'>
		<p style='color:red'><b>Masuk ke Aplikasi Chattingan.</b></p>
		Username :
		<div class="input-prepend">
						<dewa class="add-on"><i class="icon icon-user"></i></dewa>
						<input required type='text' name='nama' style='width:260px;'/>
		</div>				
		Password :
		<div class="input-prepend">
						<dewa class="add-on"><i class="icon icon-lock"></i></dewa>
						<input required type='password' name='pass' style='width:260px;'/>
		</div>
		<button class='btn btn-primary'><dewa class='icon icon-white icon-lock'></dewa> Masuk</button>
	</form>
	</div>
	<div class='span4 well'>
	<form action='cekdaftar.php' method='post'>
		<p style='color:red'><b>Mendaftar ke Aplikasi Chattingan.</b></p>
		Username : <dewa style='color:red'>(Tidak bisa mengandung spasi)</dewa>
		<div class="input-prepend">
						<dewa class="add-on"><i class="icon icon-user"></i></dewa>
						<input required type='text' name='nama' style='width:260px;'/>
		</div>				
		Email :
		<div class="input-prepend">
						<dewa class="add-on"><i class="icon icon-envelope"></i></dewa>
						<input required type='text' name='email' style='width:260px;'/>
		</div>
		Password :
		<div class="input-prepend">
						<dewa class="add-on"><i class="icon icon-lock"></i></dewa>
						<input required type='password' name='pass' style='width:260px;'/>
		</div>
		<button class='btn btn-primary'><dewa class='icon icon-white icon-user'></dewa> Daftar</button>
	</form>
	</div>
	<div class='span2 well'>
	<form action='cekdaftar.php' method='post'>
		<p style='color:red'>Stats.</p>
		<?PHP
		$sql_user = mysql_query("select * from user");
		$jumlah_user = mysql_num_rows($sql_user);
		$sql_chat = mysql_query("select * from chat");
		$jumlah_chat = mysql_num_rows($sql_chat);
		$sql_user_online = mysql_query("SELECT * FROM `user` WHERE `on` =1");
		$jumlah_user_online = mysql_num_rows($sql_user_online);
		?>
		Jumlah User : <b><?PHP echo $jumlah_user; ?></b><br>
		Jumlah Chat : <b><?PHP echo $jumlah_chat; ?></b><br>
		User Online : <b><?PHP echo $jumlah_user_online; ?></b><br>
	</form>
	</div>
</div>
</body>
</html>
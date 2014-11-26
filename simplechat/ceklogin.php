<?PHP
include("koneksi.php");
$nama = $_POST['nama'];
$pass = $_POST['pass'];
$sql = mysql_query("select * from user where nama='$nama' and pswd='$pass'");
if (mysql_num_rows($sql) == 1){
//berhasil login
$log = date("H:i d M Y");
$_SESSION['login_chat_gue'] = $nama; //set session login
header("location:home.php");
}else{
//gagal login
echo "Gagal Login! ".mysql_error();
}
?>

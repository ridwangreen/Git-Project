<?PHP
include("koneksi.php");
$nama = $_POST['nama'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$nama = str_replace(" ", "_", $nama);
//cek username udah di pake apa belum
$sql = mysql_query("select * from user where nama='$nama'");
if (mysql_num_rows($sql) == 1){
//username sudah di pakai orang lain login
header("location:index.php?pesan=2&isi=Username $nama Sudah di gunakan oleh user lain. coba gunakan username yang lainya");
}else{
$sql_create = mysql_query("insert into user values('', '$nama', '$pass', '0', '')");
header("location:index.php?pesan=1&isi=Berhasil Membuat Akun baru dengan username $nama Silahkan Gunakan Username tersebut untuk masuk ke aplikasi chattingan");
}
?>

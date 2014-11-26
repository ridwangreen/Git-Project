<?PHP
SESSION_START();
$host = "localhost";
$user = "root";
$pass = "";
$db = "dewachat";
$con = mysql_connect($host, $user, $pass);
if (!$con){
echo "Koneksi gagal Kerena ".mysql_error();
}else{
mysql_selectdb($db,$con);
}
date_default_timezone_set("Asia/Jakarta");
//untuk otomatis mengeluarkan user yang lupa keluar
include("auto_logout.lib.php");
?>
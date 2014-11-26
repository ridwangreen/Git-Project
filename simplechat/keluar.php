<?PHP
include("koneksi.php");
$nama_gue = $_SESSION['login_chat_gue'];
$sql_offline = mysql_query("UPDATE `user` SET `on`=0 WHERE nama='$nama_gue'");
session_destroy();
header("location:index.php");
?>
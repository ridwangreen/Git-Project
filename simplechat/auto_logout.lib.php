<?PHP
#function auto logout
function expirated_login($last_log){
$my_time_log = "$last_log";
$my_time_now = date('H:i');
$my_time_log_1 = substr($my_time_log, 0, 2);
$my_time_log_2 = substr($my_time_log, 3, 4);
$menit_log_1 = $my_time_log_1 * 60;
$total_menit_log = $menit_log_1 + $my_time_log_2;
$my_time_now_1 = substr($my_time_now, 0, 2);
$my_time_now_2 = substr($my_time_now, 3, 4);
$my_now_1 = $my_time_now_1 * 60;
$total_menit_now = $my_now_1 + $my_time_now_2;
$hasil_waktu = $total_menit_now - $total_menit_log;
$last_log = $hasil_waktu;
return $last_log;
}
#############################################################################
if (!empty($_SESSION['login_chat_gue'])){
#update user last log
$nama = $_SESSION['login_chat_gue'];
$log = date("H:i d M Y");
$sql = mysql_query("update user set `log`='$log', `on`='1' where `nama`='$nama'");
}
#for auto logout user has been close but he not click logout.php
$sql_log = mysql_query("select * from user where `on`='1'");
while ($data = mysql_fetch_array($sql_log)){
$last_log = $data['log'];
$his_name = $data['nama'];
$last_log = substr("$last_log", 0,5);
$hasilnya = expirated_login("$last_log");
if ($hasilnya>10){ //jika tidak ada perubahan dalam 10 menit maka anggap user tersebut sudah logout
$sql_out = mysql_query("update user set `on`='0' where `nama`='$his_name'");
}
}
?>
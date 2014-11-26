<?PHP
SESSION_START();
if (isset($_SESSION['login_chat_gue'])){
$username = $_SESSION['login_chat_gue'];
}else{
header("location:index.php");
exit();
}
?>
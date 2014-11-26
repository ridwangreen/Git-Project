<?PHP
include("koneksi.php");
include("cek_session.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Contoh Program Chattingan Mirip Facebook - <?PHP echo $username; ?></title>
<meta name='Author' content='Dewa'/>
<meta name='Description' content='Contoh Program Chattingan Mirip Facebook'/>
<link rel='stylesheet' type='text/css' href='bootstrap/bootstrap.css'/>
<link type="text/css" rel="stylesheet" media="all" href="css/chat.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/chat.js"></script>
</head>
<body>
<style>
body {
	background-color: #eeeeee;
	font-family:"Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;
	font-size:11px;
}
</style>
<div class='container' style='margin-top:20px;'>
	<div class='well'>
		<p>Contoh Program : <b>Chattingan Secara Realtime(Tanpa menggunakan reload page) seperti chat pada facebook</b></p>
		<p>Selamat Datang <b><?PHP echo $username; ?></b>
		<p style='color:red;'>Semua List User Yang Terdaftar :</p>
		<table style='margin-top:10px;' class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
					  <th>Terakhir Login</th>
                      <th>Status</th>
					  <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
				  <?PHP
					$no = 1;
					$sql_bro = "select * from user where nama!='$username'";
					$sql_bro = mysql_query($sql_bro);
					while($data_bro =  mysql_fetch_array($sql_bro)){
					$bro_nama = $data_bro['nama'];
					$bro_log = $data_bro['log'];
					$bro_on = $data_bro['on'];
					if ($bro_on == 1){
					$on = "online.png";
					$on_kata = "Lagi Online";
					}else{
					$on = "offline.png";
					$on_kata = "Lagi Offline";
					}
				  ?>
				  <tr>
					  <td><?PHP echo "$no" ?></td>
					  <td><a href="javascript:void(0)" onClick="javascript:chatWith('<?PHP echo $bro_nama; ?>')"><?PHP echo "<b>$bro_nama</b>" ?></a></td>
					   <td><?PHP echo "$bro_log"; ?></td>
					  <td><?PHP echo "<img src='bootstrap/$on' title='$on_kata' height='16' width='16'/>"; ?></td>
					  <td>
					  <div class='btn-group'>
					  <a href="javascript:void(0)" onClick="javascript:chatWith('<?PHP echo $bro_nama; ?>')" class='btn btn-mini' title='<?PHP echo "Mulai Chatting Dengan $bro_nama"; ?>'><dewa class='icon icon-envelope'></dewa></a>
					  </div>
					  </td>
				 </tr>
				  <?PHP
				  $no++;
				  }
				  ?>
                  </tbody>
           </table>
		   <a href='keluar.php' class='btn btn-danger'><i class='icon icon-white icon-off'></i> Keluar</a>
	</div>
</div>
</body>
</html>
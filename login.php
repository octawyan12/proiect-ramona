<?php
	if (isset($_GET['disconect'])){ // daca se primeste comanda de disconect prin parametru
		session_start();
		$_SESSION['auth']=0;
		header( "refresh:0; url=index.php" );// redirectionare la pagina principala
		exit;
	}

	if(($_POST['nume'] == "") || ($_POST['parola'] == "")){ // daca vre-unu din capuri e gol
		?>
			<script type="text/javascript">
				alert('Nu ati completat toate campurile!');
			</script>
		<?php
		header( "refresh:0; url=index.php" );// redirectionare la pagina principala
		exit;
	}
	
	include ("mySqlConnect.php"); // ne conectam la baza de date sa confruntam campurile
//        $insert = "INSERT INTO user (username, password) VALUES ('admin','d033e22ae348aeb5660fc2140aec35850c4da997')";
//        $exec = mysql_query($insert);
//        var_dump($exec);
//        var_dump(mysql_num_rows($exec));
	$sql = "SELECT * FROM user WHERE username='".$_POST['nume']."' AND password='".sha1($_POST['parola'])."'";
	$resursa = mysql_query($sql);
	if (mysql_num_rows($resursa) != 1){ // daca avem 0 sau mai multe conturi care s-au potrivit casutzelor noastre
		?>
			<script type="text/javascript">
				alert('Contul este invalid!');
			</script>
		<?php
		header( "refresh:0; url=index.php" );// redirectionare la pagina principala
		exit;
	}
	session_start();
	$_SESSION['auth']=100;
	
	header( "refresh:0; url=index.php" );// redirectionare la pagina principala
?>
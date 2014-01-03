<?php
	include ("mySqlConnect.php");
	
	if ($_GET['tip']=="adaugare")
	{
		if(($_POST['addTitlu'] == "") || ($_POST['addGenFilm'] == "")){ // astea 2 sunt campuri obligatorii
			?>
			<script type="text/javascript">
				alert('Nu ati completat toate campurile!');
			</script>
			<?php
			header( "refresh:0; url=procesare.php?tip=".$_GET['tip']);// redirectionare la pagina anterioara
			exit;
		}
	
		if ($_GET['tip'] == "adaugare"){
			$sql = 'INSERT INTO filme1 (an_aparitie, titlu, descriere, gen_film, trailer, imagine) VALUES ('.$_POST['addAnAparitie'].', "'.$_POST['addTitlu'].'", "'.$_POST['addDescriere'].'", "'.$_POST['addGenFilm'].'", "'.$_POST['addTrailer'].'", "'.$_POST['addImagine'].'")';
			mysql_query($sql);
			header( "refresh:0; url=procesare.php?tip=".$_GET['tip']);// redirectionare la pagina anterioara
			exit;
		}
	}
	
	if ($_GET['tip']=="stergere")
	{
		$sql='DELETE FROM filme1 WHERE id_film='.$_GET['index'];
		mysql_query($sql);
		?>
			<script type="text/javascript">
				alert('Filmul a fost sters cu succes!');
			</script>
		<?php
		header( "refresh:0; url=procesare.php?tip=".$_GET['tip']);// redirectionare la pagina anterioara
		exit;
	}
	
	if ($_GET['tip']=="editare")
	{
	//	UPDATE table_name SET column1=value, column2=value2,... WHERE some_column=some_value
		$sql='UPDATE filme1 SET an_aparitie='.$_POST['addAnAparitie'].', titlu="'.$_POST['addTitlu'].'", descriere="'.$_POST['addDescriere'].'", gen_film="'.$_POST['addGenFilm'].'", trailer="'.$_POST['addTrailer'].'", imagine="'.$_POST['addImagine'].'" WHERE id_film='.$_GET['index'];
		mysql_query($sql);
		?>
			<script type="text/javascript">
				alert('Filmul a fost inlocuit cu succes!');
			</script>
		<?php
		header( "refresh:0; url=procesare.php?tip=".$_GET['tip']);// redirectionare la pagina anterioara
		exit;
	}
?>
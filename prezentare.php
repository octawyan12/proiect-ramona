<?php
	include ("inceput_pagina.php");
	include ("mySqlConnect.php");
?>

<td valign="top" width="100%">
	<?php
		$sql = "SELECT * FROM filme1 WHERE titlu='".$_GET['titlu']."'";
		$resursa = mysql_query($sql);
		$row = mysql_fetch_array($resursa);
		
		echo "<div align='center'>";
			echo "<h1> ".$row['titlu']." </h1>";
			echo "<h2> ( ".$row['gen_film']." - ".$row['an_aparitie']." ) </h2>";
		
			echo '<iframe width="300" height="300" src="https://www.youtube.com/embed/'.$row['trailer'].'?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>';
		
			echo "<p> ".$row['descriere']." </p>";
		echo "</div>"
	?>
</td>

<?php
	include ("sfarsit_pagina.php");
?>
<?php
	include ("mySqlConnect.php");
	include ("inceput_pagina.php");
	$gen_filme = $_GET['gen_filme'];
?>

<td valign="top" width="100%"> 
	<table>
		<?php 
			$sql = "SELECT * FROM filme1 WHERE gen_film='".$gen_filme."'";
			$resursa = mysql_query($sql);
			while ($row = mysql_fetch_array($resursa))
			{
				echo "<p>";
					echo "<tr>";
						echo "<td width='100px'>";
							echo "<a href='prezentare.php?titlu=".$row['titlu']."'> <img src='".$row['imagine']."' title='".$row['titlu']."' width='300' height='300' /> </a>"; // Imagine film
						echo "</td>";
						echo "<td width='100%'>";
							echo "<a href='prezentare.php?titlu=".$row['titlu']."'> <h1 align='center' > ".$row['titlu']." </h1> </a> <br> "; // Titlul filmului
							echo "<p> ".$row['descriere']." </p>"; // Descrierea filmului
						echo "</td>";
					echo "</tr>";
				echo "</p>";
			}
		?>
		
	</table>
</td>

<?php
	include ("sfarsit_pagina.php");
?>
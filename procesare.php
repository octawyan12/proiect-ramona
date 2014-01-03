<?php
	include ("mySqlConnect.php");
	include ("inceput_pagina.php");
?>

<script language="JavaScript" >  
	function submitForm(ind){  
		document.forms['search'].action = "sqlEngine.php?tip=" + <?php echo json_encode($_GET['tip']); ?> + "&index=" + ind;      
		document.forms['search'].submit();  
	}  
</script> 

<td valign="top" width="100%"> 
	<?php 
		echo '<form action="procesare.php?tip='.$_GET['tip'].'" method="post">';
	?>
	
		<p>
			<table>
				<tr>
					<td align="right"> <font color = #669900> Cauta in : </font> </td>
					<td> <input type="checkbox" name="index" value="Yes">Index</td>
					<td> <input type="checkbox" name="anPaparitie" value="Yes">An aparitie</td>
					<td> <input type="checkbox" name="titlu" value="Yes">Titlu</td>
					<td> <input type="checkbox" name="descriere" value="Yes">Descriere</td>
					<td> <input type="checkbox" name="genFilm" value="Yes">Gen film</td>	

					<td> <input type="text" name="string"> </td>
					
					<td> <input type="submit" value="Afiseaza rezultate"> </td>				
				</tr>
			</table> 
		</p>
	</form>
	
	<?php			
		if ($_GET['tip'] == "adaugare" || $_GET['tip']=='editare')
		{
			echo '<form id="search" name="search" action="sqlEngine.php?tip='.$_GET['tip'].'" method="post">';
				?>
					<p>
						<table>
							<tr>
								<td> An aparitie </td>
								<td> <input type="text" name="addAnAparitie"> </td>
							</tr>
							<tr>
								<td> Titlul filmului </td>
								<td> <input type="text" name="addTitlu"> </td>
							</tr>
							<tr>
								<td> Descriere </td>
								<td> <input type="text" name="addDescriere"> </td>
							</tr>
							<tr>
								<td> Genul filmului </td>
								<td> <input type="text" name="addGenFilm"> </td>
							</tr>
							<tr>
								<td> Link trailer </td>
								<td> <input type="text" name="addTrailer"> </td>
							</tr>
							<tr>
								<td> Link imagine </td>
								<td> <input type="text" name="addImagine"> </td>
							</tr>
							<?php 
								if ($_GET['tip'] == "adaugare")
								{
									echo '<tr>';
										echo '<td> <button type="button" onClick="search.submit()">Adauga film</button> </td>';
									echo '</tr>';
								}
							?>
						</table>
					</p>
				</form>		
				
			<?php
		}
	
		$unde = ""; $isFirst = 1;
	
		if(isset($_POST['index'])) { // poate sa fie primul sau deloc..
			$unde = $unde."id_film LIKE '%".$_POST['string']."%'"; // a intrat in if => ca e primul parametru
			$isFirst = 0; // => ca ceilalti nu mai pot fi primii
		}
	
		if(isset($_POST['anPaparitie'])) {
			if ($isFirst == 1) // daca e primul parametru
			{
				$isFirst = 0; // il marcam si inseamna ca ceilalti nu mai pot fi primii
			}
			else { // daca nu e primul parametru
				$unde = $unde." OR "; // adaugam OR in string
			}
		
			$unde = $unde."an_aparitie LIKE '%".$_POST['string']."%'"; 
		}
		if(isset($_POST['titlu'])) {
			if ($isFirst == 1) // daca e primul parametru
			{
				$isFirst = 0; // il marcam si inseamna ca ceilalti nu mai pot fi primii
			}
			else { // daca nu e primul parametru
				$unde = $unde." OR "; // adaugam OR in string
			}
		
			$unde = $unde."titlu LIKE '%".$_POST['string']."%'"; 
		}
		if(isset($_POST['descriere'])) {
			if ($isFirst == 1) // daca e primul parametru
			{
				$isFirst = 0; // il marcam si inseamna ca ceilalti nu mai pot fi primii
			}
			else { // daca nu e primul parametru
				$unde = $unde." OR "; // adaugam OR in string
			}
		
			$unde = $unde."descriere LIKE '%".$_POST['string']."%'"; 
		}
		if(isset($_POST['genFilm'])) {
			if ($isFirst == 1) // daca e primul parametru
			{
				$isFirst = 0; // il marcam si inseamna ca ceilalti nu mai pot fi primii
			}
			else { // daca nu e primul parametru
				$unde = $unde." OR "; // adaugam OR in string
			}
		
			$unde = $unde."gen_film LIKE '%".$_POST['string']."%'"; 
		}
		
		$sql="";
		if ($isFirst == 1){ // daca flagul first e inca pe 1 inseamna ca nicio casuta nu e selectata si afisam toata baza de date
			$sql = "SELECT * FROM filme1";
		}
		else{
			$sql = "SELECT * FROM filme1 WHERE ".$unde;
		}
		
		$resursa = mysql_query($sql);
	
		echo '<table class="prezentare">';//100 - 95 - 89 - 81 -75
			echo '<tr>';
				echo '<th> Index </th>';
				echo '<th> An aparitie </th>'; 
				echo '<th> Titlu </th>';
				echo '<th> Descriere </th>';
				echo '<th> Gen film </th>';
				echo '<th> Trailer link </th>';
				echo '<th> Image link </th>';
				if ($_GET['tip']=='editare' || $_GET['tip']=='stergere')
					echo '<th> Operatie </th>';
			echo '</tr>';
			
		while ($row = mysql_fetch_array($resursa))
		{
			echo '<tr>';
				echo '<td> '.$row['id_film'].'</td>';
				echo '<td> '.$row['an_aparitie'].'</td>';
				echo '<td> '.$row['titlu'].'</td>';
				echo '<td> '.$row['descriere'].'</td>';
				echo '<td> '.$row['gen_film'].'</td>';
				echo '<td> <iframe width="300" height="300" src="https://www.youtube.com/embed/'.$row['trailer'].'?feature=player_detailpage" frameborder="0" allowfullscreen></iframe> </td>';
				//echo '<td> '.$row['trailer'].'</td>';
				echo '<td> <img src="'.$row['imagine'].'" width="300" height="300"> </td>';
				if ($_GET['tip']=='editare')
					echo '<td> <a onClick="submitForm('.$row['id_film'].')" href="#"> <img src="images/rel.jpg" width="100" height="100"> </a> </td>';
				if ($_GET['tip']=='stergere')
					echo '<td> <a href="sqlEngine.php?tip='.$_GET['tip'].'&index='.$row['id_film'].'"> <img src="images/remove.jpg" width="50" height="50"> </a> </td>';
			echo '</tr>';
		}
		echo '</table>';
	?>
</td>

<?php
	include ("sfarsit_pagina.php");
?>
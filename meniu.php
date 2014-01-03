<div id="meniu">
	<ul>
		<li class='active '> <a href='index.php'><span>Acasa</span></a></li>
		<li class='has-sub '> <a><span>Gen Film</span></a>
			<ul>
				<li> <a href='genFilme.php?gen_filme=actiune'><span>Actiune</span></a>
				<li> <a href='genFilme.php?gen_filme=animatie'><span>Animatie</span></a>
				<li> <a href='genFilme.php?gen_filme=comedie'><span>Comedie</span></a>
				<li> <a href='genFilme.php?gen_filme=crima'><span>Crima</span></a>
				<li> <a href='genFilme.php?gen_filme=dragoste'><span>Dragoste</span></a>
				<li> <a href='genFilme.php?gen_filme=drama'><span>Drama</span></a>
				<li> <a href='genFilme.php?gen_filme=muzical'><span>Muzical</span></a>
				
			</ul>
		</li>
		<li> <a href='procesare.php?tip=search'><span>Cautare Film</span></a></li>
		<li> <a href='contact.php'><span>Contact</span></a></li>
		
		<?php
			session_start();
			if (isset($_SESSION['auth'])){ // daca exista in SESSION variabila asta...
				if ($_SESSION['auth']==100){ // daca are valoare de admin
					$auth = 100;
				}
				else{
					$auth = 0;
				}
			}
			else{
				$auth = 0;
			}
			
			if ($auth == 100) // daca a fost recunoscut contul de admin
			{
				?>
					<li> <a href='procesare.php?tip=adaugare'><span>Adauga</span></a></li>
					<li> <a href='procesare.php?tip=editare'><span>Editeaza</span></a></li>
					<li> <a href='procesare.php?tip=stergere'><span>Sterge</span></a></li>
					<li> <a href='login.php?disconect'><span>Deconectare</span></a></li>
				<?php
			}
			else // daca e cont normal
			{
				?>	
					<li class='has-sub '> <a href='#'><span>Conectare</span></a>
						<ul> 
							<li>
								<form action="login.php" method="post">
									<table> 
										<tr>
											<td align="right" > <font color = #669900> Nume: </font> </td>
											<td> <input type="text" name="nume"> </td> 
										</tr>
										<tr> 
											<td align="right" > <font color = #669900> Parola: </font> </td>
											<td> <input type="password" name="parola"> </td>
										</tr> 
									</table>
									<input type="submit" value="Autentificare">
								</form>
							</li>
						</ul>
					</li>
				<?php
			}
		?>
	</ul>
</div>
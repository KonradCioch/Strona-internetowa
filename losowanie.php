<!DOCTYPE HTML>
<html lang = "pl">
<head>

	<meta charset="utf-8"/>
	<title>Zdrowy Sen - Losowanie</title>
	<meta name="description" content="Nauczysz się tutaj jak zregenerować ogranizm w 100% każdego dnia i wstawać w pełni sił!"/>
	<meta name="keywords" content="sen, zdrowy sen, fazy, fazy snu, regeneracja, zdrowie"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	
	<link href="style.css" rel="stylesheet" type="text/css" />

</head>

<body>

	<div class="wrapper">
		
		<div class="header">
			<div class="logo">
			Zdrowy Sen
			</div>
		</div>
		
		<div class="nav">
			<ol>
				<li><a href="index.php">Strona główna</a></li>
				<li><a href="#">Sprawozdania</a>
					<ul>
						<li><a href="Sprawozdanie1-Comarch.pdf" target="_blank">Sprawozdanie 1</a></li>
						<li><a href="Sprawozdanie2-Comarch.pdf" target="_blank">Sprawozdanie 2</a></li>
						<li><a href="Sprawozdanie3-Comarch.pdf" target="_blank">Sprawozdanie 3</a></li>
						<li><a href="Sprawozdanie4-Comarch.pdf" target="_blank">Sprawozdanie 4</a></li>
						<li><a href="Sprawozdanie5-Comarch.pdf" target="_blank">Sprawozdanie 5</a></li>
					</ul>
				</li>
				<li><a href="losowanie.php">Losowanie</a></li>
				<li><a href="rejestracja.php">Rejestracja</a></li>
				<li><a href="logowanie.php">Logowanie</a></li>
			</ol>
		</div>
		
		<div class="content">
		<?php
			require_once "connect.php";	

			$x=rand(1,5);

			// Nawiązanie połączenia z bazą
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			
			// Sprawdzenie, czy połączenie powiodło się
			if ($polaczenie->connect_errno!=0) {
				echo "Error: ".$polaczenie->connect_errno;
			} 
			else{
			
				if($rezultat = @$polaczenie->query("SELECT * FROM informacje WHERE id=$x"))
				{
					$ilu = $rezultat->num_rows;

					if ($ilu > 0) 
					{
						// Wypisanie wszystkich danych z bazy z każdego rzędu
						while($wiersz = $rezultat->fetch_assoc()) 
						{
							echo  $wiersz["sen"];
					}
					}					
					else 
					{
						echo "Lista przepisów jest pusta.";
					}
				}
				}

			mysqli_close($polaczenie);	
			
?>
		<div>
		<form action="losowanie.php">
			
			<br/><input type="submit" value="Losuj">

		</form>
		</div>

		</div>
		
		<div class="footer">
		<u>Autor</u>: Cioch Konrad &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Kontakt</u>: kcioch@student.agh.edu.pl&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&copy;Wszelkie prawa zastrzeżone
		</div>
	</div>
	
	<script src="jquery-3.4.1.min.js"></script>
	
	<script>

	$(document).ready(function() {
	var NavY = $('.nav').offset().top;
	 
	var stickyNav = function(){
	var ScrollY = $(window).scrollTop();
		  
	if (ScrollY > NavY) { 
		$('.nav').addClass('sticky');
	} else {
		$('.nav').removeClass('sticky'); 
	}
	};
	 
	stickyNav();
	 
	$(window).scroll(function() {
		stickyNav();
	});
	});
	
</script>

</body>
</html>
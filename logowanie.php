<?php
	
	session_start();
	
	if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: godziny.php');
		exit();
	}
	
?>

<!DOCTYPE HTML>
<html lang = "pl">
<head>

	<meta charset="utf-8"/>
	<title>Zdrowy Sen - Logowanie</title>
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
		
		<div class="logowanie">
		
		<form action="zaloguj.php" method="post">
	
			Login:<br/><input type="text" name="login"/><br/>
			Hasło:<br/><input type="password" name="haslo"/><br/><br/>
			<?php

	if(isset($_SESSION['blad']))
		echo $_SESSION['blad'];

?>
			<input type="submit" value="Zaloguj się"/>
	
		</form>
		
		<br /><br />
		
		
		<div class="lacze">
		
		<a href="rejestracja.php" class="tilelink">Rejestracja - załóż konto!</a>
		
		</div>
		
		
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
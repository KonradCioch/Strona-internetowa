<?php
	session_start();
	
	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
	}
?>


<!DOCTYPE HTML>
<html lang = "pl">
<head>

	<meta charset="utf-8"/>
	<title>Zdrowy Sen</title>
	<meta name="description" content="Nauczysz się tutaj jak zregenerować ogranizm w 100% każdego dnia i wstawać w pełni sił!"/>
	<meta name="keywords" content="sen, zdrowy sen, fazy, fazy snu, regeneracja, zdrowie"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	
	<link href="style.css" rel="stylesheet" type="text/css" />

	<style>
	#gl
{
	
	float: left;	
	width: 300px;
	padding: 20px;
	margin-top: 100px;
	margin-left: 300px;
	background-color: #d4a602;
	
	
}

	#gr
{
	float: left;
	padding: 20px;
	margin-top: 100px;
	text-align: left;
	background-color: #d4a602;
	margin-left: 100px;
	
}
	</style>
	

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
		
			<div id="gl">
		
				<form method="post">
		
					<label for="g_w"> Godzina o której chcesz wstać</label>
					<select id="g_w" name="g_w">
				
						<option value="0">0:00</option>
						<option value="1">1:00</option>
						<option value="2">2:00</option>
						<option value="3">3:00</option>
						<option value="4">4:00</option>
						<option value="5">5:00</option>
						<option value="6" selected>6:00</option>
						<option value="7">7:00</option>
						<option value="8">8:00</option>
						<option value="9">9:00</option>
						<option value="10">10:00</option>
						<option value="11">11:00</option>
						<option value="12">12:00</option>
						<option value="13">13:00</option>
						<option value="14">14:00</option>
						<option value="15">15:00</option>
						<option value="16">16:00</option>
						<option value="17">17:00</option>
						<option value="18">18:00</option>
						<option value="19">19:00</option>
						<option value="20">20:00</option>
						<option value="21">21:00</option>
						<option value="22">22:00</option>
						<option value="23">23:00</option>
				
					</select>
					<br/><br/>
				
					<label for="g_s"> Ile godzin chcesz spać</label>
					<select id="g_s" name="g_s">
				
					
						<option value="1">1:00</option>
						<option value="2">2:00</option>
						<option value="3">3:00</option>
						<option value="4">4:00</option>
						<option value="5">5:00</option>
						<option value="6">6:00</option>
						<option value="7">7:00</option>
						<option value="8" selected>8:00</option>
						<option value="9">9:00</option>
						<option value="10">10:00</option>
						<option value="11">11:00</option>
						<option value="12">12:00</option>
					
					</select>
			
					<br/><br/><input type="submit" value="Oblicz">
		
				</form>
		
		
		<br/>Godzina o której nalezy się położyć:
<?php

	if(isset($_POST['g_w']))
	{
	$g_w = $_POST['g_w'];
	$g_s = $_POST['g_s'];
	
	$g_u = $g_w - $g_s;
		if($g_u<0)
		{
			$g_u=24+$g_u;
			echo $g_u.":00";
		}
		else
		{
			echo $g_u.":00";
		}
	}
?>	


			</div>
	
			<div id="gr">
	
<?php
	echo "<p>Witaj ".$_SESSION['user']."!</p>";
	
	echo "<p><b>E-mail</b>:".$_SESSION['email']."</p>";
	
	echo '<p><div class="lacze"><a href="logout.php" class="tilelink">Wyloguj się</a></div></p>';
	

?>
			</div>
			<div style="clear:both;"></div>
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
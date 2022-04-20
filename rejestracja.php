<?php

	session_start();
	
	if (isset($_POST['email']))
	{
		//Udana walidacja
		$wszystko_OK=true;
		
		//Sprawdz poprawnosc nickname
		$nick = $_POST['nick'];
		
		//Sprawdzenie dlugosci nicka
		if((strlen($nick)<3)||(strlen($nick)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
		}
		
		if (ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		
		//Sprawdź poprawność hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}	

		
		//Czy zaakceptowano regulamin?
		if (!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu!";
		}
		
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//Czy email już istnieje?
				$rezultat = $polaczenie->query("SELECT id FROM registration WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		

				//Czy nick jest już zarezerwowany?
				$rezultat = $polaczenie->query("SELECT id FROM registration WHERE user='$nick'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Istnieje już gracz o takim nicku! Wybierz inny.";
				}
				
				if ($wszystko_OK==true)
				{
					//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
					
					if ($polaczenie->query("INSERT INTO registration VALUES (NULL, '$nick', '$haslo1', '$email')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: logowanie.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}
		
		
		
	}

?>

<!DOCTYPE HTML>
<html lang = "pl">
<head>

	<meta charset="utf-8"/>
	<title>Zdrowy Sen - załóż konto</title>
	<meta name="description" content="Nauczysz się tutaj jak zregenerować ogranizm w 100% każdego dnia i wstawać w pełni sił!"/>
	<meta name="keywords" content="sen, zdrowy sen, fazy, fazy snu, regeneracja, zdrowie"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	
	<link href="style.css" rel="stylesheet" type="text/css" />
	
	<style>
	
		.error
		{
			color:red;
			margin-top:10px;
			margin_bottom:10px;
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
			
			<div class="logowanie">
			<form method="post">
			
				Login: <br /> <input type="text" name="nick" /> <br />
				
				<?php
				
					if(isset($_SESSION['e_nick']))
					{
						echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
						unset($_SESSION['e_nick']);
					}
				
				?>
				
				E-mail: <br /> <input type="text" name="email" /> <br />
				
				<?php
				
					if(isset($_SESSION['e_email']))
					{
						echo '<div class="error">'.$_SESSION['e_email'].'</div>';
						unset($_SESSION['e_email']);
					}
				
				?>
				
				Hasło: <br /> <input type="password" name="haslo1" /> <br />
				
				<?php
				
					if(isset($_SESSION['e_haslo']))
					{
						echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
						unset($_SESSION['e_haslo']);
					}
				
				?>
				
				Powtórz hasło: <br /> <input type="password" name="haslo2" /> <br />
				
				<label>
					Akceptuje regulamin <input type="checkbox" name="regulamin"/> 
				</label>
				
				<?php
				
					if(isset($_SESSION['e_regulamin']))
					{
						echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
						unset($_SESSION['e_regulamin']);
					}
				
				?>
				
				<br />
				
				<input type="submit" value="Zarejestruj się" />
			
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
<!DOCTYPE HTML>
<html lang = "pl">
<head>

	<meta charset="utf-8"/>
	<title>Zdrowy Sen</title>
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
		<h1>Co to jest sen?</h1>
		
		<p>Znaczenie snu dla człowieka można by podsumować jednym, krótkim stwierdzeniem: nie da się bez niego żyć, jest niezbędny. Pochylmy się jednak dokładniej nad tym, w czym sen pomaga i co dzięki niemu mamy, bo przecież angażujemy w niego niemal jedną trzecią naszego życia.

Jeżeli chodzi o naszą psychikę, to sen pozwala nam na redukcję napięcia, stresu. Dzięki snu zmniejsza się nasza apatia i przygnębienie, a więc doskonale wpływa na lepsze samopoczucie. Następuje „wyłączenie” aktywności centralnego układu nerwowego oraz jego regeneracja. Duże znaczenie snu przypisuje się także utrwalaniu świeżo nabytych informacji, nie na darmo mówimy: „muszę się z tym przespać” – właśnie w czasie snu następuje analiza i odpowiednie „pogrupowanie” informacji nabytych za dnia.

To, że śpimy, nie znaczy, że w naszym organizmie nic się nie dzieje. Stare powiedzenie mówi, że właśnie w czasie snu rośniemy i nie sposób odmówić mu prawdy, gdyż właśnie gdy jesteśmy w objęciach Morfeusza, wydzielane są największe ilości somatotropiny, hormonu mającego bezpośredni wpływ na wzrost.</p>

		<img src="pies.jpg" />
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
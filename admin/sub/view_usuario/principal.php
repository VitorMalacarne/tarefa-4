<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Página principal - Pousada das Capivaras</title>
		<link rel="stylesheet" type="text/css" href="../../../style.css">
	</head>
	<body>
		<header>
			<h1>POUSADA DAS CAPIVARAS</h1>
			<?php if(empty($_SESSION)): ?>
        	    <ul>
        	        <li><a href="login.php">Logar</a></li>
        	        <li><a href="cadastro.php">Cadastrar</a></li>
        	    </ul>
        	<?php endif; ?>
        	<?php if(empty($_SESSION) !== true): ?>
        	    <ul>
        	        <li><p>Olá, <?= $_SESSION['nome'] ?></p></li>
        	        <li><a href="../view_adm/ctrl_usuario.php?action=logout">Sair</a></li>
        	    </ul>
        	<?php endif; ?>
			<nav id="headnav">
				<ul>
					<li><a href="principal.php" class="active">HOME</a></li>
					<li><a href="reserva.php">RESERVA</a></li>
					<li><a href="acomodacoes.php">ACOMODAÇÕES</a></li>
				</ul>
			</nav>
		</header>
		<div id="maindiv">
			<nav id="mainnav">
				<ul>
					<li><a href="principal.php" class="active">A Pousada</a></li>
					<li><a href="reserva.php">Reserva</a></li>
					<li><a href="acomodacoes.php">Acomodações</a></li>
					<li><a href="faleconosco.php">Fale Conosco</a></li>
				</ul>
			</nav>
			<div class="phantomdiv"></div>
			<main>
				<img src="../../../imagens/juremo.jpeg" width="75%">
				<h2>Venha conhecer a Pousada das Capivaras</h2>
				<p>A Pousada das Capivaras e seus recantos vêm como frutos de décadas de tradição e empenho a fim de oferecer uma estadia e qualidade e uma experiência única. Nossos hóspedes contam com um refúgio, afastados de todo o movimento urbano, para recarregar as suas energias e se conectar com a natureza.</p>
				<p>Aprecie as nossas instalações, como as piscinas de águas termais, o salão de festas com open bar, o spa e a atração principal, o <b>Restaurante no Meio do Mato</b>.</p>
				<h2>Boas-vindas a Vila Verona</h2>
				<p>Uma cidade no interior do Paraná, <strong>Vila Verona</strong> é conhecida por seu ecoturismo; desde sua emancipação, o município vem cumprindo o dever de proteger o ecossitema ao seu redor, em especial, o Parque das Capivaras, local de atração de turistas e também do instituto <strong>Verde Verona</strong>, que realiza diversas ações do meio ambiente local, fazendo o acompanhamento veterinário de espécies da fauna local, e monitorando todo o parque.</p>
				<p>Entre suas atrações, há diversos passeios em meio ao Parque das Capivaras, como trilhas, passeios de caiaque e cahoeiras abertas ao público; não apenas isso, sua cidade conta com muitas atrações de uma cidade grande, como cinemas, shopping centers, bares e restaurantes, e há de destacar a sua culinária tradicional sulista.</p>
			</main>
			<aside>
				<p><big><b>Nossos<br>parceiros</b></big></p>
				<img src="../../../imagens/uber.png">&nbsp;<img src="../../../imagens/aiqfome.png">&nbsp;<img src="../../../imagens/lar.png">&nbsp;<img src="../../../imagens/utfpr.png">
			</aside>
		</div>
		<footer>
			<hr>
			<p>Pousada das Capivaras - 2022</p>
			<p><i>Av. Videira Ramos, 432 - Vila Verona - PR</i></p>
			<p>&#128222; (555) 4002-8922</p>
			<p id="ult">&#128231; <a href="mailto:pousadadascapivaras21@protonmail.com.br">pousadadascapivaras21@protonmail.com.br</a></p>
		</footer>
	</body>
</html>
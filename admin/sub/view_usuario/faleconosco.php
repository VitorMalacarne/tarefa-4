<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Fale Conosco - Pousada das Capivaras</title>
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
					<li><a href="principal.php">HOME</a></li>
					<li><a href="reserva.php">RESERVA</a></li>
					<li><a href="acomodacoes.php">ACOMODAÇÕES</a></li>
				</ul>
			</nav>
		</header>
		<div id="maindiv">
			<nav id="mainnav">
				<ul>
					<li><a href="principal.php">A Pousada</a></li>
					<li><a href="reserva.php">Reserva</a></li>
					<li><a href="acomodacoes.php">Acomodações</a></li>
					<li><a href="faleconosco.php" class="active">Fale Conosco</a></li>
				</ul>
			</nav>
			<div class="phantomdiv"></div>
			<main>
				<form action="/faleconosco.php">
				 	<label for="nome">Nome:</label><br>
					<input type="text" id="nome" name="fname">
					<br><br>
					<label for="email">E-mail:</label><br>
					<input type="email" id="email" name="lname">
					<br><br>
					<label>Mensagem:</label><br>
					<textarea></textarea><br><br>
					<input type="submit" value="Submit">
				</form>
			</main>
			<aside>
				<p><big><b>Nossos<br>parceiros</b></big></p>
				<img src="imagens/uber.png">&nbsp;<img src="imagens/aiqfome.png">&nbsp;<img src="imagens/lar.png">&nbsp;<img src="imagens/utfpr.png">
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
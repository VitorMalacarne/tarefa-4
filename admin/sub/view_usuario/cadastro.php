<?php
    session_start();
	header('location cadastro.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cadastro - Pousada das Capivaras</title>
		<link rel="stylesheet" type="text/css" href="../../../style.css">
	</head>
	<body>
		<header>
			<h1>POUSADA DAS CAPIVARAS - Cadastro de usuário</h1>
			<nav id="headnav">
				<ul>
					<li><a href="../view_usuario/principal.php">HOME</a></li>
					<li><a href="../view_usuario/reserva.php">RESERVA</a></li>
					<li><a href="../view_usuario/acomodacoes.php">ACOMODAÇÕES</a></li>
					<li><a href="../view_usuario/cadastro.php" class="active">CADASTRO</a></li>
				</ul>
			</nav>
		</header>
		<div id="maindiv">
			<nav id="mainnav">
				<ul>
					<li><a href="../view_usuario/principal.php">A Pousada</a></li>
					<li><a href="../view_usuario/reserva.php">Reserva</a></li>
					<li><a href="../view_usuario/acomodacoes.php">Acomodações</a></li>
					<li><a href="../view_usuario/faleconosco.php">Fale Conosco</a></li>
				</ul>
			</nav>
			<div class="phantomdiv"></div>
			<main>
				<?php 
				echo @$message; 
				?>
				<form action="../view_adm/ctrl_usuario.php?action=novo" method="post">
					<fieldset>
						<legend>Cadastro</legend>
						<label for="nome">Nome Completo</label>
						<input type="text" name="nome" placeholder="João Da Silva" autocomplete="off" required><br>
						<label for="email">E-mail</label>
						<input type="text" name="email" placeholder="email@mail.com" autocomplete="off" required><br>
						<label for="telefone">Telefone</label>
						<input type="tel" name="telefone" placeholder="(XX) XXXXX-XXXX" autocomplete="off" required><br>
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="*********" autocomplete="off" required><br>
						<label for="">Confirmar senha</label>
		                <input type="password" name="confirmar_senha" placeholder="*********" autocomplete="off" required>
						<label for="perfil">Perfil</label>
						<input type="text" name="perfil" autocomplete="off"><br>
					</fieldset>
					
					<input type="submit" value="Fazer cadastro">
					
				</form>
				<h4>Já tem cadastro?</h4>
				<a href="login.php" class="botao">Fazer login</a>
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
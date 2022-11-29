<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cadastro - Pousada das Capivaras</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<header>
			<h1>POUSADA DAS CAPIVARAS</h1>
			<nav id="headnav">
				<ul>
					<li><a href="../../../principal.html">HOME</a></li>
					<li><a href="reserva.html" class="active">RESERVA</a></li>
					<li><a href="../../../acomodacoes.html">ACOMODAÇÕES</a></li>
				</ul>
			</nav>
		</header>
		<div id="maindiv">
			<nav id="mainnav">
				<ul>
					<li><a href="../../../principal.html">A Pousada</a></li>
					<li><a href="reserva.html" class="active">Reserva</a></li>
					<li><a href="../../../acomodacoes.html">Acomodações</a></li>
					<li><a href="../../../faleconosco.html">Fale Conosco</a></li>
				</ul>
			</nav>
			<div class="phantomdiv"></div>
			<main>
				<h2>Cadastro de usuário</h2>
				<form action="cadastroacomodacao.php" method="post">
					<fieldset>
						<legend>Responsável</legend>
						<label for="nome">Nome Completo</label>
						<input type="text" name="nome" placeholder="João Da Silva" autocomplete="off"><br>
						<label for="email">E-mail</label>
						<input type="text" name="email" placeholder="email@mail.com" autocomplete="off"><br>
						<label for="telefone">Telefone</label>
						<input type="text" name="telefone" placeholder="(XX) XXXXX-XXXX" autocomplete="off"><br>
                        <label for="senha">Senha</label>
                        <input type="text" name="senha" placeholder="*********" autocomplete="off"><br>
					</fieldset>
					
					<button type="submit">Reservar</button>
					
				</form>
			</main>
			<aside>
				<p><big><b>Nossos<br>parceiros</b></big></p>
				<img src="../../imagens/uber.png">&nbsp;<img src="../../imagens/aiqfome.png">&nbsp;<img src="../../imagens/lar.png">&nbsp;<img src="../../imagens/utfpr.png">
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
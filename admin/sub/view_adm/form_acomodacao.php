<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Acomodações - Administração Pousada das Capivaras</title>
		<link rel="stylesheet" type="text/css" href="../../../style.css">
	</head>
	<body>
		<header>
			<h1>POUSADA DAS CAPIVARAS - Administração</h1>
			<nav id="headnav">
				<ul>
				<li><a href="index.html">HOME</a></li>
                <li><a href="list.php">Usuários</a></li>
                <li><a href="../../conexao.php">Conexão</a></li>
                <li><a href="../view_usuario/cadastro.html">Cadastro</a></li>
                <li><a href="form_acomodacao.php" class="active">Acomodações</a></li>
				</ul>
			</nav>
		</header>
		<div id="maindiv">
			<nav id="mainnav">
				<ul>
				<li><a href="index.html">HOME</a></li>
                <li><a href="list.php">Usuários</a></li>
                <li><a href="../../conexao.php">Conexão</a></li>
                <li><a href="../view_usuario/cadastro.html">Cadastro</a></li>
                <li><a href="form_acomodacao.php" class="active">Acomodações</a></li>
				</ul>
			</nav>
			<div class="phantomdiv"></div>
			<main>
				<h2>Cadastro de acomodações</h2>
				<form action="../model/cadastraracomodacao.php" method="post">
					<fieldset>
						<legend>Acomodações</legend>
						<label for="qtd_camas_casal">Quantidades de cama de casal:</label>
						<select name="qtd_camas_casal">
						<option value="" disabled selected hidden>Selecione</option>	
						<option value="1">Uma</option>
						<option value="2">Duas</option>
						</select><br>
						<label for="qtd_camas_solteiro">Quatidades de cama de solteiro:</label>
						<select name="qtd_camas_solteiro">
						<option value="" disabled selected hidden>Selecione</option>
						<option value="1">Uma</option>
						<option value="2">Duas</option>
						<option value="3">Três</option>
						</select><br>
						<label for="tipo_acomodacao">Tipo de acomodação:</label>
						<select name="tipo_acomodacao">
						<option value="" disabled selected hidden>Selecione</option>
						<option value="standart">Standart</option>
						<option value="luxo">Luxo</option>
						</select><br>
                        <label for="tipo_apartamento">Tipo de apartamento:</label>
                        <select name="tipo_apartamento">
						<option value="" disabled selected hidden>Selecione</option>
						<option value="dupla">Dupla</option>
						<option value="tripla">Tripla</option>
						<option value="familia">Família</option>
						</select><br>
					</fieldset>
					
					<button type="submit">Adicionar</button>
					
				</form>
			</main>
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
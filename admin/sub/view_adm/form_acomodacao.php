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
			<h2>Formulário de acomodação</h2>
		</header>
		<div id="maindiv">
			<nav id="mainnav">
    		    <ul>
    		        <li><a href="index.html">HOME</a></li>
    		        <li><a href="ctrl_acom.php">Lista de acomodações</a></li>
    		        <li><a href="ctrl_reserva.php?action=listar">Lista de reservas</a></li>
    		        <li><a href="ctrl_tarifa.php">Lista de tarifas</a></li>
    		        <li><a href="ctrl_usuario.php">Lista de usuários</a></li>
    		        <li><a href="form_acomodacao.php" class="active">Formulário de acomodações</a></li>
    		    </ul>
    		</nav>
			<div class="phantomdiv"></div>
			<div id="maindiv"><main>
				<h2>Cadastro de acomodações</h2>
				<form action="ctrl_acom.php?action=novo" method="post">
            	<input type="hidden" name="id" value="<?= @$acomodacao->id ?>">
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
						<option value="duplo">Dupla</option>
						<option value="triplo">Tripla</option>
						<option value="familia">Família</option>
						</select><br>-
					</fieldset>
					
					<button type="submit">Adicionar</button>
					<a href="ctrl_acom.php">Cancelar</a>
				</form>
			</main></div>
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
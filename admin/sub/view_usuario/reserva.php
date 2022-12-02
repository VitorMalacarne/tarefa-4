<?php
	@session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Reserva On-line - Pousada das Capivaras</title>
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
		</header>
		<div id="maindiv">
			<nav id="mainnav">
				<ul>
					<li><a href="principal.php">A Pousada</a></li>
					<li><a href="reserva.php" class="active">Reserva</a></li>
					<li><a href="acomodacoes.php">Acomodações</a></li>
					<li><a href="faleconosco.php">Fale Conosco</a></li>
				</ul>
			</nav>
			<div class="phantomdiv"></div>
			<main>
				<h2>Reserva online</h2>
				<form action="../view_adm/ctrl_acom.php?action=procurar" method="post">
					<fieldset>
						<legend>Dados da reserva</legend>
						<label for="daen">Data de entrada</label><br>
						<input type="date" name="data_entrada" placeholder="dd/mm/aaaa" autocomplete="off" required><br>
						<label for="dasa">Data de saída</label><br>
						<input type="date" name="data_saida" placeholder="dd/mm/aaaa" autocomplete="off" required><br>
						<label for="quanad">Adultos</label><br>
						<input type="number" name="qtd_adultos" min="1" max="4" step="1" value="1" autocomplete="off" required><br>
						<label for="quancr">Crianças</label><br>
						<input type="number" name="qtd_criancas" min="0" max="4" step="1" value="0" autocomplete="off"required><br>
						<label for="acom">Acomodação</label><br>
						<select name="tipo_acomodacao" autocomplete="off"required>
							<option value="" disabled selected hidden>Selecione</option>
							<option value="standart">Standart</option>
							<option value="luxo">Luxo</option>
							<option value="todos">Todos</option>
						</select>
					</fieldset><br>
					<input type="submit" value="procurar"> 
				</form>
				<div>
            <h4>Acomodações encontradas</h4>
            <!-- comentario -->
            <?php if(empty($acomodacoes)): ?>
                <div class = "nulo">
                    <p>Nenhuma acomodação encontrada dentro das condicões!</p>
                </div>
            <?php else: ?>
                <?php foreach($acomodacoes as $index => $acomodacao): ?>
                    <div class="card">
                        <ul>
                            <li>
                                <p><?= @$acomodacao->tipo_acomodacao ?></p>
                                
                            </li>
                            <li>
                                <p><?= @$acomodacao->tipo_apartamento ?></p>
                                
                            </li>
                            <li>
                                <p>2 camas de solteiro</p>
                            </li>
                        </ul>
                        <form action="../view_adm/ctrl_reserva.php?action=novo&qtd_adultos=<?= @$_REQUEST['qtd_adultos']?>&qtd_criancas=<?= @$_REQUEST['qtd_criancas']?>&data_entrada=<?= @$_REQUEST['data_entrada']?>&data_saida=<?= @$_REQUEST['data_saida']?>" method="post">
                            <input type="hidden" name="id_acomodacao" value="<?= $acomodacao->id ?>">
                            <input type="hidden" name="id_tarifa" value="<?= @$acomodacao->id_tarifa ?>">
                            <input type="submit" value="Reservar">
                        </form>
                        
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
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
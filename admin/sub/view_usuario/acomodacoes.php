<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Acomodações - Pousada das Capivaras</title>
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
					<li><a href="acomodacoes.php" class="active">ACOMODAÇÕES</a></li>
				</ul>
			</nav>
		</header>
		<div id="maindiv">
			<nav id="mainnav">
				<ul>
					<li><a href="principal.php">A Pousada</a></li>
					<li><a href="reserva.php">Reserva</a></li>
					<li><a href="acomodacoes.php" class="active">Acomodações</a></li>
					<li><a href="faleconosco.php">Fale Conosco</a></li>
				</ul>
			</nav>
			<div class="phantomdiv"></div>
			<main>
				<article>
					<h2>Acomodações</h2>
					<section>
						<h3>Apartamento Standart</h3>
						<img src="../../../imagens/standart.png"><br><br>
						<ul>
							<li>Cama queen size</li>
							<li>Suite</li>
							<li>Wi-fi</li>
							<li>Frigobar</li>
							<li>Artigos de higiene pessoal</li>
							<li>TV LED 40"</li>
						</ul>
					</section>
					<section>
						<h3>Apartamento Luxo</h3>
						<img src="../../../imagens/luxo.png"><br><br>
						<ul>
							<li>Cama king size</li>
							<li>Suíte</li>
							<li>Banheiro espaçoso com banheira de hidromassagem</li>
							<li>Wi-fi</li>
							<li>Frigobar</li>
							<li>Artigos de higiene pessoal de luxo</li>
							<li>TV QLED 60"</li>
							<li>Aplicativos de streaming</li>
						</ul>
					</section>
					<br>
					<section>
						<p><big><b>Tarifas</b></big></p>
						<table border="solid">
							<tr>
								<th>Acomodação</th>
								<th>Apartamento</th>
								<th>Tarifa básica 
								(1 adulto)</th>
								<th>+1 adulto</th>
								<th>+1 criança</th>
							</tr>
							<tr>
								<td rowspan="6">Standart</td>
								<td rowspan="2">Duplo</td>
								<td>150,00</td>
								<td>40,00</td>
								<td>10,00</td>
							</tr>
							<tr>
								<td colspan="3">1 cama de casal ou 2 camas de solteiro</td>
							</tr>
							<tr>
								<td rowspan="2">Triplo</td>
								<td>150,00</td>
								<td>45,00</td>
								<td>13,00</td>
							</tr>
							<tr>
								<td colspan="3">1 cama de casal + 1 cama de solteiro ou 3 camas de solteiro</td>
							</tr>
							<tr>
								<td rowspan="2">Família</td>
								<td>150,00</td>
								<td>50,00</td>
								<td>15,00</td>
							</tr>
							<tr>
								<td colspan="3">2 camas de casal ou 1 cama de casal + 2 camas de solteiro</td>
							</tr>
							<tr>
								<td rowspan="6">Luxo</td>
								<td rowspan="2">Duplo</td>
								<td>150,00</td>
								<td>70,00</td>
								<td>20,00</td>
							</tr>
							<tr>
								<td colspan="3">1 cama de casal ou 2 camas de solteiro</td>
							</tr>
							<tr>
								<td rowspan="2">Triplo</td>
								<td>150,00</td>
								<td>75,00</td>
								<td>23,00</td>
							</tr>
							<tr>
								<td colspan="3">1 cama de casal + 1 cama de solteiro ou 3 camas de solteiro</td>
							</tr>
							<tr>
								<td rowspan="2">Família</td>
								<td>220,00</td>
								<td>80,00</td>
								<td>25,00</td>
							</tr>
							<tr>
								<td colspan="3">2 camas de casal ou 1 cama de casal + 2 camas de solteiro</td>
							</tr>
							<tr>
								<td><b>Observação</b></td>
								<td colspan="4">Valores de segunda à sexta-feira. Nos finais de semana o valor é acrescido em 10%</td>
							</tr>
						</table>
					</section>
				</article>
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
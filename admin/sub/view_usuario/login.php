<?php
    @session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="../../../style.css">
</head>

<body>
    <header>
        <h1>POUSADA DAS CAPIVARAS - Login</h1>
        <nav id="headnav">
        <?php if(empty($_SESSION)): ?>
            <ul>
                <li><a href="principal.php">HOME</a></li>
				<li><a href="reserva.php">RESERVA</a></li>
				<li><a href="acomodacoes.php" class="active">ACOMODAÇÕES</a></li>
            </ul>
        <?php endif; ?>
        <?php if(empty($_SESSION) !== true): ?>
            <ul>
                <li><p>Olá, <?= $_SESSION['nome'] ?></p></li>
                <li><a href="../controller.user.php?action=logout">Sair</a></li>
            </ul>
        <?php endif; ?>
        </nav>
    </header>

    <nav id="mainnav">
        <ul>
        <li><a href="principal.php">A Pousada</a></li>
		<li><a href="reserva.php">Reserva</a></li>
		<li><a href="acomodacoes.php">Acomodações</a></li>
		<li><a href="faleconosco.php">Fale Conosco</a></li>
        </ul>
    </nav>

    <aside>
		<p><big><b>Nossos<br>parceiros</b></big></p>
		<img src="../../../imagens/uber.png">&nbsp;<img src="../../../imagens/aiqfome.png">&nbsp;<img src="../../../imagens/lar.png">&nbsp;<img src="../../../imagens/utfpr.png">
	</aside>

    <main>

    <?php if (@$message) : ?>
    <div role="alert">
        <?= @$message ?> 
    </div>  
    
    <?php endif; ?>

        <form action="../view_adm/ctrl_usuario.php?action=login" method="post">
            <fieldset title="">
            <legend>Login</legend>
            <label for="email">E-mail</label>
			<input type="text" name="email" placeholder="email@mail.com" autocomplete="off" required><br>
            <label for="senha">Senha</label>
            <input type="password" name="senha" placeholder="*********" autocomplete="off" required><br>
            </fieldset>
            <input type="submit" name="" id="button" value="Logar">
        
        </form>
        <h4>Não tem cadastro?<h4>
        <a href="cadastro.html" class="botao" >Cadastrar</a>

    </main>


    <footer>
			<hr>
			<p>Pousada das Capivaras - 2022</p>
			<p><i>Av. Videira Ramos, 432 - Vila Verona - PR</i></p>
			<p>&#128222; (555) 4002-8922</p>
			<p id="ult">&#128231; <a href="mailto:pousadadascapivaras21@protonmail.com.br">pousadadascapivaras21@protonmail.com.br</a></p>
		</footer>
</body>

</html>
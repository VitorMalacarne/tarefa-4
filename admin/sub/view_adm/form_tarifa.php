<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarifas</title>
    <link rel="stylesheet" type="text/css" href="../../../style.css">
</head>

<body>
<header>
			<h1>POUSADA DAS CAPIVARAS - Administração</h1>
			<h2></h2>
		</header>
<div id="maindiv">
    <nav id="mainnav">
        <ul>
            <li><a href="index.html">HOME</a></li>
    		<li><a href="ctrl_acom.php">Lista de acomodações</a></li>
    		<li><a href="ctrl_reserva.php">Lista de reservas</a></li>
    		<li><a href="ctrl_tarifa.php">Lista de tarifas</a></li>
    		<li><a href="ctrl_usuario.php">Lista de usuários</a></li>
    		<li><a href="form_acomodacao.php">Formulário de acomodações</a></li>
    		<li><a href="form_tarifa.php">Formulário de tarifas</a></li>
    	 </ul>
    </nav>
        <h3>Nova tarifa</h3>

        <form action="ctrl_tarifa.php" method="post">
            <input type="hidden" name="action" value="novo">
            <input type="hidden" name="id" value="<?= @$tarifa->id ?>">

            <div>
                <label>Preço</label>
                <input required type="number" name="preco" value="<?= @$tarifa->preco ?>">
            </div>

            <div>
                <label>Preço adicional de adulto</label>
                <input required type="number" name="preco_adulto" value="<?= @$tarifa->preco_adulto ?>">
            </div>

            <div>
                <label>Preço adicional de criança</label>
                <input required type="number" name="preco_crianca" value="<?= @$tarifa->preco_crianca ?>">
            </div>


            <div>
                <button type="submit">Salvar</button>
                <a href="../view_adm/list_tarifa.php">Cancelar</a>
            </div>

        </form>
    </div>
</body>

</html>
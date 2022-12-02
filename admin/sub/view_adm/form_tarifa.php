<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarifas</title>
    <link rel="stylesheet" type="text/css" href="../../../style.css">
</head>

<body>
    <header>
    <nav id="headnav">
        <ul>
    	    <li><a href="index.html">HOME</a></li>
	        <li><a href="list_acomodacao.php">Lista de acomodações</a></li>
    		<li><a href="list_reserva.php">Lista de reservas</a></li>
            <li><a href="list_tarifa.php">Lista de tarifas</a></li>
    		<li><a href="list_usuario.php">Lista de usuários</a></li>
            <li><a href="form_acomodacao.php">Formulário de acomodações</a></li>
    		<li><a href="form_tarifa.php">Formulário de tarifas</a></li>
    	 </ul>
    </nav>
    </header>
    
    <div class="container">

        <form action="ctrl_tarifa.php" method="POST">
            <fieldset>
            <legend>Nova tarifa</legend>
            <input type="hidden" name="action" value="cadastrar">
            <input type="hidden" name="id" value="<?= @$tarifa->id ?>">

            <div>
                <label>Preço</label>
                <input required type="number" name="preco" value="<?= @$tarifa->preco ?>" class="form-control">
            </div>

            <div>
                <label>Preço adicional de criança</label>
                <input required type="number" name="precoC" value="<?= @$tarifa->precoC ?>" class="form-control">
            </div>

            <div>
                <label>Preço adicional de adulto</label>
                <input required type="number" name="precoA" value="<?= @$tarifa->precoA ?>" class="form-control">
            </div>

            </fieldset>
            <div>
                <input  type="submit" value="Salvar">
                <a href="list_tarifa.php" >Cancelar</a>
            </div>
            

        </form>
    </div>
</body>

</html>
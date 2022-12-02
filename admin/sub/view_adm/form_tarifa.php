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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ADM MODE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="lista_users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_acom.php">Acomodações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="list_tarifas.php">Tarifas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_reservas.php">Reservas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h3>Nova tarifa</h3>


        <!-- <?php if (@$message) : ?>

            <div class="toast fade show align-items-center text-bg-warning border-0 mx-auto my-3" role="alert" aria-live="polite" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <?= @$message ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>

        <?php endif; ?> -->

        <form action="../controller/controller.tar.php" method="POST">
            <input type="hidden" name="action" value="cadastrar">
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

            </fieldset>
            <div>
                <button class="btn btn-success mt-3" type="submit">Salvar</button>
                <a href="../view_adm/list_tarifas.php" class="btn btn-light mt-3 ms-1">Cancelar</a>
            </div>
            

        </form>
    </div>
</body>

</html>
<?php
session_start();
if (!isset($_SESSION["acesss"])) {
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mobile.css">
    <title>Impartech</title>
</head>

<body class="body">
    <div class="show_menu">
        <button id="open_menu_mobile"><i class="fa-solid fa-bars"></i></button>
    </div>
    <header>
        <div class="container_main">
            <div class="welcome">
                <h1>Bem vindo</h1>
            </div>
            <div class="destroy_sessio">
                <form class="destroy_sessio_form">
                    <input type="hidden" name="session" value="<?php echo $_SESSION["acesss"]; ?>">
                    <button type="submit" name="submit">Sair</button>
                </form>
            </div>
        </div>
        <nav class="menu">
            <div class="hidden_menu_mobile">
                <button id="_menu_mobile"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <ul>
                <li><a href="index.php"><i class="fa-solid fa-house"></i>Home</a></li>
                <li><a href="cadastro.php"><i class="fa-solid fa-hammer"></i>Cadastrar cliente</a></li>
                <li><a href="prestador.php"><i class="fa-solid fa-address-card"></i>Cadastro prestador</a></li>
                <li><a href="pedido.php"><i class="fa-solid fa-box-archive"></i>Pedido</a></li>
                <li><a href="relatorio.php"><i class="fa-solid fa-file-excel"></i>Relatório</a></li>
            </ul>
        </nav>
    </header>

</body>
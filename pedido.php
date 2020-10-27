<?php
    $servename = "localhost";
    $username = "root";
    $password = "";
    $database = "fseletro";

    $conn = mysqli_connect ($servename, $username, $password, $database);

    if(!$conn){
        die("A conexão ao Banco de dados falhou: " . mysqli_connect_error());
    }   
    
    if(isset($_POST['cliente']) && isset($_POST['endereco']) && isset($_POST['telefone']) && isset($_POST['produto']) && isset($_POST['preco']) && isset($_POST['quantidade']) && isset($_POST['precototal'])){
        $cliente = $_POST['cliente'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $produto = $_POST['produto'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];
        $precototal = $_POST['precototal'];

        $sql = "insert into pedidos (cliente, endereco, telefone, produto, preco, quantidade, precototal) 
        values ('$cliente', '$endereco', '$telefone', '$produto', '$preco', '$quantidade', '$precototal')";
        $result = $conn->query($sql);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Pedidos - Full Stack Eletro</title>
        <link rel="stylesheet" type="text/css" href="./css/estilo.css">
    </head>
    <body>
         <!--Menu-->
        <?php
            include('menu.html');
        ?>

        <h2>Pedidos</h2>
        <hr>
        <h3><a href="produtos.php" style="text-decoration: none; color: red;">Voltar</a></h3>
        <br><br><br>

        <form class="form" method="post" action="">
            <h4>Nome: </h4>
            <input type="text" name="cliente" id="entrada_texto">
            <h4>Endereço: </h4>
            <input id="entrada_texto" type="text" name="endereco">
            <h4>Telefone: </h4>
            <input id="entrada_texto" type="tel" name="telefone">
            <h4>Nome do Produto: </h4>
            <input id="entrada_texto" type="text" name="produto">
            <h4>Preço: </h4>
            <input id="entrada_texto" type="text" name="preco">
            <h4>Quantidade: </h4>
            <input id="entrada_texto" type="number" name="quantidade">
            <h4>Preço Total: </h4>
            <input id="entrada_texto" type="text" name="precototal">
            <input type="submit" name="submit" value="Enviar">
        </form>


        <br><br><br><br><br>
        <br><br><br><br><br>
        <br><br><br><br><br>
        <br><br><br><br><br>

        <footer id="rodape">
            <p id="formas_pagamento">Formas de pagamento:</p>
            <img class="img_rodape" src="./imagens/WhatsApp Image 2020-09-22 at 21.19.58 (1).jpeg">
            <p>&copy; Recode Pro</p>
        </footer>
    </body>
    

</html>
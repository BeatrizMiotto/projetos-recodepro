<?php
    $servename = "localhost";
    $username = "root";
    $password = "";
    $database = "fseletro";

    $conn = mysqli_connect ($servename, $username, $password, $database);

    if(!$conn){
        die("A conexão ao Banco de dados falhou: " . mysqli_connect_error());
    }    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Produtos - Full Stack Eletro</title>
        <link rel="stylesheet" type="text/css" href="./css/estilo.css">
        <script src="func.js"></script>
    </head>
    <body>
         <!--Menu-->
        <?php
            include('menu.html');
        ?>

        <header>
            <h2>Produtos</h2>
            
        </header>
        <hr>
        <br><br>

        <section class="categorias">
                <h3>Categorias</h3>
                <ol>
                    <li onclick="exibir_todos()">Todos (12)</li>
                    <li onclick="exibir_categoria('geladeira')">Geladeiras (3)</li>
                    <li onclick="exibir_categoria('fogao')">Fogões (2)</li>
                    <li onclick="exibir_categoria('microondas')">Microondas (3)</li>
                    <li onclick="exibir_categoria('lavaroupa')">Lavadoura de roupas (2)</li>
                    <li onclick="exibir_categoria('lavalouca')">Lava-louças (2)</li>
                    <li><a href="pedido.php" style="text-decoration: none; color: black;">Faça seu pedido</a></li>
                </ol>
        </section>
                
                <section class="produtos">
                <?php
                    $sql = "select * from produtos";
                    $result = $conn->query($sql);
                
                    if($result->num_rows >0){
                        while($rows = $result->fetch_assoc()){
                            
                ?>
                <div class="box_produtos" id="<?php echo $rows["categorias"]; ?>" style="display:block;">
                    <img src="<?php echo $rows["imagens"]; ?> " width="120px" onmousemove="destaque(this)">
                   <br>
                   <p class="descricao"><?php echo $rows["descricao"]; ?></p>
                   <hr>
                   <p class="descricao"><strike><?php echo $rows["preco"]; ?></strike></p>
                   <p class="preco"><?php echo $rows["precofinal"]; ?></p>
                </div>

                <?php
                        }
                    }else{
                        echo "Nenhum produto cadastrado";
                    }
                ?>
                </section>
                

        <br><br><br><br><br>
        <br><br><br><br><br>

        <footer id="rodape">
            <p id="formas_pagamento">Formas de pagamento:</p>
            <img  class="img_rodape" src="./imagens/WhatsApp Image 2020-09-22 at 21.19.58 (1).jpeg">
            <p>&copy; Recode Pro</p>
        </footer>
    </body>
</html>
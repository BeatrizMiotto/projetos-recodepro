<?php
    $servename = "localhost";
    $username = "root";
    $password = "";
    $database = "fseletro";

    $conn = mysqli_connect ($servename, $username, $password, $database);

    if(!$conn){
        die("A conexão ao Banco de dados falhou: " . mysqli_connect_error());
    }   
    
    if(isset($_POST['nome']) && isset($_POST['msg'])){
        $nome = $_POST['nome'];
        $msg = $_POST['msg'];

        $sql = "insert into comentarios (nome, msg) values ('$nome', '$msg')";
        $result = $conn->query($sql);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>contato - Full Stack Eletro</title>
        <link rel="stylesheet" type="text/css" href="./css/estilo.css">
    </head>
    <body>
         <!--Menu-->
        <?php
            include('menu.html');
        ?>

        <h2>Fale Conosco</h2>
        <hr>
        <table  class="tabela">
            <tr>
                <td  id="contato" >
                    <img src="./imagens/email imagem.png" width="40px">contato@fullstackeletro.com
                </td>

                <td id="contato">
                    <img src="./imagens/whats.png" width="30px">(11) 99999-9999
                </td>
            </tr>

        </table>
        <form id="formulario" method="post" action="">
            <h4>Nome: </h4>
            <input type="text" name="nome" id="entrada_texto">
            <h4>Mensagem: </h4>
            <input id="entrada_texto" type="text" name="msg">
            <input type="submit" name="submit" value="Enviar">
        </form>

        <?php
                    $sql = "select * from comentarios";
                    $result = $conn->query($sql);
                
                    if($result->num_rows >0){
                        while($rows = $result->fetch_assoc()){
                            echo "Data: ", $rows['data'], "<br>";
                            echo "Nome: ", $rows['nome'], "<br>";
                            echo "Mensagem: ", $rows['msg'], "<br>";
                            echo "<hr>";
                        }
                    }else{
                        echo "Nenhum comentário ainda!";
                    }
                ?>
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
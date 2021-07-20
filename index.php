<?php
    include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Sistema de Perguntas Aleatorias</title>
    </head>
    <body>
        
    <?php
        //Pesquidar pergunta randomica
        $query_pergunta = "SELECT id, questao FROM perguntas ORDER BY RAND() LIMIT 1";
        $result_pergunta = $conn->prepare($query_pergunta);
        $result_pergunta->execute();


        if(($result_pergunta) AND $result_pergunta->rowCount() != 0 ){
            $row_pergunta = $result_pergunta->fetch(PDO::FETCH_ASSOC);
            extract($row_pergunta);
            echo $questao . "<br>";

            $query_resposta = "SELECT id AS id_resposta, resposta FROM alternativas WHERE pergunta_id = $id ORDER BY id ASC";
            $result_resposta = $conn->prepare($query_resposta);
            $result_resposta->execute();
            while($row_resposta = $result_resposta->fetch(PDO::FETCH_ASSOC)){
                extract($row_resposta);
                echo $resposta . "<br>";
            }
        }else{
            echo "Pergunta não encontrada!";
        }


    ?>

    


    </body>    
</html>
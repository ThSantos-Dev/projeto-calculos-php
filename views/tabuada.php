<?php

// Obtendo o caminho relativo e chamando arquivo header.php do components 
$caminho_base = realpath(__DIR__);
$caminho = $caminho_base . '/../components/header.php';

// Obtendo a URI da pasta raiz
require_once('../global.php');
$base = geraUrlViews();

// Imports 
require_once('../modules/config.php'); // Arquivo que contém as Mensagens do Sistema
require_once('../modules/calculos.php'); // Arquivo que contém os Cálculos matématicos de todo o Sistema


// Declaração de variáveis que conterão os valores digitados pelo usuário
$tabuada = (int) 0;
$contador = (int) 0;
// Será utilizada no HTML para exibir a Tabuada gerada
$resultado = (string) null;


// Verificando se o botao 'calcular' foi clicado
if (isset($_POST['btnCalc'])) {
    // Validando a existência dos valores Tabuada e Contador
    if (!isset($_POST['txtTabuada']) || !isset($_POST['txtContador']))
        // Caso haja valores vazios, será exibida uma mensagem ao cliente
        echo (ERRO_MSG_CAIXA_VAZIA);
    else {
        // Recebendo os valores do formulário
        $tabuada = $_POST['txtTabuada'];
        $contador = $_POST['txtContador'];

        // Validando se todos os valores digitadas são numéricos
        if (!is_numeric($tabuada) || !is_numeric($contador))
            // Caso haja algum campo contendo Letras, será exibida uma mensagem ao Cliente
            echo (ERRO_MSG_CARACTER_INVALIDO_TEXTO);
        else {
            // Validando se a Tabuada escolhida é a do 0
            if (!($tabuada != 0))
                // Caso seja, será exibida uma mensagem ao usu
                echo (ERRO_MSG_TABUADA_DO_ZERO);
            else
                // Chamada da função 'calculaTabuada', pertence ao arquivo localizado em:
                // '../modules/calculos.php'
                //  Recebe a Tabuada e seu contador, retorna uma string
                //  contendo os reultados da tabuada gerada
                $resultado = calculaTabuada($tabuada, $contador);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
</head>

<body id="tabuada">
    <?php
    include_once($caminho);
    ?>
    <div class="container">
        <main id="conteudo">
            <div id="titulo">
                <h2>Tabuada</h2>
            </div>

            <div>
                <form action="tabuada.php" method="post" name="frmTabuada">
                    <div id="container-tabuada">
                        <label for="txtTabuada">Tabuada:</label>
                        <input type="text" name="txtTabuada" id="" value="<?= $tabuada != 0 ? $tabuada : null ?>" placeholder="Tabuada do...">
                    </div>
                    <div id="container-contador">
                        <label for="txtContador">Contador:</label>
                        <input type="text" name="txtContador" id="" value="<?= $contador != 0 ? $contador : null ?>" placeholder="Até o...">
                    </div>

                    <div id="btnCalc">
                        <input type="submit" name="btnCalc" value="Calcular">
                    </div>
                </form>

                <div id="resultado">
                    <div class="span">
                        <?= $resultado ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
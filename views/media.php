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

// Declaração de variáveis que conterão o valor das notas digitadas pelo usuário
$nota1 = (float) 0;
$nota2 = (float) 0;
$nota3 = (float) 0;
$nota4 = (float) 0;
$media = (float) 0;

// Verificando se o usuário clicou no botão 'Calcular'
if (isset($_POST['btncalc'])) {
    // Validando a existência dos valores de nota em cada input
    if (!isset($_POST['txtn1']) || !isset($_POST['txtn2']) || !isset($_POST['txtn3']) || !isset($_POST['txtn4']))
        // Caso haja alguma caixa vazia, será exibida uma mensagem ao cliente
        echo (ERRO_MSG_CAIXA_VAZIA);
    else {
        // Recebendo valores do formulário
        $nota1 = $_POST['txtn1'];
        $nota2 = $_POST['txtn2'];
        $nota3 = $_POST['txtn3'];
        $nota4 = $_POST['txtn4'];

        // Validando se todas a notas digitadas são numéricos
        if (!is_numeric($nota1) || !is_numeric($nota2) || !is_numeric($nota3) || !is_numeric($nota4))
            // Caso haja algum campo contendo Letras, será exibida uma mensagem ao Cliente
            echo (ERRO_MSG_CARACTER_INVALIDO_TEXTO);
        else {
            // Chamada da função 'calculaMedia', pertence ao arquivo localizado em:
            // '../modules/calculos.php'
            //  Recebe N notas e retorna um Int/Double contendo o resultado da Média
            $media = calculaMedia($nota1, $nota2, $nota3, $nota4);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Média</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <meta charset="utf-8">
</head>

<body id="media">
    <?php
    include_once($caminho);
    ?>
    <div class="container">
        <main id="conteudo">
            <div id="titulo">
                <h1>Cálculo de Médias</h1>
            </div>

            <div id="form">
                <form name="frmMedia" method="post" action="media.php">
                    <div>
                        <label>Nota 1:</label>
                        <input type="text" name="txtn1" value="<?= $nota1 ?>">
                    </div>

                    <div>
                        <label>Nota 2:</label>
                        <input type="text" name="txtn2" value="<?= $nota2 ?>">
                    </div>

                    <div>
                        <label>Nota 3:</label>
                        <input type="text" name="txtn3" value="<?= $nota3 ?>">
                    </div>

                    <div>
                        <label>Nota 4:</label>
                        <input type="text" name="txtn4" value="<?= $nota4 ?>">
                    </div>
                    <div>
                        <div id="botaoReset">
                            <a href="media.php">Novo Cálculo</a>
                        </div>
                        <input type="submit" name="btncalc" value="Calcular">
                    </div>
                </form>

            </div>
            <div id="resultado">
                A média é: <?= $media ?>
            </div>
        </main>
    </div>
</body>

</html>
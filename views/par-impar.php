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
require_once('../modules/alteraTemplate.php'); // Arquivo que contém funções que geram elementos HTML sem processamento de cálculos

$numeroInicial = (int) 0;
$numeroFinal = (int) 0;

// Array que irá conter todos os numéros do range selecionado - é separado pelos valores Impares e Pares
$array = [];

// Verificando se o usuário clicou no botão 'Calcular'
if (isset($_POST['btnCalc'])) {
    // Validando a existência do valor Nº Inicial e Nº Final
    if (!isset($_POST['sltInicial']) || !isset($_POST['sltFinal']))
        // Caso uma das opções não seja selecionada, será exibida uma mensagem ao cliente
        echo (ERRO_MSG_CAIXA_VAZIA);
    else {
        // Recebendo os valores do formulário
        $numeroInicial = $_POST['sltInicial'];
        $numeroFinal = $_POST['sltFinal'];

        // Validando se o  Nº Inicial é maior ou igual ao Nº Final
        if ($numeroInicial >= $numeroFinal)
            // Caso seja, será exibida uma mensagem ao cliente
            echo (ERRO_MSG_NUMERO_INICIAL_MAIOR_OU_IGUAL_QUE_O_FINAL);
        else
            // Chamada da função 'classificaNumero', pertence ao arquivo localizado em:
            // '../modules/calculos.php'
            //  Recebe o Nº Inicial e Nº Final e retornará um array contendo a classificação
            //  em duas chaves: Par e Impar
            $array = classificaNumero($numeroInicial, $numeroFinal);
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Par-Impar</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
</head>

<body id="par-impar">
    <?php
        include_once($caminho);
    ?>
    <div class="container">
        <main id="conteudo">
            <div id="titulo">
                <h1>Par ou Impar?</h1>
            </div>
            <div>
                <form action="par-impar.php" method="POST" name="frmParImpar" id="form">
                    <div id="container-sltInicial">
                        <label for="sltInicial">N° Inicial:</label>
                        <select name="sltInicial" id="" required>
                            <option value="">Por favor selecione um número</option>
                            <!-- Chamada da função 'classificaNumero', pertence ao arquivo localizado em:
                             '../modules/calculos.php'
                             Recebe o Nº Inicial e Nº Final e retornará um array contendo a classificação
                             em duas chaves: Par e Impar -->
                            <?= geraOption(0, 500, $numeroInicial) ?>
                        </select>
                    </div>
                    <div id="container-sltFinal">
                        <label for="sltFinal">N° Final:</label>
                        <select name="sltFinal" id="" required>
                            <option value="">Por favor selecione um número</option>
                            <?= geraOption(100, 1000, $numeroFinal) ?>
                            <option value="">0</option>
                        </select>
                    </div>
                    <div id="btnCalc">
                        <input type="submit" name="btnCalc" value="Calcular">
                    </div>
                </form>
            </div>

            <div id="resultado">
                <div id="container-pares">
                    <h2>N° Pares:</h2>
                    <div class="span">
                        <?= count($array) != 0 ? imprimeArray($array['Pares']) : null ?>
                    </div>
                    <span class="quantidade-span">Quantidade de Pares: <b><?= count($array) != 0 ? count($array['Pares']) : null; ?></b></span>
                </div>
                <div id="container-impares">
                    <h2>N° Impares:</h2>
                    <div class="span">
                        <?= count($array) != 0 ? imprimeArray($array['Impares']) : null ?>
                    </div>
                    <span class="quantidade-span">Quantidade de Impares: <b><?= count($array) != 0 ? count($array['Impares']) : null; ?></b></span>
                </div>
            </div>
        </main>
    </div>

</body>

</html>
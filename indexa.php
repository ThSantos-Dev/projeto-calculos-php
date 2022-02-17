<?php
// Obtendo o caminho relativo e chamando arquivo header.php do components 
$caminho_base = realpath(__DIR__);
$caminho = $caminho_base . '/components/header.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projeto - Cálculos</title>

  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/menu.css">
</head>

<body>
<header>

    <div>
        <input type="checkbox" id="check">
        <label for="check" id="icone"><img src="https://i.imgur.com/RWHvwPE.png" /></label>
        <div class="barra">
            <nav>
                <a class="link" href="#">
                    <div>Home</div>
                </a>
                <a class="link" href="/views/calculadora.php">
                    <div>Calculadora</div>
                </a>
                <a class="link" href="/views/media.php">
                    <div>Média</div>
                </a>
                <a class="link" href="/views/par-impar.php">
                    <div>Par-Impar</div>
                </a>
                <a class="link" href="/views/tabuada.php">
                    <div>Tabuada</div>
                </a>
            </nav>
        </div>
    </div>
    <div id="header-title" class="">
            <h1>Projeto Cálculos - Thales Santos </h1>
    </div>
</header>

  <main>
    <div id="titulo">
      <h2>Bem vindo ao Projeto!</h2>
      <p>Abaixo detalharei alguns pontos do desenvolvimento de cada componente.</p>
    </div>

    <div id="container">
      <div class="container-titulo-subtitulo-img">
        <div class="container-titulo-subtitulo">
          <h3>Calcladora Simples</h3>
          <p>Esta aplicação tem como finalidade simular uma "calculadora" que realiza as quatro operações matemáticas básicas: Adição (Soma), Subtração, Divisão e Multiplicação.</p> 
        </div>
        <div>
        <a href="./views/calculadora.php">
          <img class="container-img" src="./assets/img/calculadora.png" alt="">
        </a>  
        </div>
      </div>

      <div class="container-titulo-subtitulo-img">
        <div class="container-titulo-subtitulo">
          <h3>Média</h3>
          <p>O Sistema permite calcular a "média" entre quatro valores informados, no caso, as notas escolares de cada bimentre.</p>
        </div>
        <div>
        <a href="./views/media.php">
          <img class="container-img" src="./assets/img/media.png" alt="">
        </a>  
        </div>
      </div>

      <div class="container-titulo-subtitulo-img">
        <div class="container-titulo-subtitulo">
          <h3>Tabuada</h3>
          <p>Uma das primeiras coisas que aprendemos na vida é a Tabuada. Com esta aplicação, você conseguirá gerar a tabuada que desejar em segundos. Perfeita para se utilizar em momentos em que o tempo de resposta é essencial.</p>
        </div>
        <div>
        <a href="./views/tabuada.php">
          <img class="container-img" src="./assets/img/tabuada.png" alt="">
        </a>  
        </div>
      </div>

      <div class="container-titulo-subtitulo-img">
        <div class="container-titulo-subtitulo">
          <h3>Par ou Impar?</h3>
          <p>Com essa ferramenta é possível saber qual a classificação de cada número - como sendo ímpar ou par, em determinado intervalo. Além disso, ao final você poderá consultar a quantidade de cada um deles.</p>
        </div>
        <div>
        <a href="./views/par-impar.php">
          <img class="container-img" src="./assets/img/par-impar.png" alt="">
        </a>  
        </div>
      </div>
    </div>
  </main>
</body>

</html>
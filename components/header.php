<header>
    <!-- < ? =//$_SERVER['REQUEST_URI']  ;? > -->

    <div>
        <input type="checkbox" id="check">
        <label for="check" id="icone"><img src="https://i.imgur.com/RWHvwPE.png" /></label>
        <div class="barra">
            <nav>
                <a class="link" href="<?=$base?>index.php">
                    <div>Home</div>
                </a>
                <a class="link" href="<?=$base?>views/calculadora.php">
                    <div>Calculadora</div>
                </a>
                <a class="link" href="<?=$base?>views/media.php">
                    <div>Média</div>
                </a>
                <a class="link" href="<?=$base?>views/par-impar.php">
                    <div>Par-Impar</div>
                </a>
                <a class="link" href="<?=$base?>views/tabuada.php">
                    <div>Tabuada</div>
                </a>
            </nav>
        </div>
    </div>
    <div id="header-title" class="">
            <h1>Projeto Cálculos - Thales Santos </h1>
    </div>
</header>
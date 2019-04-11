<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <?php \fw\core\base\View::getMeta()?>
<!--    --><?php //\fw\core\base\View::getMeta()?>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/public/assets/css/bootstrap/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/reset.css">
    <link rel="stylesheet" href="/public/assets/css/main.css">
<meta property="og:url" content="[http://localhost/tests/php]">
<meta property="og:title" content="[Test]">
<meta property="og:description" content="[opisanie]">
<meta property="og:image" content="[IMAGE]">
</head>
<body>

<div id="wrapper">
    <header id="header" class="hader">

        <div class="container">
            <div class="header__logo">
                <a href="/">Logo</a>
            </div>
            <div class="header__items">
                <a href="/tests">Тесты</a>
                <a href="/pages/feedback">Обратная связь</a>
            </div>
            <div class="header__buttons d-flex">
                <div class="search__panel">
                    <form action="/search" method="GET" role="search">
                        <label for="">
                            <input type="text" name="q" placeholder="Поиск.." id="search">
                            <button type="submit" class="search__btn"><i class="fa fa-search"></i></button>
                        </label>
                        <div class="search__resultsBlock"></div>
                    </form>
                   
                </div>
                <a href="/user/login" class="loginBtn">
                    <i class="fas fa-sign-in-alt"></i>
                    <span class="">Войти</span>
                </a>
            </div>
        </div>

    </header>





    <div id="content" class="content">
        <div class="container">
            <?=$content?>
        </div>
    </div>
    <footer id="footer" class="footer">
        <div class="container">
            <div class="footer__social">
                <ul>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-vk"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="/public/assets/css/bootstrap/js/bootstrap.min.js"></script>
<script src="/public/assets/js/common.js"></script>
<?php foreach($scripts as $script): ?>
    <?=$script?>
<?php endforeach; ?>
</body>
</html>
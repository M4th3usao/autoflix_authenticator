<?php

include_once('vendor/sonata-project/google-authenticator/src/FixedBitNotation.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php');

//Metodos para trabalhar com o Google Authenticator
$g = new \Google\Authenticator\GoogleAuthenticator();

//criar uma chave secret
$secret = 'XVQ2UIGO75XRUKJO';

//validar o token submetido
if(isset($_POST['token'])){
    $token = $_POST['token'];
    if($g->checkCode($secret, $token)){
        echo 'Autenticacao Liberada!';
    }
    else{
        echo 'Token invalido ou expirado';
    }
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/main.css">
    <link rel="stylesheet" href="/style/responsive.css">
    <link rel="stylesheet" href="/style/cadastro.css">

    <title>Autoflix</title>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <header>
        <div class="container">
            <h2 class="logo">AUTOFLIX</h2>
            <nav>
                <a href="index.html">Início</a>
                <a href="">Séries</a>
                <a href="">Filmes</a>
                <a href="">Documentários</a>
                <a href="/cadastro.html">Cadastro</a>
                <a href="/login.php">Login</a>
            </nav>
        </div>
    </header>


    <main> 
        
        <h2>Login</h2>

        <div class="box">
            <div class="container-form">
                <form action="login.php" method="post">

                    <div class="itemC">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" required/>
                    </div>

                    <div class="itemC">
                        <label for="password">Senha</label>
                        <input type="password" required>
                    </div>

                    <div class="itemC">
                        <label>Registre no Google Authenticator</label>
                        <img src="<?php echo $g->getUrl('CJ', 'autoflixbrasil.000webhostapp.com', $secret)?>"/>
                    </div>

                    <div class="itemC">
                        <label">Informe o token</label>
                        <input type="text" name="token" required/>
                    </div>

                    <div class="containerBtn">
                        <button type="submit" class="btn">Autenticar</button>
                    </div>
                    
                </form>

            </div>
        </div>

        <div></div>
    </main>

    <!--------------- Footer = Rodapé ---------------->
    <footer>  
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Baixe nosso App</h3>
                    <p>Baixe o App para celular Android e IOS</p>
                    <div class="app-logo">
                       <img src="images/play-store.png"> 
                       <img src="images/app-store.png">
                    </div>
                </div>
                <div class="footer-col-2">
                    <h2 class="logo">AUTOFLIX</h2>
                    <p>Nosso objetivo é aumentar o prazer dos amantes por automóveis em geral ;)</p>
                </div>
                <div class="footer-col-3">
                    <h3>Links Úteis</h3>
                    <ul>
                        <li>Planos</li>
                        <li>Postagem do blog</li>
                        <li>Política de devolução</li>
                        <li>Torne-se um Afiliado</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Siga-nos</h3>
                    <ul>
                        <li>FacebooK</li>
                        <li>Whatsapp</li>
                        <li>Instagram</li>
                        <li>Youtube</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p><i class="fa fa-copyright" aria-hidden="true">Copyright 2021 - Matheus Henrique</i></p>
        </div>
    </footer>
</body>
</html>
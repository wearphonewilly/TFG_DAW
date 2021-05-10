<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="copyright" content="Propietario del copyright" />
    <?php

    require './vendor/autoload.php';

    use Melbahja\Seo\Factory;
    $metatags = Factory::metaTags(
        [
        'title' => 'WatchME',
        'keywords' => 'netflix, series, peliculas, watchMe, estas-viendo, estas-viendo-me, estas-viendo.herokuapp, estas-viendo.herokuapp.com, estas-viendo.heroku',
        'author' => 'Willy'
        ]
    );

    $op = new \CoffeeCode\Optimizer\Optimizer();
    echo $op->optimize(
        "WatchMe, Estas-viendo",
        "WatchMe es un proyecto para llevar un seguimiento de las series y peliculas que ves en las diferentes plataformas de contenido",
        "https://www.estas-viendo.herokuapp.com",
        "https://www.upinside.com.br/uploads/images/2017/11/curso-de-html5-preparando-ambiente-de-trabalho-aula-02-1511276983.jpg"
    )->render();
    ?>


    <!-- Google Adsense -->
    <!--<script data-ad-client="ca-pub-8809544288885617" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Google Search Console -->
    <meta name="google-site-verification" content="PVQ2i5gpT36bP1TWZCLA9-X2PgQaR_XISt0w8Mv4ERA" />
    <!-- Styles -->
    <link rel="stylesheet" href="./styles/css/index.css">
    <!-- Scripts -->
    <script src="./js/index.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- For ^ up-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        #loginBtn,
        #registerBtn {
            border-radius: 10px !important;
        }

        #loginA,
        #registerA {
            color: white;
            text-decoration: none;
        }
    </style>

</head>

<body>
    <section class="intro">
        <div class="custom-shape-divider-top-1614097386">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
                    class="shape-fill"></path>
            </svg>
        </div>
        <div class="content">
            <h1>WatchME</h1>
            <button id="loginBtn"><a id="loginA" href="./php/login.php" target="_blank"
                    rel="noopener noreferrer">Login</a></button>
            <button id="registerBtn"><a id="registerA" href="./php/register.php" target="_blank"
                    rel="noopener noreferrer">Register</a></button>
        </div>
        <div class="content">
            <img src="./styles/img/tvTime.png" class="profile-img" style="width: 40%; margin-left: 29%;">
        </div>
        <div class="mouse_scroll">
            <div class="mouse">
                <div class="wheel"></div>
            </div>
            <div>
                <span class="m_scroll_arrows unu"></span>
                <span class="m_scroll_arrows doi"></span>
                <span class="m_scroll_arrows trei"></span>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col" style=" margin-top: 15%;">
                    <div class="content">
                        <h1 id="titulo">Tus películas y series al día</h1>
                        <h2 id="descripcion"> <i> <b>¿Cómo va eso? </b> </i> Aquí podrás llevar un seguimiento de todas
                            ellas. </h2>
                    </div>
                </div>
                <div class="col" id="col2">
                    <div class="content">
                        <img id="imgJoey" src="./styles/img/joey.png" alt="Joey de Friends" width="300" height="400"
                            loading="lazy">
                    </div>
                </div>
                <button onclick="topFunction()" id="myBtn" title="Go to top"> <i class="fa fa-arrow-up"></i> </button>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col" style=" margin-top: 15%;">
                    <div class="content">
                        <h2 id="titulo2">¿Porqué necesito WatchME?</h2>
                        <p><i> <b> Porque le voy a hacer una oferta que no podrá rechazar. </b></i> Aquí tenemos el
                            listado de películas y series más completo de todo internet</p>
                    </div>
                </div>
                <div class="col" id="col2">
                    <div class="content">
                        <img id="imgPadrino" src="./styles/img/padrino.png" alt="El Padrino" width="400" height="400"
                            loading="lazy">
                    </div>
                </div>
                <button onclick="topFunction()" id="myBtn" title="Go to top"> <i class="fa fa-arrow-up"></i> </button>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col" style=" margin-top: 20%;">
                    <div class="content">
                        <!-- <h2>¿Tienes problemas para elegir una película para la primera cita?</h2> -->
                        <h2 id="titulo">¿Tienes problemas para escoger una película?</h2>
                        <p><i> <b> Mamá dice que la vida es como una caja de bombones, nunca sabes el que te va a
                                    tocar </b>
                            </i> &nbsp Nuestro sistema seleccionará una por ti</p>
                    </div>
                </div>
                <div class="col" id="col2">
                    <div class="content">
                        <img id="imgForrest" src="./styles/img/forrestGump.png" alt="Forrest Gump by Tom Hanks"
                            width="300" height="400" loading="lazy">
                    </div>
                </div>
                <button onclick="topFunction()" id="myBtn" title="Go to top"> <i class="fa fa-arrow-up"></i> </button>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="row">
                <div class="col" style=" margin-top: 20%;">
                    <div class="content">
                        <h1>STATS </h1>
                        <h3>Movies 617.681 </h3>
                        <h3>TV Shows 104.400 </h3>
                        <h3>TV Seasons 155.461</h3>
                        <h3>TV Episodes 2.342.320 </h3>
                        <h3>Coffees development 535</h3>
                    </div>

                </div>
                <div class="col" id="col2">
                    <div class="content">
                        <img id="imgSheldon" src="./styles/img/sheldon.png" alt="Sheldon Cooper" width="321"
                            height="379" id="sheldon" loading="lazy">
                    </div>

                </div>
                <button onclick="topFunction()" id="myBtn" title="Go to top"> <i class="fa fa-arrow-up"></i> </button>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    Made with ❤️ by <a href="https://instagram.com/iwilly_cf" target="_blank" class="coral-Link"
                        rel="noopener noreferrer" style="color: white;">Willy</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Hotjar Tracking Code for http://estas-viendo.herokuapp.com 
    <script>
        (function (h, o, t, j, a, r) {
            h.hj = h.hj || function () {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 2254823,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script> -->
    <?php include('../html/scripts.html'); ?>
</body>

</html>
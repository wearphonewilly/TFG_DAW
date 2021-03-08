<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WatchME</title>
    <meta name="description"
        content="WatchMe es un proyecto para llevar un seguimiento de las series y peliculas que ves en las diferentes plataformas de contenido">
    <meta name="keywords" content="netflix, series, peliculas, watchMe" />
    <meta name="author" content="Willy" />
    <meta name="copyright" content="Propietario del copyright" />
    <meta name="robots" content="index" />

    <!-- Google Adsense -->
    <!--<script data-ad-client="ca-pub-8809544288885617" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <!-- Google Search Console -->
    <meta name="google-site-verification" content="PVQ2i5gpT36bP1TWZCLA9-X2PgQaR_XISt0w8Mv4ERA" />

    <!-- Styles -->
    <link rel="stylesheet" href="./styles/css/index.css">

    <!-- Scripts -->
    <script src="./js/index.js" defer></script>

    <!-- Font Awesome -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <style>
        .custom-shape-divider-top-1614097386 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .custom-shape-divider-top-1614097386 svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 309px;
        }

        .custom-shape-divider-top-1614097386 .shape-fill {
            fill: #f6f6f6;
        }

        a:link {
            color: black;
            text-decoration: none;
        }

        a:visited {
            color: black;
        }

        a:hover {
            color: black;
        }

        a:active {
            color: black;
        }

        button {
            padding: 15px;
            border-radius: 15px;
        }

        h1 {
            letter-spacing: 5px;
            font-size: 40pt;
        }

        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: orange;
            color: white;
            cursor: pointer;
            padding: 15px;
            height: 50px;
            width: 50px;
            border-radius: 50%;
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
            <button id="loginBtn"><a href="./php/login.php" target="_blank" rel="noopener noreferrer">Login</a></button>
            <button id="registerBtn"><a href="./php/register.php" target="_blank"
                    rel="noopener noreferrer">Register</a></button>
        </div>

        <div class="content">
            <img src="https://www.tvtime.com/ga-assets/1613689346313/static/856f2c017361a8e67a87ad516cc3b2a9/e0765/af8a4630-850c-409e-8cd8-8ae9a79edb9b_Header-Phones-TVT.png"
                class="profile-img" style="width: 30%; margin-left: 50%;">
        </div>
    </section>

    <section>
        <div class="content">
            <h1 id="titulo">Tus películas y series al día</h1>
            <h2 id="descripcion"> <i> <b>¿Cómo va eso? </b> </i> Aquí podrás llevar un seguimiento de todas ellas. </h2>
        </div>
        <div class="content">
            <img src="./styles/img/joey.png" alt="Joey de Friends" width="300" height="400">
        </div>

        <button onclick="topFunction()" id="myBtn" title="Go to top" class='fas fa-angle-up'> </button>
    </section>

    <section>
        <div class="content">
            <h2 id="titulo2">¿Porqué necesito WatchME?</h2>
            <p><i> <b> Porque le voy a hacer una oferta que no podrá rechazar. </b></i> <br> Aquí tenemos el listado de
                películas y series más completo<br> de todo internet</p>
        </div>
        <div class="content">
            <img src="./styles/img/padrino.png" alt="El Padrino" width="400" height="400">
        </div>

    </section>

    <section>
        <div class="content">
            <!-- <h2>¿Tienes problemas para elegir una película para la primera cita?</h2> -->
            <h2 id="titulo">¿Tienes problemas para escoger una película?</h2>
            <p><i> <b> Mamá dice que la vida es como una caja de bombones, <br> nunca sabes el que te va a tocar </b>
                </i> Nuestro sistema seleccionará una por ti</p>
        </div>
        <div class="content">
            <img src="./styles/img/forrestGump.png" alt="Forrest Gump by Tom Hanks" width="300" height="400">
        </div>
    </section>

    <section>
        <div class="content">
            <h1>STATS </h1>
            <h2>Movies 617.681 </h2>
            <h2>TV Shows 104.400 </h2>
            <h2>TV Seasons 155.461</h2>
            <h2>TV Episodes 2.342.320 </h2>
            <h2>Coffees development 535</h2>
        </div>
        <div class="content">
            <img src="./styles/img/sheldon.png" alt="Sheldon Cooper" width="321" height="379" id="sheldon"
                style="margin-left: 25%;">
        </div>

    </section>

    <footer class="p-b-20 coral-Body--S">
        Made with ❤️ by <a href="https://instagram.com/iwilly_cf" target="_blank" class="coral-Link"
            rel="noopener noreferrer">Willy</a>
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
</body>

</html>
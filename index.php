<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>WatchME</title>
    <meta name="description"
        content="WatchMe es un proyecto para llevar un seguimiento de las series y peliculas que ves en las diferentes plataformas de contenido">
    <meta name="keywords" content="netflix, series, peliculas" />
    <meta name="author" content="Willy" />
    <meta name="copyright" content="Propietario del copyright" />
    <meta name="robots" content="index" />

    <!-- Internal Files -->
    <link rel="stylesheet" href="./styles/css/index.css">

    <!-- SweetAlert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <script src="js/index.js" defer></script>

    <!-- Referencia Diseno -->
    <!-- https://dribbble.com/shots/6286426-Email-Subscription-Webpage-Design/attachments/6286426-Email-Subscription-Webpage-Design?mode=media -->

    <!-- Paleta de colores -->
    <!-- https://colorhunt.co/palette/213161 -->

</head>

<body>

    <header>
        <nav>
            <ul>
                <li><a href="index.html" class="btnIndex">WatchMELOGO</a></li>
                <li><a href="./php/login.php" target="_blank" rel="noopener noreferrer" class="btn"> Login</a></li>
                <li><a href="./php/register.php" target="_blank" rel="noopener noreferrer" class="btn"> Registro</a>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="hero">
            <div class="section-inner">
                <div class="custom-shape-divider-top-1611509350">
                    <img src="https://www.tvtime.com/ga-assets/1611172222185/static/69faec5bfe4d46002ed45cf8b3009652/e0765/tvtime-site%252F357d6439-38c2-43a9-bf3b-3dcf76a95613_header-phones%25401.5x.png"
                        class="profile-img">
                    <h1>WatchME</h1>
                </div>
            </div>
        </section>


        <section id="about">
            <div class="section-inner">
                <div class="grid-container">
                    <div class="grid-item">
                        <h2>Qué es WatchME??</h2>
                    </div>
                    <div class="grid-item">
                        <h4 id="queEsWatchME">Es una web creada por la comunidad para los fans de las películas y las
                            series</h4>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact">
            <div class="section-inner">
                <div class="grid-container">
                    <div class="grid-item">
                        <h2>Porqué necesito WatchME??</h2>
                    </div>
                    <div class="grid-item">
                        <p>Because the best recommendations come not from critics or strangers, but the people you know,
                            trust and share the same taste with. Because Must socializes your movie experience</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="press">
            <div class="section-inner">
                <div class="grid-container1">
                    <div class="grid-item">
                        <h2>Links, press and recognition</h2>
                    </div>
                    <div class="grid-item1"> <img src="https://mustapp.com/static/images/landing/link_mashable.svg"
                            alt="Mashable"> </div>
                    <div class="grid-item1"> <img src="https://mustapp.com/static/images/landing/link_appstore.svg"
                            alt="AppStore"> </div>
                    <div class="grid-item1"> <img src="https://mustapp.com/static/images/landing/link_producthunt.svg"
                            alt="ProductHaunt"> </div>
                </div>
            </div>
        </section>

        <section>
            <div class="stats">
                <div class="content">
                    <div id="statsMovie" class="inner_content">
                        <h2>Stats</h2>
                        <p>We all love them. Heres a few that we find interesting.</p>

                        <div class="inner_stats">
                            <div class="stat">
                                <p>617.681</p>
                                <p>Movies</p>
                            </div>

                            <div class="stat">
                                <p>104.400</p>
                                <p>TV Shows</p>
                            </div>

                            <div class="stat">
                                <p>155.461</p>
                                <p>TV Seasons</p>
                            </div>

                            <div class="stat">
                                <p>2.342.320</p>
                                <p>TV Episodes</p>
                            </div>

                            <div class="stat">
                                <p>1.950.298</p>
                                <p>People</p>
                            </div>

                            <div class="stat">
                                <p>2.413.666</p>
                                <p>Images</p>
                            </div>

                            <div class="stat">
                                <p>535</p>
                                <p>Coffees developemnt</p>
                            </div>

                        </div>
                    </div>
                    <img src="./styles/img/sheldon.png" width="321" height="379" id="sheldon">
                </div>
            </div>
        </section>

    </main>

    <footer class="p-b-20 coral-Body--S">
        Made with ❤️ by <a href="https://instagram.com/iwilly_cf" target="_blank" class="coral-Link">Willy</a>
        <a href="#" target="_blank" class="coral-Link">Support the project</a>
    </footer>

</body>


</html>
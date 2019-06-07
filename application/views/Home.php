<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $titulo ?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/simple-line-icons.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css') ?>">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand bg-light navigation-clean">
        <div class="container"><a class="navbar-brand" href="#">E_Web</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"></button>
            <div class="collapse navbar-collapse" id="navcol-1"><a class="btn btn-primary ml-auto" role="button" href="index.php/pagina/login">Login</a></div>
        </div>
    </nav>

    <header class="masthead text-white text-center" style="background:url('assets/img/homepage/1.jpg')no-repeat ;background-size:cover;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="mb-5"><br>E_Web Seu estoque a um toque!<br><br></h1>
                </div>
            </div>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form action="<?php echo base_url('index.php/pagina/register')?>">
                <div class="form-row">
                    <div class="col-12 col-md-9 mb-2 mb-md-0"><input class="form-control form-control-lg"  type="email" placeholder="Insira o Seu Email..."></div>
                    <div class="col-12 col-md-3"> <button class="btn btn-primary btn-block btn-lg" type="submit">Cadastre Aqui!</button></div>
                </div>
            </form>
        </div>
    </header>
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><i class="icon-people m-auto text-primary" data-bs-hover-animate="pulse"></i></div>
                        <h3>Controle Das Vendas<br></h3>
                        <p class="lead mb-0">Tenha total controle das suas vendas!<br><br></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><i class="icon-chart m-auto text-primary" data-bs-hover-animate="pulse"></i></div>
                        <h3>Controle Financeiro</h3>
                        <p class="lead mb-0">Faça a sua Gestão Financeira de Forma Facil</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><i class="icon-check m-auto text-primary" data-bs-hover-animate="pulse"></i></div>
                        <h3>Gerenciamento de Estoque</h3>
                        <p class="lead mb-0">Faça o Controle de seu estoque de forma facil e seguro</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image:url(assets/img/homepage/1.jpg);"><span></span></div>
                <div class="col-lg-6 my-auto order-lg-1 showcase-text">
                    <h2>Facil de usar</h2>
                    <p class="lead mb-0"></p>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonials text-center bg-light">
        <div class="container">
            <h2 class="mb-5">Nossos Clientes</h2>
            <div class="row">
                <div class="col-lg-3">
                    <div class="mx-auto testimonial-item mb-5 mb-lg-0"><img class="rounded-circle img-fluid mb-3" src="assets/img/homepage/kirito.jpg">
                        <h5>Kirito</h5>
                        <p class="font-weight-light mb-0">Eu prefiro confiar e me arrepender do que duvidar e me arrepender.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mx-auto testimonial-item mb-5 mb-lg-0"><img class="rounded-circle img-fluid mb-3" src="assets/img/homepage/natsu.jpg">
                        <h5>Natsu</h5>
                        <p class="font-weight-light mb-0">Agora eu fiquei animado</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mx-auto testimonial-item mb-5 mb-lg-0"><img class="rounded-circle img-fluid mb-3" src="assets/img/homepage/goku1.jpg">
                        <h5>Goku</h5>
                        <p class="font-weight-light mb-0">Oi, Eu Sou Goku!</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mx-auto testimonial-item mb-5 mb-lg-0"><img class="rounded-circle img-fluid mb-3" src="assets/img/homepage/minato.jpg">
                        <h5>Minato</h5>
                        <p class="font-weight-light mb-0">A coisa mais importante para um Shinobi é trabalho em equipe.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="call-to-action text-white text-center" style="background:url('assets/img/homepage/1.jpg')no-repeat ;background-size:cover;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h2 class="mb-4">Pronto Para Iniciar? Se Cadastre Agora!</h2>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                    <form>
                        <div class="form-row">
                            <div class="col-12 col-md-9 mb-2 mb-md-0"><input class="form-control form-control-lg" type="email" placeholder="Insira o Seu Email..."></div>
                            <div class="col-12 col-md-3"><button class="btn btn-primary btn-work btn-lg" type="submit">Cadastre Aqui!</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 my-auto h-100 text-center text-lg-left">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="#">Sobre</a></li>
                        <li class="list-inline-item"><span>⋅</span></li>
                        <li class="list-inline-item"><a href="#">Contato</a></li>
                        <li class="list-inline-item"><span>⋅</span></li>
                        <li class="list-inline-item"><a href="#">Termos de Uso</a></li>
                        <li class="list-inline-item"><span>⋅</span></li>
                        <li class="list-inline-item"><a href="#">Privacidade</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">© E_Web 2019. Todos os direitos reservados.</p>
                </div>
                <div class="col-lg-6 my-auto h-100 text-center text-lg-right">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="https://www.facebook.com"><i class="fa fa-facebook fa-2x fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="https://twitter.com/login?lang=pt"><i class="fa fa-twitter fa-2x fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/?hl=pt-br"><i class="fa fa-instagram fa-2x fa-fw"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
</body>

</html>
<?php

require __DIR__ . "../vendor/autoload.php";

$pathFile = '.';
require_once __DIR__ . './config/parameters.php';
require_once __DIR__ . './src/Core/dbConection.php';
?>

<script>

    function sendForm() {
        $('#form1').submit();
        event.preventDefault();
    }

    function registerLink(domainRoot) {
        console.log(domainRoot)
        window.location = domainRoot + 'pages/register.php';
    }

</script>

<body class="">

<link rel="stylesheet" type="text/css" href="<?=DOMAIN_ROOT ?>assets/css/new-styles.css" />
<link rel="stylesheet" type="text/css" href="<?=DOMAIN_ROOT ?>assets/css/base.css" />

<div class="login-content">
    <!--  Header -->

    <div class="lenovo-logo">
        <aside class="lenovo-icon">
            <a href="/">
                <span class="lenovo_logo-svg"></span>
            </a>
        </aside>
    </div>


    <div class="container-fluid">
        <div class="row content-login">
            <div class="col-lg-5 col-lg-offset-7 col-md-6 col-md-offset-5 col-sm-7 col-sm-offset-5 col-xs-12 login-box">
                <div class="login-form">
                    <div class="row">
                        <div class="col-xxs-12 col-xs-12 cl_white">
                            <div class="upper s30">Bienvenidos A</div>
                            <div class="lenovo_comunity-white">
                                <img src="assets/images/v1.svg" class="img-responsive" />
                            </div>
                        </div>
                    </div>
                    <?php if(!empty($_GET['msg'])):?>
                    <div class="alert alert-danger bad-info-login" role="alert">
                        <a> Datos invalidos por favor verifique sus credenciales*</a>
                    </div>
                    <?php endif;?>
                    <form role="form" id="form1" action="<?php echo DOMAIN_ROOT ?>pages/dologin.php?ac=login"
                          onkeypress="if (event.keyCode == 13) { javascript:sendForm(); }"
                          method="post">
                    <input type="hidden" name="_csrf_token" value="{{ csrf_token('authenticate') }}"/>
                    <div class="form-group">
                        <input id="username" name="email" class="form-control open-sans" type="email"
                               value="Email"
                               placeholder="Email"
                               required="required">
                    </div>
                    <div class="form-group">
                        <input id="password" name="password" class="form-control" type="password"
                               placeholder="Password"
                               required="required">
                    </div>
                    <div class="form-group">
                        <div class="row login-remember">
                            <div class="col-xs-6">
                                <input type="checkbox" id="recordar"/>
                                <label class="label-remember" for="recordar">Recordar mis datos</label><br class="visible-xs"/>
                            </div>
                            <div class="col-xs-6 forgot">
                                <a href="{{ path('fos_user_resetting_request') }}">Olvidaste tu contraseña?</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button onclick="javascript:sendForm();" id="btnSubmit" type="button" class="btn btn-success-blue">ingresar</button>
                    </div>
                    <div class="form-group">
                        <div class="row new-user">
                            <div class="col-xs-6  new-user-label">
                               Aun no estas registrado?
                            </div>
                            <div class="col-xs-6">
                                <a onclick='javascript:registerLink("<?php echo DOMAIN_ROOT ?>");' class="btn btn-newregister">registrarme ahora</a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- container-->
</div>


<footer id="sticky-footer" class="py-4 bg-dark text-white-50 footer">
    <div class="container text-center">
        <small>Copyright &copy; Your Website</small>
    </div>
        <div class="container-fluid">
            <a class="" href="mailto:iamputorraider09@gmail.com" target="_blank">Obtener Informacion</a>
        </div>

</footer>
</body>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?=DOMAIN_ROOT ?>assets/js/app.js"></script>
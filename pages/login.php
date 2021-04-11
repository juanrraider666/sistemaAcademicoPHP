<?php
require_once('../base.php');

?>

<style>

    .content_register {
        overflow: hidden;
        background: rgba(0, 167, 255, 1.00);
        padding: 15px 0;
    }

    .white_box {
        background-color: rgba(255, 255, 255, 0.9);
        width: 100%;
        float: left;
    }

    .regist_top {
        text-align: center;
    }

</style>

<script>

    function sendForm() {
        $('#form1').submit();
        event.preventDefault();
    }

    function registerLink(domainRoot) {
        window.location = domainRoot + 'pages/register.php';
    }

</script>

<body class="">
<section class="container-fluid">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="text-center">
               <span class="" style="font-size: 70px; font-family: MetricWeb_semibold;"> Bienvenido </span>
            </div>

            <div class="card-body">
                <div class="white_box">
                    <div class="content_register">
                        <div class="enlace_abajo regist_top" style="cursor:pointer;"
                             onclick='javascript:registerLink("<?php echo DOMAIN_ROOT ?>");'>
                            No estas registrado ?
                            <br class="visible-xs">
                            <span>
                          Registrarme ahora
                        </span>
                        </div>
                    </div>
                </div>

                <form action="<?php echo DOMAIN_ROOT ?>pages/dologin.php?ac=login"
                      onkeypress="if (event.keyCode == 13) { javascript:sendForm(); }"
                      method="post" name="form1" id="form1" style="margin:0;padding:0;">
                    <div class="input-group form-group align-items-center">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consectetur dolorum earum eligendi fugiat.</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group required col-md-12 ">
                            <input style="text-align:center;" type="email" name="email" class="form-control inputHome" id="" required placeholder="Email">
                            <div class="invalid-feedback text-left"> Please enter a valid info </div>
                        </div>
                        <div class="form-group required col-md-12">
                            <input style="text-align:center;" type="password"  name="password" class="form-control inputHome" id="" required placeholder="Password">
                            <div class="invalid-feedback text-left"> Please enter a valid info </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <?php if(!empty($_GET['msg'])):?>
                            <div class="alert alert-danger" role="alert">
                                Datos invalidos por favor verifique sus credenciales*
                            </div>
                        <?php endif;?>
                        <div class="col py-3 text-center"
                             style="cursor:pointer; margin-top:0;" id="btnSignIn">

                                <span onclick="javascript:sendForm();" class="btn btn-primary">
                                  Ingresar
                                </span>


                            <span class="btn2 upper">
                                 <a style="text-decoration: none;" href="<?php echo DOMAIN_ROOT ?>index.php">Pagina principal </a>
                            </span>
                        </div>

                        <section class="pt-5 pb-4 px-2">
                            <div class="container-fluid">
                                <div class="row bg_color text-white no-gutters align-items-center">
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div  class="semi_b_txt mb-3">RÁPIDO Y FÁCIL:</div>
<!--                                            <div class="s10" >Você pode participar da pesquisa do seu celular usando um aplicativo que permite que você leia o código abaixo (Exemplos de aplicação: Código QR, QR Code Reader e do código de barras e QR Code Reader Free)</div>-->
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="p-5 text-right"> <img src="../assets/images/qr_code.svg" alt="HPE" class="img-fluid" width="350" /> </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>

                </form>

            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    <a href="<?php echo DOMAIN_ROOT ?>pages/ressetting_password.php">olvido contraseña?</a>
                </div>
            </div>
        </div>
    </div>
</section>


<footer id="sticky-footer" class="py-4 bg-dark text-white-50 footer">
    <div class="container text-center">
        <small>Copyright &copy; Your Website</small>
    </div>
        <div class="container-fluid">
            <a class="" href="mailto:iamputorraider09@gmail.com" target="_blank">Obtener Informacion</a>
        </div>

</footer>
</body>
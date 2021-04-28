<?php

use App\Core\dbConection;
error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT ^ E_DEPRECATED);
require_once __DIR__ . './config/parameters.php';
require_once __DIR__ . './src/Core/dbConection.php';

if($fromBackend){ //mejorar!!
    require __DIR__ . "../vendor/autoload.php";
}
//permisos para entrar a alguna aplicacion.
if($pathFrom && $namePath) require_once __DIR__ . './config/security.php';


dbConection::assignDBParameters($arrDB);

?>
<script>

    function goLogin(domainRoot)
    {
        window.location = domainRoot + 'pages/login.php';
    }

</script>

<script
        src="https://unpkg.com/mailgo@0.10.4/dist/mailgo.min.js"
        defer
></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="icon" type="image/x-icon" href="favicon.ico">


<link rel="stylesheet" type="text/css" href="<?=DOMAIN_ROOT ?>assets/css/styles.css" />
<!--<script src="--><?//=DOMAIN_ROOT ?><!--assets/js/jquery-3.5.1.min.js"></script>-->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


<script src="<?=DOMAIN_ROOT ?>assets/js/jquery-3.5.1.min.js"></script>
<script src="<?=DOMAIN_ROOT ?>assets/js/bootstrap-multiselect.js"></script>
<script src="<?=DOMAIN_ROOT ?>assets/js/bi_report.js"></script>
<script src="<?=DOMAIN_ROOT ?>assets/js/main.js"></script>
<script src="<?=DOMAIN_ROOT ?>assets/js/app.js"></script>
<script src="<?=DOMAIN_ROOT ?>assets/js/bootstrap-multiselect.js"></script>

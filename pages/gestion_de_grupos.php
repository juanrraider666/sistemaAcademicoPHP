<?php


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <?php

require __DIR__ . "./../vendor/autoload.php";

require_once '../base.php';

require_once '../pages/session_manager.class.php';
require_once '../pages/access.class.php';
require_once '../src/Core/session.php';
require_once '../pages/helpers.php';

    $controller = new \App\Controllers\GroupController();


    if(isset($_GET['create'])) {

        $params = [
         "name" =>  $_POST['name'],
         "code" =>  $_POST['code'],
         "program" => $_POST['program']
        ];

        $controller->createAction($params);

       header('location: gestion_de_grupos.php');exit();
    }

    $list = $controller->listAction();
    $programs = $controller->listProgram();


?>

</head>

<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
        </div>    <div class="app-header__content">
            <div class="app-header-left">
                <div class="search-wrapper">
                    <div class="input-holder">
                        <input type="text" class="search-input" placeholder="Type to search">
                        <button class="search-icon"><span></span></button>
                    </div>
                    <button class="close"></button>
                </div>
            </div>
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                        <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
                                        <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                    </a>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                        <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                        <div tabindex="-1" class="dropdown-divider"></div>
                                        <a type="button" href="<?php echo DOMAIN_ROOT . 'pages/logout.php' ?>" tabindex="0" class="dropdown-item">Logout</a>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                <div class="widget-heading">
                                    <?php if (!is_null($CORE_session) && !empty($CORE_session->read('s_id'))): ?>
                                    <?php echo ucfirst($CORE_session->read('s_complete_name')); ?>
                                    <?php endif;?>
                                </div>
                                <div class="widget-subheading">
                                    VP People Manager
                                </div>
                            </div>
                            <div class="widget-content-right header-user-info ml-3">
                                <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                    <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>        </div>
        </div>
    </div>        <div class="ui-theme-settings">
        <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
            <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
        </button>
        <div class="theme-settings__inner">
            <div class="scrollbar-container">
                <div class="theme-settings__options-wrapper">
                    <h3 class="themeoptions-heading">Layout Options
                    </h3>
                    <div class="p-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="switch has-switch switch-container-class" data-class="fixed-header">
                                                <div class="switch-animate switch-on">
                                                    <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Fixed Header
                                            </div>
                                            <div class="widget-subheading">Makes the header top fixed, always visible!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="switch has-switch switch-container-class" data-class="fixed-sidebar">
                                                <div class="switch-animate switch-on">
                                                    <input type="checkbox" checked data-toggle="toggle" data-onstyle="success">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Fixed Sidebar
                                            </div>
                                            <div class="widget-subheading">Makes the sidebar left fixed, always visible!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <div class="switch has-switch switch-container-class" data-class="fixed-footer">
                                                <div class="switch-animate switch-off">
                                                    <input type="checkbox" data-toggle="toggle" data-onstyle="success">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Fixed Footer
                                            </div>
                                            <div class="widget-subheading">Makes the app footer bottom fixed, always visible!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <h3 class="themeoptions-heading">
                        <div>
                            Header Options
                        </div>
                        <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-header-cs-class" data-class="">
                            Restore Default
                        </button>
                    </h3>
                    <div class="p-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h5 class="pb-2">Choose Color Scheme
                                </h5>
                                <div class="theme-settings-swatches">
                                    <div class="swatch-holder bg-primary switch-header-cs-class" data-class="bg-primary header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-secondary switch-header-cs-class" data-class="bg-secondary header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-success switch-header-cs-class" data-class="bg-success header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-info switch-header-cs-class" data-class="bg-info header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-warning switch-header-cs-class" data-class="bg-warning header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-danger switch-header-cs-class" data-class="bg-danger header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-light switch-header-cs-class" data-class="bg-light header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-dark switch-header-cs-class" data-class="bg-dark header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-focus switch-header-cs-class" data-class="bg-focus header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-alternate switch-header-cs-class" data-class="bg-alternate header-text-light">
                                    </div>
                                    <div class="divider">
                                    </div>
                                    <div class="swatch-holder bg-vicious-stance switch-header-cs-class" data-class="bg-vicious-stance header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-midnight-bloom switch-header-cs-class" data-class="bg-midnight-bloom header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-night-sky switch-header-cs-class" data-class="bg-night-sky header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-slick-carbon switch-header-cs-class" data-class="bg-slick-carbon header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-asteroid switch-header-cs-class" data-class="bg-asteroid header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-royal switch-header-cs-class" data-class="bg-royal header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-warm-flame switch-header-cs-class" data-class="bg-warm-flame header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-night-fade switch-header-cs-class" data-class="bg-night-fade header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-sunny-morning switch-header-cs-class" data-class="bg-sunny-morning header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-tempting-azure switch-header-cs-class" data-class="bg-tempting-azure header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-amy-crisp switch-header-cs-class" data-class="bg-amy-crisp header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-heavy-rain switch-header-cs-class" data-class="bg-heavy-rain header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-mean-fruit switch-header-cs-class" data-class="bg-mean-fruit header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-malibu-beach switch-header-cs-class" data-class="bg-malibu-beach header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-deep-blue switch-header-cs-class" data-class="bg-deep-blue header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-ripe-malin switch-header-cs-class" data-class="bg-ripe-malin header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-arielle-smile switch-header-cs-class" data-class="bg-arielle-smile header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-plum-plate switch-header-cs-class" data-class="bg-plum-plate header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-happy-fisher switch-header-cs-class" data-class="bg-happy-fisher header-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-happy-itmeo switch-header-cs-class" data-class="bg-happy-itmeo header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-mixed-hopes switch-header-cs-class" data-class="bg-mixed-hopes header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-strong-bliss switch-header-cs-class" data-class="bg-strong-bliss header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-grow-early switch-header-cs-class" data-class="bg-grow-early header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-love-kiss switch-header-cs-class" data-class="bg-love-kiss header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-premium-dark switch-header-cs-class" data-class="bg-premium-dark header-text-light">
                                    </div>
                                    <div class="swatch-holder bg-happy-green switch-header-cs-class" data-class="bg-happy-green header-text-light">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <h3 class="themeoptions-heading">
                        <div>Sidebar Options</div>
                        <button type="button" class="btn-pill btn-shadow btn-wide ml-auto btn btn-focus btn-sm switch-sidebar-cs-class" data-class="">
                            Restore Default
                        </button>
                    </h3>
                    <div class="p-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h5 class="pb-2">Choose Color Scheme
                                </h5>
                                <div class="theme-settings-swatches">
                                    <div class="swatch-holder bg-primary switch-sidebar-cs-class" data-class="bg-primary sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-secondary switch-sidebar-cs-class" data-class="bg-secondary sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-success switch-sidebar-cs-class" data-class="bg-success sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-info switch-sidebar-cs-class" data-class="bg-info sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-warning switch-sidebar-cs-class" data-class="bg-warning sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-danger switch-sidebar-cs-class" data-class="bg-danger sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-light switch-sidebar-cs-class" data-class="bg-light sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-dark switch-sidebar-cs-class" data-class="bg-dark sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-focus switch-sidebar-cs-class" data-class="bg-focus sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-alternate switch-sidebar-cs-class" data-class="bg-alternate sidebar-text-light">
                                    </div>
                                    <div class="divider">
                                    </div>
                                    <div class="swatch-holder bg-vicious-stance switch-sidebar-cs-class" data-class="bg-vicious-stance sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-midnight-bloom switch-sidebar-cs-class" data-class="bg-midnight-bloom sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-night-sky switch-sidebar-cs-class" data-class="bg-night-sky sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-slick-carbon switch-sidebar-cs-class" data-class="bg-slick-carbon sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-asteroid switch-sidebar-cs-class" data-class="bg-asteroid sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-royal switch-sidebar-cs-class" data-class="bg-royal sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-warm-flame switch-sidebar-cs-class" data-class="bg-warm-flame sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-night-fade switch-sidebar-cs-class" data-class="bg-night-fade sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-sunny-morning switch-sidebar-cs-class" data-class="bg-sunny-morning sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-tempting-azure switch-sidebar-cs-class" data-class="bg-tempting-azure sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-amy-crisp switch-sidebar-cs-class" data-class="bg-amy-crisp sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-heavy-rain switch-sidebar-cs-class" data-class="bg-heavy-rain sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-mean-fruit switch-sidebar-cs-class" data-class="bg-mean-fruit sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-malibu-beach switch-sidebar-cs-class" data-class="bg-malibu-beach sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-deep-blue switch-sidebar-cs-class" data-class="bg-deep-blue sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-ripe-malin switch-sidebar-cs-class" data-class="bg-ripe-malin sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-arielle-smile switch-sidebar-cs-class" data-class="bg-arielle-smile sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-plum-plate switch-sidebar-cs-class" data-class="bg-plum-plate sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-happy-fisher switch-sidebar-cs-class" data-class="bg-happy-fisher sidebar-text-dark">
                                    </div>
                                    <div class="swatch-holder bg-happy-itmeo switch-sidebar-cs-class" data-class="bg-happy-itmeo sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-mixed-hopes switch-sidebar-cs-class" data-class="bg-mixed-hopes sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-strong-bliss switch-sidebar-cs-class" data-class="bg-strong-bliss sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-grow-early switch-sidebar-cs-class" data-class="bg-grow-early sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-love-kiss switch-sidebar-cs-class" data-class="bg-love-kiss sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-premium-dark switch-sidebar-cs-class" data-class="bg-premium-dark sidebar-text-light">
                                    </div>
                                    <div class="swatch-holder bg-happy-green switch-sidebar-cs-class" data-class="bg-happy-green sidebar-text-light">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <h3 class="themeoptions-heading">
                        <div>Main Content Options</div>
                        <button type="button" class="btn-pill btn-shadow btn-wide ml-auto active btn btn-focus btn-sm">Restore Default
                        </button>
                    </h3>
                    <div class="p-3">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h5 class="pb-2">Page Section Tabs
                                </h5>
                                <div class="theme-settings-swatches">
                                    <div role="group" class="mt-2 btn-group">
                                        <button type="button" class="btn-wide btn-shadow btn-primary btn btn-secondary switch-theme-class" data-class="body-tabs-line">
                                            Line
                                        </button>
                                        <button type="button" class="btn-wide btn-shadow btn-primary active btn btn-secondary switch-theme-class" data-class="body-tabs-shadow">
                                            Shadow
                                        </button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>        <div class="app-main">
        <div class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>

            </div>
            <div class="scrollbar-sidebar">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu">


                        <li class="app-sidebar__heading">Forms</li>
                        <li>
                            <a href="gestion_academica.php">
                                <i class="metismenu-icon pe-7s-mouse">
                                </i>Gestion Academica
                            </a>
                        </li>
                        <li>
                            <a href="forms-layouts.html">
                                <i class="metismenu-icon pe-7s-eyedropper">
                                </i>Forms Layouts
                            </a>
                        </li>
                        <li>
                            <a href="forms-validation.html">
                                <i class="metismenu-icon pe-7s-pendrive">
                                </i>Forms Validation
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>    <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div class="page-title-icon">
                                <i class="pe-7s-car icon-gradient bg-mean-fruit">
                                </i>
                            </div>
                            <div>
                                Gestion Academica
                                <div class="page-title-subheading">Pagina para la gestion academica de las carreras
                                </div>
                            </div>
                        </div>


                        <div class="page-title-actions">
<!--                            <a href="gestion_de_grupos.php"  id="create_user_btn"  class="btn btn-primary btn-add btn-blue btn-blue " title="Agregar">Agregar</a>-->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                               Crear Grupo
                            </button>

                        </div>
                        </div>
                </div>
                <div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-header">Ingenieria Software
                            </div>
                            <div class="table-responsive">
                                <table class="group-list align-middle mb-0 table table-borderless table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Grupo</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($list as $group): ?>
                                    <tr>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">

                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading"><?php echo $group['name'] ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="badge badge-warning">Activa</div>
                                        </td>
                                        <td class="text-center">
                                        <a href="gestion_materias.php?group=<?php echo $group['id'] ?>&name=<?php echo $group['name'] ?>" type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Gestionar</a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="app-wrapper-footer">
                <div class="app-footer">
                    <div class="app-footer__inner">
                        <div class="app-footer-left">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        Footer Link 1
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        Footer Link 2
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="app-footer-right">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        Footer Link 3
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <div class="badge badge-success mr-1 ml-0">
                                            <small>NEW</small>
                                        </div>
                                        Footer Link 4
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
               <?php require_once('modal.php') ?>
            </div>

        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Creacion de grupo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate action="gestion_de_grupos.php?create=group" method="post">
                        <div class="form-row">
                            <div class="col-md-2 mb-3">
                                <label for="validationCustom01">Nombre</label>
                                <input type="text" name="code" class="form-control" id="validationCustom01" placeholder="Nombre"  required="">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">Codigo</label>
                                <input type="text" name="name" class="form-control" id="validationCustom02" placeholder="Codigo"  required="">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group content_checkbox">
                                    <label for="" class="white_txt">Company</label>
                                    <select multiple="multiple" name="program" class="form-control company_select mult_hpe_select " >
                                        <?php foreach($programs as $program) :?>
                                        <option value="<?php echo $program['id'] ?>"><?php echo $program['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript" src="../assets/js/main.js"></script>
    <script>
        (function ($, window, document) {

            $(function () {
                userAdmin = new LoyaltyUsersAdmin('gestion_de_groups.php');
                userAdmin.handleEvents();
            });

        })(jQuery, window, document);

        function LoyaltyUsersAdmin(pageUrl, selectors) {
            this.pageUrl = decodeURIComponent(pageUrl);
            console.log('asd')
            this.selectors = $.extend({
                table: 'table.group-list',
                team_table: 'table.teams-list',
                team_table_container: '.team-table-container',
                table_container: '.user-table-container',
                modal_show: '#modal-user-show',
                modal_show_content: '.user-show-content',
                modal_form: '#modal-user-form',
                modal_form_content: '.user-form-content',
                modal_confirm: '#modal-confirm',
                modal_confirm_content: '.confirm-content',
                modal_confirm_header: '.confirm-header',
                team_member_form_container: '.member-form-container',
                ajax_form_container: '.ajax-form-container',
                parent_container: '.parent-container',
                modal_submits: '.modal-footer :button',
                form_submits: 'form :submit',
                form_errors: '.form-errors',
                btn_confirm: '.modal-confirm',
                btn_show_ajax_element: '.element-ajax-show',
                btn_show: '.show-user',
                btn_edit: '.edit-user',
                btn_ajax_edit: '.ajax-edit-user',
                btn_create: '#create_user_btn',
                btn_create_team_member: '#create_team_member_btn',
                modal_preview: '#modal-preview',
                modal_preview_content: '.preview-content',
                modal_preview_header: '.preview-header',
                btn_preview: '.modal-preview',
                ajax_pagination_container: '.ajax-pagination',
                pagination_container: '.pagination-container',
                records_table: '.record-table',
                members_container: '#members-container',
                modal_account_confirm: '#modal-account-confirm',
                modal_account_confirm_content: '.account-confirm-content',
                btn_account_confirm: '.modal-account-confirm'
            }, selectors);
        }
        LoyaltyUsersAdmin.prototype.refreshUserList = function () {
            var self = this;
            console.log('enmtra')
            $.get(window.location.href).done($.proxy(function (html) {
                $(self.selectors.table).html($(html).find(self.selectors.table).html());
            }, this));
        };

        LoyaltyUsersAdmin.prototype.showUserInfo = function (url) {
            $(this.selectors.modal_show_content, this.selectors.modal_show).load(url, $.proxy(function () {
                $(this.selectors.modal_show).modal('show');
            }, this));
        };

        LoyaltyUsersAdmin.prototype.showUserForm = function (url) {
            console.log('asd')
            console.log(url)
            $(this.selectors.modal_form_content, this.selectors.modal_form).load(url, $.proxy(function () {
                $(this.selectors.modal_form).modal('show');
                $(document).trigger('loyalty.admin.user.form.show');
            }, this));
        };

        LoyaltyUsersAdmin.prototype.showMemberEditForm = function (element) {
            var target = $(element).data('target');
            var url = $(element).attr('href');
            var trElement = $("tr[data-member='user-" + target +"']");

            $(this.selectors.members_container).find('tr[data-member]').hide();

            trElement.find('td').load(url, $.proxy(function () {
                trElement.removeClass('hide');
                trElement.show();
                $(document).trigger('loyalty.admin.user.form.show');
            }, this));
        };

        LoyaltyUsersAdmin.prototype.showTeamMemberForm = function (url) {
            $(this.selectors.team_member_form_container).load(url, $.proxy(function () {
                $(this.selectors.team_member_form_container).show();
            }, this));
        };

        LoyaltyUsersAdmin.prototype.showHiddenAjaxTargetElement = function (clickElement,target) {
            console.log('showHiddenAjaxTargetElement')
            var url = $(clickElement).attr('href');
            $.post(url)
                .done(function (html) {
                    $(target).html(html);
                    if($(target).hasClass('hide')) $(target).removeClass('hide');
                    $(target).show();
                });
        };

        LoyaltyUsersAdmin.prototype.showConfirm = function (url, header) {
            $(this.selectors.modal_confirm_header, this.selectors.modal_confirm).html(header);
            $(this.selectors.modal_confirm_content, this.selectors.modal_confirm).load(url, $.proxy(function () {
                $(this.selectors.modal_confirm).modal('show');
            }, this));
        };

        LoyaltyUsersAdmin.prototype.showPreview = function (url, header) {
            $(this.selectors.modal_preview_header, this.selectors.modal_preview).html(header);
            $(this.selectors.modal_preview_content, this.selectors.modal_preview).load(url, $.proxy(function () {
                $(this.selectors.modal_preview).modal('show');
            }, this));
        };

        LoyaltyUsersAdmin.prototype.enableSubmits = function () {
            $([this.selectors.modal_submits, this.selectors.form_submits].join(',')).button('reset');
        };

        LoyaltyUsersAdmin.prototype.disableSubmits = function () {
            $([this.selectors.modal_submits, this.selectors.form_submits].join(',')).button('loading');
        };

        LoyaltyUsersAdmin.prototype.prepareModalForm = function () {
            var $modal = $(this.selectors.modal_form);
            $modal.find('form :input:first').focus();
            $modal.find(this.selectors.form_errors).html('');
        };

        LoyaltyUsersAdmin.prototype._onClickBtnToConfirm = function (e) {
            e.preventDefault();
            var $el = $(e.currentTarget);
            this.showConfirm(e.currentTarget.href, $el.data('header'));
        };

        LoyaltyUsersAdmin.prototype._onClickBtnToPreview = function (e) {
            e.preventDefault();
            var $el = $(e.currentTarget);
            this.showPreview(e.currentTarget.href, $el.data('header'));
        };

        LoyaltyUsersAdmin.prototype._onSubmitModalConfirm = function (e) {
            e.preventDefault();
            var $form = $(e.currentTarget);
            $.post($form.attr('action'), $form.serialize()).done(function () {
                $(document).trigger('refresh-user-list').trigger('ajax.close_modal');
            });
        };

        LoyaltyUsersAdmin.prototype._onSubmitAccountConfirmForm = function (e) {
            e.preventDefault();
            var $form = $(e.currentTarget);
            $.post(e.currentTarget.action, $form.serialize())
                .done(function (html) {
                    $(document).trigger('refresh-user-list').trigger('ajax.close_modal');
                }).fail(function (xhr) {
                if (xhr.status == 400) {
                    $form.replaceWith($(xhr.responseText).find('form'));
                }
            });
        };

        LoyaltyUsersAdmin.prototype.showAccountConfirmForm = function (url) {
            $(this.selectors.modal_account_confirm_content, this.selectors.modal_account_confirm).load(url, $.proxy(function () {
                $(this.selectors.modal_account_confirm).modal('show');
            }, this));
        };

        LoyaltyUsersAdmin.prototype._onClickShowAccountConfirmForm = function (e) {
            e.preventDefault();
            this.showAccountConfirmForm(e.currentTarget.href);
        };

        LoyaltyUsersAdmin.prototype._onSubmitModalPreview = function (e) {
            e.preventDefault();
            var $form = $(e.currentTarget);
            $.post($form.attr('action'), $form.serialize()).done(function () {
                $(document).trigger('refresh-user-list').trigger('ajax.close_modal');
            });
        };

        LoyaltyUsersAdmin.prototype._onCloseModalConfirm = function (e) {
            e.preventDefault();
            $(this.selectors.modal_confirm).modal('hide');
        };

        LoyaltyUsersAdmin.prototype._onCloseModalPreview = function (e) {
            e.preventDefault();
            $(this.selectors.modal_preview).modal('hide');
        };

        LoyaltyUsersAdmin.prototype._onCloseModalForm = function (e) {
            e.preventDefault();
            $(this.selectors.modal_form).modal('hide');
        };

        LoyaltyUsersAdmin.prototype._onClickShowInfo = function (e) {
            e.preventDefault();
            this.showUserForm(e.currentTarget.href);
        };

        LoyaltyUsersAdmin.prototype._onClickShowForm = function (e) {
            e.preventDefault();
            this.showUserForm(e.currentTarget.href);
        };

        LoyaltyUsersAdmin.prototype._onClickShowNonModalForm = function (e) {
            e.preventDefault();
            this.showUserForm(e.currentTarget.href);
        };

        LoyaltyUsersAdmin.prototype._onClickShowMemberEditForm = function (e) {
            e.preventDefault();
            this.showMemberEditForm(e.currentTarget);
        };

        LoyaltyUsersAdmin.prototype._onClickShowTargetAjaxElement = function (e) {
            e.preventDefault();
            this.showHiddenAjaxTargetElement($(e.currentTarget),$(e.currentTarget).data('target'));
        };

        LoyaltyUsersAdmin.prototype._onShownModalForm = function () {
            this.prepareModalForm();
        };


        LoyaltyUsersAdmin.prototype._onSubmitForm = function (e) {
            e.preventDefault();
            console.log('xhr')
            var $form = $(e.currentTarget);
            $.post(e.currentTarget.action, $form.serialize())
                .done(function (html) {
                    console.log($(document).trigger('user-edited'))
                    console.log($(document).trigger('user-edited'))
                    $(document).trigger('user-edited').trigger('ajax.close_modal');
                }).fail(function (xhr) {
                console.log(xhr)
                console.log(xhr.responseText)
                console.log($(xhr.responseText).find('form'))
                console.log($form)
                if (xhr.status == 400) {
                    $form.replaceWith($(xhr.responseText).find('form'));
                }
            });
        };

        LoyaltyUsersAdmin.prototype._onSubmitMemberForm = function (e) {
            e.preventDefault();
            var self = this;
            var $form = $(e.currentTarget);

            $.post(e.currentTarget.action, $form.serialize())
                .done(function (html) {
                    $($form)[0].reset();
                    $form.closest(self.selectors.parent_container).hide();
                    $(document).trigger('user-edited');
                }).fail(function (xhr) {
                if (xhr.status == 400) {
                    $($form).replaceWith($(xhr.responseText));
                }
            });
        };

        LoyaltyUsersAdmin.prototype.handleEvents = function () {

            $(document)
                .on('user-edited users-imported refresh-user-list', $.proxy(this.refreshUserList, this))
                .ajaxStart($.proxy(this.disableSubmits, this))
                .ajaxStop($.proxy(this.enableSubmits, this))
            ;

            $(this.selectors.table_container)
                .on('click', this.selectors.btn_confirm, $.proxy(this._onClickBtnToConfirm, this))
                .on('click', this.selectors.btn_show, $.proxy(this._onClickShowInfo, this))
                .on('click', this.selectors.btn_edit, $.proxy(this._onClickShowForm, this))
                .on('click', this.selectors.btn_ajax_edit, $.proxy(this._onClickShowMemberEditForm, this))
                .on('click', this.selectors.btn_preview, $.proxy(this._onClickBtnToPreview, this))
            ;

            $(this.selectors.team_table_container)
                .on('click', this.selectors.btn_confirm, $.proxy(this._onClickBtnToConfirm, this))
            ;

            $(this.selectors.btn_create)
                .on('click', $.proxy(this._onClickShowForm, this));

            $(this.selectors.btn_show_ajax_element)
                .on('click', $.proxy(this._onClickShowTargetAjaxElement, this));

            $(this.selectors.modal_confirm)
                .on('submit', 'form', $.proxy(this._onSubmitModalConfirm, this))
                .on('click', '.link-no, .btn-no', $.proxy(this._onCloseModalConfirm, this));

            $(this.selectors.modal_preview)
                .on('submit', 'form', $.proxy(this._onSubmitModalPreview, this))
                .on('click', '.link-no, .btn-no', $.proxy(this._onCloseModalPreview, this));

            $(this.selectors.ajax_form_container).on('submit', 'form', $.proxy(this._onSubmitMemberForm, this))
                .attr('novalidate', 'novalidate')
            ;

            $(this.selectors.modal_form)
                .on('click', '.btn-back', $.proxy(this._onCloseModalForm, this))
                .on('shown.bs.modal', $.proxy(this._onShownModalForm, this))
                .on('submit', 'form', $.proxy(this._onSubmitForm, this))
                .attr('novalidate', 'novalidate')
            ;

            $(this.selectors.table_container)
                .on('click', this.selectors.btn_account_confirm, $.proxy(this._onClickShowAccountConfirmForm, this))
            ;

            $(this.selectors.modal_account_confirm)
                .on('submit', 'form', $.proxy(this._onSubmitAccountConfirmForm, this))
                .on('click', '.link-no, btn-no', $.proxy(this._onCloseModalAccountConfirmForm, this))
            ;

        };
    </script>

</body>
</html>
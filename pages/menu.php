

<?php
//validamos que hagan un include desde de index.php
(!is_null($pathFile) ? $pathFile : $pathFile = '..' );

require_once  $pathFile . '/pages/session_manager.class.php';
require_once  $pathFile . '/pages/access.class.php';
require_once  $pathFile . '/src/Core/session.php';
require_once  $pathFile . '/pages/helpers.php';


if(!is_null($CORE_session)){
    $profileId = $CORE_session->read('s_profile');

}

function getData($p) {
    $menuKey = 'menu';

    $menuClass = new \App\Entity\Menu();
    $menu = $menuClass->getMenuData($p);

    $arrMenu = buildTree($menu);

    return buildHtmlTree($arrMenu);
}

function buildTree(array $elements, $parentId = 0): array
{
    $branch = [];

    foreach ($elements as $element) {
        if ($element['idParent'] == $parentId) {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['childs'] = $children;
            }
            $branch[$element['id']] = $element;
        }
    }

    return $branch;
}


function buildHtmlTree($arrMenu, $ulClass="nav navbar-nav")
{
    $html = "<ul class='$ulClass'>";
    foreach ($arrMenu as $element) {

        if (isset($element['childs'])) {
            $html .= "<li class=\"dropdown\"><a href='" .DOMAIN_ROOT. $element['link'] . "' class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\"><span>" . html_entity_decode($element['description']) . "</span><b class=\"caret\"></b></a>";
            $html .= buildHtmlTree($element['childs'], "dropdown-menu");
        } else {
            $html .= "<li><a class='nav-link' href='" . $element['link'] . "'><span>" . html_entity_decode($element['description']) . "</span></a>";
        }
        $html .= "</li>";
    }
    $html .= "</ul>";

    return $html;
}

?>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?=DOMAIN_ROOT?>index.php">
        <h1> Ultima y Nos Vamos</h1>
    </a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="<?=DOMAIN_ROOT?>pages/login.php">Login</a>
            </li>

            <?php if( !is_null($CORE_session) && (!empty($CORE_session->read('s_profile')))): ?>
                <?php echo getData($profileId); ?>

<!--                <a class="nav-link" href="--><?//=DOMAIN_ROOT?><!--pages/backend/edit_users.php">Backend</a>-->
            <?php else:?>
                <li class="carrito nav-item">
                    <a href="#" class='btn-carrito nav-link'>Carrito <img src="https://img.icons8.com/nolan/30/shopping-cart.png" /></a>

                    <div id="carrito-container">
                        <div id="tabla">
                        </div>
                    </div>
                </li>
            <?php endif;?>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="POST" action="index.php">
            <input class="form-control mr-sm-2" name="nombre" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-warning my-2 my-sm-0" type="submit">Search</button>
        </form>


        <?php if( !is_null($CORE_session) && !empty($CORE_session->read('s_id'))): ?>
        <a href="<?php echo DOMAIN_ROOT . 'pages/logout.php' ?>" class="logoffButton"> Logout </a>
        <a manual_cm_sp="" href="/account-login" data-auto-id="" class="text-white">
            Bienvenido
            <?php echo ucfirst($CORE_session->read('s_complete_name')); ?>
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                 width="30" height="30"
                 viewBox="0 0 172 172"
                 style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,17.2c-37.9948,0 -68.8,30.8052 -68.8,68.8c0,20.42213 8.95197,38.70699 23.07891,51.30886v-1.67969l0.79505,-1.33255c5.8824,-9.9072 28.13338,-19.62995 44.91484,-19.62995c16.79293,0 39.04937,9.71701 44.92604,19.62995l0.80625,1.34375v1.56771v0.10078c14.13267,-12.59613 23.07891,-30.88672 23.07891,-51.30886c0,-37.9948 -30.8052,-68.8 -68.8,-68.8zM86,51.6c12.64773,0 22.93333,10.2856 22.93333,22.93333v5.73333c0,12.64773 -10.2856,22.93333 -22.93333,22.93333c-12.64773,0 -22.93333,-10.2856 -22.93333,-22.93333v-5.73333c0,-12.64773 10.2856,-22.93333 22.93333,-22.93333zM86,63.06667c-6.32387,0 -11.46667,5.1428 -11.46667,11.46667v5.73333c0,6.32387 5.1428,11.46667 11.46667,11.46667c6.32387,0 11.46667,-5.1428 11.46667,-11.46667v-5.73333c0,-6.32387 -5.1428,-11.46667 -11.46667,-11.46667zM85.9888,126.13333c-13.30707,0 -29.61616,7.62452 -34.25443,12.93359l-0.0112,6.52839c10.0964,5.82507 21.77816,9.20469 34.27682,9.20469c12.49293,0 24.17469,-3.38536 34.27683,-9.20469c-0.00573,-2.0468 -0.01667,-4.21212 -0.0224,-6.52839c-4.63827,-5.30907 -20.95282,-12.93359 -34.26562,-12.93359z"></path></g></g></svg>
        </a>
    <?php endif; ?>
    </div>
</nav>
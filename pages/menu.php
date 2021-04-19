

<?php
//validamos que hagan un include desde de index.php
(!is_null($pathFile) || !empty($pathFile) ? $pathFile : $pathFile = '..' );

require_once  $pathFile . '/pages/session_manager.class.php';
require_once  $pathFile . '/pages/access.class.php';
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


function buildHtmlTree($arrMenu, $ulClass="nav navbar-nav navbar-right inline-edit-menu inline-edit-menu-root ui-sortable")
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

<div class="bg_darkBlue">
    <div class="container-fluid">
        <div class="text-xxs-right  overflow">
            {% set user = app.user %}
            <?php if( !is_null($CORE_session) && !empty($CORE_session->read('s_id'))): ?>
                {% if user.person.photo != '' %}
                <div class="top-user-info">
                            <span class="avatar va_m i_block">
                                <span style="background-image: url({{ asset('uploads/photo/'~user.person.photo) }});">
                                </span>
                            </span>
                    <span class="va_m">
                            <!---  Información del usuario logueado  --->
                                    <span class="top-user-name ">  Bienvenido
            <?php echo ucfirst($CORE_session->read('s_complete_name')); ?></span>
                                <span class="divider">|</span>
                                <a href="<?php echo DOMAIN_ROOT . 'pages/logout.php' ?>">Logout</a>
                            </span>
                </div>

            <?php endif; ?>

            <div id="balance_c__points" class="carousel vertical slide va_m desktop" data-interval="5000" data-ride="carousel">
                <!-- Controls -->
                <a class="up carousel-control" href="#balance_c__points" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="down carousel-control" href="#balance_c__points" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="bg_body bd_button--silver">
    <div class="top_menu">
        <div class="container-fluid">
            <div class="wrap_header">
                <div>
                    <div class="logo_site ">
                        <a href="{{ path('home') }}">
                            <img src="{% block src_app_logo %}{{ asset('images/theme/logo_comunidad_lenovo_min.png') }}{% endblock %}" alt="Logo_lenovo"
                                 class="partner ">
                        </a>
                    </div>
                </div>
                <div>
                    <div class="menu hidden-xxs hidden-xs hidden-sm">
                        <nav class="navbar menu-navbar">
                            <?php if( !is_null($CORE_session) && (!empty($CORE_session->read('s_profile')))): ?>
                                <?php echo getData($profileId); ?>
                            <?php endif;?>
                        </nav>
                    </div>
                </div>
                <div>
                    <div class="sidebar-toggle pull-right hidden-sm">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target=".sidebar-nav">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
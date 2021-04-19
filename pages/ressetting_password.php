<?php
require_once '../base.php';

require __DIR__ . "./../vendor/autoload.php";

var_dump($_GET);
if ($_GET['ac'] === 'resetPassword') {
    var_dump($_POST['email']);
    $security = new \App\Controllers\SecurityController();
    if ($security->resetPassword($_POST['email'])) {
        echo 'epaaaa';
    }
}

?>

<body>
<section class="pass_content">
    <div class="container-fluid">
        <div class="row pb-5">
            <div class="white_txt col-md-7 col-lg-6 col-xl-5 col-sm-7">
                <div class="title_section">Forgot password</div>
                <div class="subtitle_section">Reestablecer Contraseña</div>
            </div>
        </div>
        <form id="resetPasswordForm" action="ressetting_password.php?ac=resetPassword" role="form" autocomplete="off"
              class="form" method="post">
            <div class="row">
                <div class="col-md-7 col-sm-7 col-lg-6 col-xl-5">
                    <div class="form-group required ">
                        <label for="mail">Email</label>
                        <input type="email"  name="email" class="form-control" id="mail" required>
                        <div class="invalid-feedback"> Please enter a valid info </div>
                    </div>
                    <div class="row flex-row align-items-center py-3">
                        <div class="col-sm-6 py-3 text-center text-sm-left">
                            <a type="button" href="../login.php" class="btn btn-primary">Cancel</a>
                        </div>
                        <div class="col-sm-6 py-3 text-center text-sm-left">
                            <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
</body>

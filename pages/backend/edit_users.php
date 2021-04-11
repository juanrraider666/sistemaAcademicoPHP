<?php

$fromBackend = true;

//** Seguridad */
$pathFrom = 'pages/backend/edit_users.php';
$namePath = 'backend';
$pathFile = '../../';

require('../../base.php');

$userController = new \App\Controllers\Backend\AdminUsersController();
$applicationController = new \App\Controllers\ApplicationController();

$users = $userController->listUsers();

include '../../pages/menu.php';


?>


<div class="container-fluid hpe_container_fluid m_b30">
    <div class="row">
        <div class="graph_title_box">
            <div class="col-xs-6 nopadding">lISTA DE USUARIOS</div>
            <div class="col-xs-6">
                <div class="row">
                    <div class="col-xs-6 text-center vcenter">
                        <div class="pagination">
                            <a href="#" class="pager p_prev"></a>
                            <a>Pagina 1 de </a>
                            <a href="#" class="pager p_next"></a>
                        </div>
                    </div><!--
-->
                    <div class="col-xs-6 text-right vcenter">

                        <div class="s16"><?php echo count($users) ?> usuarios para busqueda</div>
                    </div>
                </div>
            </div>
        </div>


        <div class="table-responsive">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table_hpe table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th width="14%">Correo</th>
                    <th>Fecha de Registro</th>
                    <th width="16%">Numero celular</th>
                    <th width="16%">Status</th>
                    <th width="16%">Acción</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['first_name'] ?></td>
                        <td><?php echo $user['email'] ?></td>
                        <td><?php echo $user['registration_date'] ?></td>
                        <td><?php echo $user['mobile'] ?></td>
                        <?php $user['status_id'] ? $cheked = 'checked' : $cheked = ''; ?>
                        <td class="text-center">
                            <div class="custom-control custom-switch">
                            <input class="checkEnableUser"
                                   id="<?php echo $user['id'] ?>"
                                   value="<?php echo $user['status_id'] ?>"
                                        <?php echo $cheked ?>
                                    type="checkbox"  data-toggle="toggle">
                            </div>
                        <td>
                            <button class="btn btn-success btn-sm js-detail" data-id="<?php echo $user['id'] ?>">Editar
                            </button>
                        </td>
                        <!--                        <td><button class="btn btn-success btn-sm" data-id="1" data-toggle="modal" data-target="#exampleModal">Edit</button></td>-->
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>


        </div>


    </div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formEditUser" action="<?= DOMAIN_ROOT ?>pages/ajax_users.php" method="POST">
                    <input id="id" name="id" type="hidden"/>
                    <input id="email" name="email" type="email" class="modalTextInput form-control"
                           placeholder="Text Here"/>
                    <input id="mobile" name="mobile" type="number" class="modalTextInput form-control"
                           placeholder="Text Here"/>
                    <input id="password" name="password" type="password" class="modalTextInput form-control"
                           placeholder="Password"/>

                    <div class="modal-footer">
                        <input type="submit" class="saveEdit btn btn-primary" value="Guardar"/>
                    </div>

                </form>
                <!--                                    <div class="modal-footer">-->
                <!--                                        <button type="button" class="saveEdit btn btn-primary">Save changes</button>-->
                <!--                                    </div>-->
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function () {

        $('input[type="checkbox"]').change(function(event) {
                 const data = {
                     id: $(this).attr('id'),
                     status_id: $(this).val()
                 }

            var posting = $.post('/laUltimaYnosVamosPHP/pages/ajax_users.php', {
                enable_user: data
            });

            posting.done(function (data) {

                if (data.success === true) {
                    window.location.reload();
                }

            });

        });



        $("#formEditUser").submit(function (event) {
            // Stop form from submitting normally
            event.preventDefault();

            // Get some values from elements on the page:
            var $form = $(this),
                id = $form.find("input[name='id']").val(),
                email = $form.find("input[name='email']").val(),
                mobile = $form.find("input[name='mobile']").val(),
                password = $form.find("input[name='password']").val(),
                url = $form.attr("action");

            // Send the data using post
            var posting = $.post(url, {
                data_user: {
                    id: id,
                    email: email,
                    mobile: mobile,
                    password: password
                }
            });


            // Put the results in a div
            posting.done(function (data) {
                if (data.success === true) {
                    window.location.reload();
                }

                // var content = $( data ).find( "#content" );
                // $( "#result" ).empty().append( content );
            });
        });


        $('.js-detail').on('click', function () {
            var id = $(this).data('id');
            console.log("ID: " + id);
            $.ajax({
                type: 'GET',
                data: {
                    id: id
                },
                url: '/laUltimaYnosVamosPHP/pages/ajax_users.php',
                success: function (data) {
                    console.log(data.data)
                    var result = data.data;

                    $('#id').val(result.id);
                    $('#email').val(result.email);
                    $('#mobile').val(result.mobile);
                    // $('#password').val(result.password);
                    $('#exampleModal').modal('show');

                },
                error: function (data) {
                    alert("error");
                }
            });
        });
    });

    function ajax(val)
    {
        console.log(val)
        // $.ajax({
        //     type: 'POST',
        //     data: {
        //         status: val
        //     },
        //     url: '/laUltimaYnosVamosPHP/pages/ajax_users.php',
        //     success: function (data) {
        //         console.log(data.data)
        //         var result = data.data;
        //
        //         $('#id').val(result.id);
        //         $('#email').val(result.email);
        //         $('#mobile').val(result.mobile);
        //         // $('#password').val(result.password);
        //         $('#exampleModal').modal('show');
        //
        //     },
        //     error: function (data) {
        //         alert("error");
        //     }
        // });
   // });
    }

</script>
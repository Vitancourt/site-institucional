<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
$this->load->view("admin/admin_header");
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php
    $this->load->view("admin/admin_menu");
    $this->load->view("admin/admin_menu_header");
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            Usuários
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                <?php
                $this->load->view("admin/admin_user_navigation");
                ?>
                <!-- /.box-header -->
                <div class="box-body">
                <?php
                if ($this->session->flashdata('success')) {
                    ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa  fa-check-circle-o"></i> Concluído</h4>
                        <?=$this->session->flashdata('success');?>
                    </div>
                    <?php
                }
                ?>
                <?php
                if ($this->session->flashdata('error')) {
                    ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Erro</h4>
                        <?=$this->session->flashdata('error');?>
                    </div>
                    <?php
                }
                ?>
                <div class="col-md-12">
                    <!-- datatable-start -->
                    <table id="user-table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                        <th>Nome</th>
                        <th>Usuário</th>
                        <th>E-mail</th>
                        <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (!empty($array_user)) {
                            foreach ($array_user as $user) {
                                ?>
                                <tr>
                                <td>
                                    <?=$user->complete_name;?>
                                </td>
                                <td>
                                    <?=$user->username;?>
                                </td>
                                <td>
                                    <?=$user->email;?>
                                </td>
                                <td>
                                    <a href="<?=site_url("admin/user/put/".$user->id);?>"
                                    class="btn btn-block btn-info btn-flat">Editar</button>
                                    <a href="" class="btn btn-block btn-danger btn-flat" data-toggle="modal"
                                    data-target="#modal-danger" onclick="trocaId('<?=$user->id;?>')">Excluir</a>
                                </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </table>
                </div>
                </div>
                </div>
            </div>
        </div>
    </aside>
    <div class="modal modal-danger fade" id="modal-danger" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirme a operação</h4>
                </div>
                <?=form_open("admin/user/delete");?>
                <?=form_input(
                    array(
                        "type" => "hidden",
                        "name" => "id",
                        "id" => "user-id"
                    )
                );?>
                <div class="modal-body">
                <p>Excluir usuário</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                <?=form_submit(
                    array(
                        "value" => "Confirmar",
                        "type" => "submit",
                        "name" => "post",
                        "class" => "btn btn-outline",
                    )
                );
                ?>
                <?=form_close();?>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php
$this->load->view("admin/admin_footer");
?>
<script>
    $(function () {
        $('#user-table').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : false
        })
    })

    function trocaId(id) {
        $("#user-id").val(id);
    }
</script>
</body>
</html>
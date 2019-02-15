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
            Alterar comentário
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
                $this->load->view("admin/admin_comments_navigation");
                ?>
                <!-- /.box-header -->
                <?=form_open_multipart("admin/comments/put");?>
                <div class="box-body">
                    <?php
                    if (validation_errors()) {
                        ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Erro</h4>
                            <?=validation_errors();?>
                        </div>
                        <?php
                    }
                    ?>
                    <?=form_input(
                        array(
                            "id" => "id",
                            "name" => "id",
                            "type" => "hidden",
                            "value" => (!empty($comment[0]->id))?$comment[0]->id:set_value("id")
                        )
                    );?>
                    <div class="form-group">
                        <?=form_label("Comentários: (Obrigatório)", "comments");?>
                        <?=form_textarea(
                            array(
                                "id" => "comments",
                                "name" => "comments",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Comentário",
                                "required" => "true",
                                "autocomplete" => "off",
                                "value" => (!empty($comment[0]->comments))?$comment[0]->comments:set_value("comments")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Nome de quem realizou o comentário:", "name");?>
                        <?=form_input(
                            array(
                                "id" => "name",
                                "name" => "name",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Nome",
                                "required" => "false",
                                "autocomplete" => "off",
                                "value" => (!empty($comment[0]->name))?$comment[0]->name:set_value("name")
                            )
                        );?>
                    </div>
                    <div class="form-group col-md-12">
                        <?php
                        if (!empty($comment[0]->photo)) {
                            ?>
                            <img src="<?=base_url("repository/comments/".$comment[0]->photo);?>"
                            style="max-width: 360px; max-height: 240px;">
                            <?php
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Imagem: Insira somente se quiser alterar (Tamanho máximo 100kb, resolução 1024, 768)", "photo");?>
                        <?=form_upload(
                            array(
                                "id" => "photo",
                                "name" => "photo",
                                "type" => "file",
                                "class" => "form-control",
                                "accept" => "image/png, image/jpeg, image/jpg",
                                "value" => set_value("photo")
                            )
                        );?>
                    </div>
                    <?=form_submit(
                        array(
                            "value" => "Gravar",
                            "type" => "submit",
                            "name" => "post",
                            "class" => "btn btn-primary btn-block btn-flat",
                        )
                    );
                    ?>
                </div>
                <?=form_close();?>
            </div>
            </div>
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php
$this->load->view("admin/admin_footer");
?>
</body>
</html>
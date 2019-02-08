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
            Cadastrar banner
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
                $this->load->view("admin/admin_banner_navigation");
                ?>
                <!-- /.box-header -->
                <?=form_open_multipart("admin/banner/post");?>
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
                    <div class="form-group">
                        <?=form_label("Texto", "text");?>
                        <?=form_textarea(
                            array(
                                "id" => "text",
                                "name" => "text",
                                "type" => "text",
                                "class" => "form-control",
                                "autocomplete" => "off",
                                "rows" => "2",
                                "value" => set_value("text")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Imagem: (Tamanho máximo 1mb, resolução 1024, 768)", "image");?>
                        <?=form_upload(
                            array(
                                "id" => "image",
                                "name" => "image",
                                "type" => "file",
                                "class" => "form-control",
                                "required" => "true",
                                "accept" => "image/png, image/jpeg, image/jpg",
                                "value" => set_value("image")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Ordem:", "order");?>
                        <?=form_input(
                            array(
                                "id" => "order",
                                "name" => "order",
                                "type" => "number",
                                "class" => "form-control",
                                "placeholder" => "Ordem",
                                "required" => "false",
                                "autocomplete" => "off",
                                "value" => set_value("order")
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
<script>
    $(function () {
        CKEDITOR.replace('text')
    })
</script>
</body>
</html>
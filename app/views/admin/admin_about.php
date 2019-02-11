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
            Alterar sobre
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
                <!-- /.box-header -->
                <?=form_open_multipart("admin/about");?>
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
                                "value" => ($about[0]->text)?$about[0]->text:set_value("text")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <img style="max-width: 360px; max-heigth: 240px;"
                        src="<?=(!empty($about[0]->image))?base_url("repository/about/".$about[0]->image):"";?>">
                    </div>
                    <div class="form-group">
                        <?=form_label("Imagem: (Só inserir caso queira alterar)", "image");?>
                        <?=form_upload(
                            array(
                                "id" => "image",
                                "name" => "image",
                                "type" => "file",
                                "class" => "form-control",
                                "accept" => "image/png, image/jpeg, image/jpg",
                                "value" => set_value("image")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Legenda da imagem:", "caption");?>
                        <?=form_input(
                            array(
                                "id" => "caption",
                                "name" => "caption",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Legenda",
                                "required" => "false",
                                "autocomplete" => "off",
                                "value" => ($about[0]->caption)?$about[0]->caption:set_value("caption")
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
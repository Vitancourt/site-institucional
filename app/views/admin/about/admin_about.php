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
                $this->load->view("admin/about/admin_about_navigation");
                ?>
                <!-- /.box-header -->
                <?=form_open_multipart("admin/about");?>
                <div class="box-body">
                    <div class="form-group">
                        <?=form_label("Missão", "mission");?>
                        <?=form_textarea(
                            array(
                                "id" => "mission",
                                "name" => "mission",
                                "type" => "text",
                                "class" => "form-control",
                                "autocomplete" => "off",
                                "rows" => "2",
                                "value" => ($about[0]->mission)?$about[0]->mission:set_value("mission")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Visão", "vision");?>
                        <?=form_textarea(
                            array(
                                "id" => "vision",
                                "name" => "vision",
                                "type" => "text",
                                "class" => "form-control",
                                "autocomplete" => "off",
                                "rows" => "2",
                                "value" => ($about[0]->vision)?$about[0]->vision:set_value("vision")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Valores", "value");?>
                        <?=form_textarea(
                            array(
                                "id" => "value",
                                "name" => "value",
                                "type" => "text",
                                "class" => "form-control",
                                "autocomplete" => "off",
                                "rows" => "2",
                                "value" => ($about[0]->value)?$about[0]->value:set_value("value")
                            )
                        );?>
                    </div>
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
                        <?=form_label("Imagem: (Só inserir caso queira alterarg)", "image");?>
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
        CKEDITOR.replace('text');
        CKEDITOR.replace('mission');
        CKEDITOR.replace('vision');
        CKEDITOR.replace('value');
    })
</script>
</body>
</html>
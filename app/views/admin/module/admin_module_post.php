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
            Cadastrar Módulo
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
                $this->load->view("admin/module/admin_module_navigation");
                ?>
                <!-- /.box-header -->
                <?=form_open_multipart("admin/module/post");?>
                <div class="box-body">
                    <div class="form-group">
                        <?=form_label("Nome: (Obrigatório)", "name");?>
                        <?=form_input(
                            array(
                                "id" => "name",
                                "name" => "name",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Nome",
                                "maxlength" => "128",
                                "required" => "true",
                                "autocomplete" => "off",
                                "value" => set_value("name")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Descrição: (O texto exibido na página iniciar será resumido, já na página do módulo será completo.)", "description");?>
                        <?=form_input(
                            array(
                                "id" => "description",
                                "name" => "description",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Descrição",
                                "required" => "true",
                                "autocomplete" => "off",
                                "value" => set_value("description")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Ícone Font Awesome: (Obrigatório)", "icon");?>
                        <?=form_input(
                            array(
                                "id" => "name",
                                "name" => "icon",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Nome",
                                "maxlength" => "100",
                                "required" => "true",
                                "autocomplete" => "off",
                                "value" => set_value("icon")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Link: (Obrigatório. Não utilize espaços e acentos, separe com - ou _)", "link");?>
                        <?=form_input(
                            array(
                                "id" => "link",
                                "name" => "link",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Exemplo: gestao-estrategica",
                                "maxlength" => "256",
                                "required" => "true",
                                "autocomplete" => "off",
                                "value" => set_value("link")
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
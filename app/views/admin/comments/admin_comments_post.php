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
            Cadastrar comentário
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
                $this->load->view("admin/comments/admin_comments_navigation");
                ?>
                <!-- /.box-header -->
                <?=form_open_multipart("admin/comments/post");?>
                <div class="box-body">
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
                                "value" => set_value("comments")
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
                                "autocomplete" => "off",
                                "value" => set_value("name")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Imagem: (Tamanho máximo 100kb, resolução 1024, 768)", "photo");?>
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
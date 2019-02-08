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
            Configurações - Desenvolvedores
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
                $this->load->view("admin/admin_config_navigation");
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
                    <?=form_open("admin/config");?>
                    <div class="form-group">
                        <?=form_label("Title:", "title");?>
                        <?=form_input(
                            array(
                                "id" => "title",
                                "name" => "title",
                                "class" => "form-control",
                                "placeholder" => "Title",
                                "autocomplete" => "off",
                                "required" => "true",
                                "maxlength" => "256",
                                "value" => (isset($data[0]->title))?$data[0]->title:set_value("title")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Robots (noindex, nofollow, all)", "robots");?>
                        <?=form_input(
                            array(
                                "id" => "robots",
                                "name" => "robots",
                                "class" => "form-control",
                                "placeholder" => "Robots",
                                "autocomplete" => "off",
                                "required" => "true",
                                "maxlength" => "256",
                                "value" => (isset($data[0]->robots))?$data[0]->robots:set_value("robots")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Description", "description");?>
                        <?=form_textarea(
                            array(
                                "id" => "description",
                                "name" => "description",
                                "class" => "form-control",
                                "placeholder" => "Twitter",
                                "autocomplete" => "off",
                                "rows" => "2",
                                "required" => "true",
                                "maxlength" => "512",
                                "value" => (isset($data[0]->description))?$data[0]->description:set_value("description")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Autor", "author");?>
                        <?=form_input(
                            array(
                                "id" => "author",
                                "name" => "author",
                                "class" => "form-control",
                                "placeholder" => "Autor",
                                "autocomplete" => "off",
                                "maxlength" => "256",
                                "required" => "256",
                                "value" => (isset($data[0]->author))?$data[0]->author:set_value("author")
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
                    <?=form_close();?>
                    </div>
                </div>
                </div>
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
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
            Alterar Nível
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
                $this->load->view("admin/level/admin_level_navigation");
                $value_id = (!empty($level[0]->id))?$level[0]->id:set_value("id");
                ?>
                <!-- /.box-header -->
                <?=form_open_multipart("admin/level/put/".$value_id);?>
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
                            "name" => "id",
                            "type" => "hidden",
                            "value" => (!empty($level[0]->id))?$level[0]->id:set_value("id")
                        )
                    );?>
                    <div class="form-group">
                        <?=form_label("Nome: (Obrigatório)", "name");?>
                        <?=form_input(
                            array(
                                "id" => "name",
                                "name" => "name",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Nome",
                                "required" => "true",
                                "autocomplete" => "off",
                                "value" => (!empty($level[0]->name))?$level[0]->name:set_value("name")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Descrição: (256 caracteres)", "description");?>
                        <?=form_input(
                            array(
                                "id" => "description",
                                "name" => "description",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Descrição",
                                "maxlength" => "256",
                                "required" => "true",
                                "autocomplete" => "off",
                                "value" => (!empty($level[0]->description))?$level[0]->description:set_value("description")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Preço: (Obrigatório)", "price");?>
                        <?=form_input(
                            array(
                                "id" => "price",
                                "name" => "price",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "R$ 400,00",
                                "required" => "true",
                                "autocomplete" => "off",
                                "value" => (!empty($level[0]->price))?$level[0]->price:set_value("price")
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
                                "value" => (!empty($level[0]->link))?$class_level->reduceLink($level[0]->link):set_value("link")
                            )
                        );?>
                    </div>
                    <?=form_input(
                        array(
                            "id" => "imagehidden",
                            "name" => "imagehidden",
                            "type" => "hidden",
                            "autocomplete" => "off",
                            "value" => (!empty($level[0]->image))?$level[0]->image:set_value("imagehidden")
                        )
                    );?>
                    <?php
                    $value_image = (!empty($level[0]->image))?$level[0]->image:set_value("imagehidden");
                    ?>
                    <div class="form-group col-md-12">
                        <img src="<?=base_url("repository/level/".$value_image);?>"
                        alt="<?=(!empty($level[0]->name))?$level[0]->name:set_value("name");?>"
                        style="max-width:300px; max-height:240px;">
                    </div>
                    <div class="form-group">
                        <?=form_label("Imagem: (Insira somente para alterar. Tamanho máximo 1mb, resolução 1024, 768)", "image");?>
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
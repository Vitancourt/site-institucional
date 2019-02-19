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
            Alterar Membro
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
                $this->load->view("admin/admin_team_navigation");
                ?>
                <!-- /.box-header -->
                <?=form_open_multipart("admin/team/put");?>
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
                            "value" => (!empty($team[0]->id))?$team[0]->id:set_value("id")
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
                                "value" => (!empty($team[0]->name))?$team[0]->name:set_value("name")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Trabalha como:", "workas");?>
                        <?=form_input(
                            array(
                                "id" => "workas",
                                "name" => "workas",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Trabalha como",
                                "autocomplete" => "off",
                                "value" => (!empty($team[0]->workas))?$team[0]->workas:set_value("workas")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Ordem: (Obrigatório)", "order");?>
                        <?=form_input(
                            array(
                                "id" => "order",
                                "name" => "order",
                                "type" => "number",
                                "class" => "form-control",
                                "placeholder" => "Ordem",
                                "required" => "true",
                                "autocomplete" => "off",
                                "value" => (!empty($team[0]->ordem))?$team[0]->ordem:set_value("order")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Skype", "skype");?>
                        <?=form_input(
                            array(
                                "id" => "skype",
                                "name" => "skype",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Skype",
                                "autocomplete" => "off",
                                "value" => (!empty($team[0]->skype))?$team[0]->skype:set_value("skype")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Facebook", "facebook");?>
                        <?=form_input(
                            array(
                                "id" => "facebook",
                                "name" => "facebook",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Facebook",
                                "autocomplete" => "off",
                                "value" => (!empty($team[0]->facebook))?$team[0]->facebook:set_value("facebook")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Twitter", "twitter");?>
                        <?=form_input(
                            array(
                                "id" => "twitter",
                                "name" => "twitter",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Twitter",
                                "autocomplete" => "off",
                                "value" => (!empty($team[0]->twitter))?$team[0]->twitter:set_value("twitter")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Linkedin", "linkedin");?>
                        <?=form_input(
                            array(
                                "id" => "linkedin",
                                "name" => "linkedin",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Linkedin",
                                "autocomplete" => "off",
                                "value" => (!empty($team[0]->linkedin))?$team[0]->linkedin:set_value("linkedin")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <img style="max-width: 360px; max-height: 240px;"
                        src="<?=base_url("repository/team/".$team[0]->image);?>">
                    </div>
                    <div class="form-group">
                        <?=form_label("Imagem: Insira somente para alterar(Tamanho máximo 1mb, resolução 1024, 768)", "image");?>
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
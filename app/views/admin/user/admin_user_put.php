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
            Editar Usuário
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
                $this->load->view("admin/user/admin_user_navigation");
                ?>
                <!-- /.box-header -->
                <?=form_open(
                    "admin/user/put/",
                    "",
                    array('id' => (isset($user[0]->id))?$user[0]->id:set_value("id"))
                );?>
                <div class="box-body">
                    <div class="form-group">
                        <?=form_label("Primeiro nome: (Obrigatório)", "first_name");?>
                        <?=form_input(
                            array(
                                "id" => "first_name",
                                "name" => "first_name",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Primeiro nome",
                                "required" => "true",
                                "autocomplete" => "off",
                                "value" => (isset($user[0]->first_name))?$user[0]->first_name:set_value("first_name")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Segundo nome:", "middle_name");?>
                        <?=form_input(
                            array(
                                "id" => "middle_name",
                                "name" => "middle_name",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Segundo nome",
                                "required" => "false",
                                "autocomplete" => "off",
                                "value" => (isset($user[0]->middle_name))?$user[0]->middle_name:set_value("middle_name")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Último nome: (Obrigatório)", "last_name");?>
                        <?=form_input(
                            array(
                                "id" => "last_name",
                                "name" => "last_name",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Último nome",
                                "required" => "true",
                                "autocomplete" => "off",
                                "value" => (isset($user[0]->last_name))?$user[0]->last_name:set_value("last_name")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Nome de usuário: (Obrigatório, mínimo 6 caracteres)", "username");?>
                        <?=form_input(
                            array(
                                "id" => "username",
                                "name" => "username",
                                "type" => "text",
                                "class" => "form-control",
                                "placeholder" => "Nome de usuário",
                                "required" => "true",
                                "autocomplete" => "off",
                                "value" => (isset($user[0]->username))?$user[0]->username:set_value("username")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("E-mail: (Obrigatório)", "email");?>
                        <?=form_input(
                            array(
                                "id" => "email",
                                "name" => "email",
                                "type" => "email",
                                "class" => "form-control",
                                "placeholder" => "E-mail",
                                "required" => "true",
                                "autocomplete" => "off",
                                "value" => (isset($user[0]->email))?$user[0]->email:set_value("email")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Senha: (Obrigatório)", "password");?>
                        <?=form_password(
                            array(
                                "id" => "password",
                                "name" => "password",
                                "class" => "form-control",
                                "placeholder" => "Senha"
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Confirme a senha: (Obrigatório)", "password");?>
                        <?=form_password(
                            array(
                                "id" => "password_conf",
                                "name" => "password_conf",
                                "class" => "form-control",
                                "placeholder" => "Senha"
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
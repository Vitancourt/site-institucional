<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper("form")
?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
$this->load->view("admin/admin_header");
?>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <?=anchor('admin/login', '<b>ADMIN</b>', 'title="Página administrativa - Login"');?>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Insira seus dados para acessar a página administrativa</p>
        <?=form_open("admin/login");?>
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
        <?php
        if ($this->session->flashdata("error")) {
            ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Erro</h4>
                <?=$this->session->flashdata("error");?>
            </div>
            <?php
        }
        ?>
        <div class="form-group has-feedback">
            <?=form_label("E-mail:", "email");?>
            <?=form_input(
                array(
                    "id" => "email",
                    "type" => "email",
                    "name" => "email",
                    "class" => "form-control",
                    "placeholder" => "E-mail",
                    "autocomplete" => "off",
                    "required" => "true",
                    "value" => set_value("email")
                )
            );?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?=form_label("Senha:", "password");?>
            <?=form_password(
                array(
                    "id" => "password",
                    "name" => "password",
                    "class" => "form-control",
                    "placeholder" => "Senha",
                    "required" => "true"
                )
            );?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
            <?php
            /*
            <div class="checkbox icheck">
                <label>
                <input type="checkbox"> Remember Me
                </label>
            </div>
            */
            ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
            <?=form_submit(
                array(
                    "value" => "Logar",
                    "type" => "submit",
                    "class" => "btn btn-primary btn-block btn-flat",
                )
            );
            ?>
            </div>
            <!-- /.col -->
        </div>
        <?=form_close();?>
    </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php
$this->load->view("admin/admin_footer");
?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>

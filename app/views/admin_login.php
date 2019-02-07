<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper("form")
?>
<!DOCTYPE html>
<html>
<?php
$this->load->view("admin_header");
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
        <div class="form-group has-feedback">
            <?=form_input(
                array(
                    "type" => "email",
                    "class" => "form-control",
                    "placeholder" => "Email"
                )
            );?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <?=form_password(
                array(
                    "class" => "form-control",
                    "placeholder" => "Password"
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
$this->load->view("admin_footer");
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

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
            Empresa
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
                $this->load->view("admin/company/admin_company_navigation");
                ?>
                <!-- /.box-header -->
                <div class="box-body">
                <div class="col-md-12">
                    <?=form_open("admin/company");?>
                    <div class="form-group">
                        <?=form_label("Nome da empresa:", "name");?>
                        <?=form_input(
                            array(
                                "id" => "name",
                                "name" => "name",
                                "class" => "form-control",
                                "placeholder" => "Nome da empresa",
                                "autocomplete" => "off",
                                "rows" => "2",
                                "maxlength" => "128",
                                "value" => (isset($company[0]->name))?$company[0]->name:set_value("name")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("E-mail", "email");?>
                        <?=form_input(
                            array(
                                "id" => "email",
                                "type" => "email",
                                "name" => "email",
                                "class" => "form-control",
                                "placeholder" => "E-mail",
                                "autocomplete" => "off",
                                "maxlength" => "128",
                                "value" => (isset($company[0]->email))?$company[0]->email:set_value("email")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Twitter", "twitter");?>
                        <?=form_input(
                            array(
                                "id" => "twitter",
                                "name" => "twitter",
                                "class" => "form-control",
                                "placeholder" => "Twitter",
                                "autocomplete" => "off",
                                "maxlength" => "512",
                                "value" => (isset($company[0]->twitter))?$company[0]->twitter:set_value("twitter")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Facebook", "facebook");?>
                        <?=form_input(
                            array(
                                "id" => "facebook",
                                "name" => "facebook",
                                "class" => "form-control",
                                "placeholder" => "Facebook",
                                "autocomplete" => "off",
                                "maxlength" => "512",
                                "value" => (isset($company[0]->facebook))?$company[0]->facebook:set_value("facebook")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Instagram", "instagram");?>
                        <?=form_input(
                            array(
                                "id" => "intagram",
                                "name" => "instagram",
                                "class" => "form-control",
                                "placeholder" => "Instagram",
                                "autocomplete" => "off",
                                "maxlength" => "512",
                                "value" => (isset($company[0]->instagram))?$company[0]->instagram:set_value("instagram")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Telefone", "phone");?>
                        <?=form_textarea(
                            array(
                                "id" => "phone",
                                "name" => "phone",
                                "class" => "form-control",
                                "placeholder" => "Telefone",
                                "autocomplete" => "off",
                                "maxlength" => "512",
                                "wrap" => "hard",
                                "rows" => "2",
                                "value" => (isset($company[0]->phone))?$company[0]->phone:set_value("phone")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("País", "country");?>
                        <?=form_input(
                            array(
                                "id" => "country",
                                "name" => "country",
                                "class" => "form-control",
                                "placeholder" => "País",
                                "autocomplete" => "off",
                                "maxlength" => "128",
                                "value" => (isset($company[0]->country))?$company[0]->country:set_value("country")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Estado", "state");?>
                        <?=form_input(
                            array(
                                "id" => "state",
                                "name" => "state",
                                "class" => "form-control",
                                "placeholder" => "Estado",
                                "autocomplete" => "off",
                                "maxlength" => "128",
                                "value" => (isset($company[0]->state))?$company[0]->state:set_value("state")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Cidade", "city");?>
                        <?=form_input(
                            array(
                                "id" => "city",
                                "name" => "city",
                                "class" => "form-control",
                                "placeholder" => "Cidade",
                                "autocomplete" => "off",
                                "maxlength" => "128",
                                "value" => (isset($company[0]->city))?$company[0]->city:set_value("city")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("CEP", "zip");?>
                        <?=form_input(
                            array(
                                "id" => "zip",
                                "name" => "zip",
                                "class" => "form-control",
                                "placeholder" => "CEP",
                                "autocomplete" => "off",
                                "maxlength" => "128",
                                "value" => (isset($company[0]->zip))?$company[0]->zip:set_value("zip")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Endereço", "address");?>
                        <?=form_input(
                            array(
                                "id" => "address",
                                "name" => "address",
                                "class" => "form-control",
                                "placeholder" => "Endereço",
                                "autocomplete" => "off",
                                "maxlength" => "128",
                                "value" => (isset($company[0]->address))?$company[0]->address:set_value("address")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Número", "number");?>
                        <?=form_input(
                            array(
                                "id" => "number",
                                "name" => "number",
                                "class" => "form-control",
                                "placeholder" => "Número",
                                "autocomplete" => "off",
                                "maxlength" => "128",
                                "value" => (isset($company[0]->number))?$company[0]->number:set_value("number")
                            )
                        );?>
                    </div>
                    <div class="form-group">
                        <?=form_label("Complemento", "complement");?>
                        <?=form_input(
                            array(
                                "id" => "complement",
                                "name" => "complement",
                                "class" => "form-control",
                                "placeholder" => "Complemento",
                                "autocomplete" => "off",
                                "maxlength" => "128",
                                "value" => (isset($company[0]->complement))?$company[0]->complement:set_value("complement")
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="box-header with-border">
    Empresa
</div>
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
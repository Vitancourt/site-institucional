<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
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
          Usuários
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
              $this->load->view("admin/admin_user_navigation");
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
                <!-- datatable-start -->
                <table id="user-table" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Usuário</th>
                      <th>E-mail</th>
                      <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!empty($array_user)) {
                      foreach ($array_user as $user) {
                        ?>
                        <tr>
                          <td>
                            <?=$user->complete_name;?>
                          </td>
                          <td>
                            <?=$user->username;?>
                          </td>
                          <td>
                            <?=$user->email;?>
                          </td>
                          <td>
                            <?=$user->id;?>
                          </td>
                        </tr>
                        <?php
                      }
                    }
                    /*
                    <tr>
                      <td>Trident</td>
                      <td>Internet
                        Explorer 4.0
                      </td>
                      <td>Win 95+</td>
                      <td></td>
                    </tr>
                    */
                    ?>
                </table>
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
<script>
  $(function () {
    $('#user-table').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
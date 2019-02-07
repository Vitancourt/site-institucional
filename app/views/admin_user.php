<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<?php
$this->load->view("admin_header");
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php
  $this->load->view("admin_menu");
  $this->load->view("admin_menu_header");
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
            <div class="box-header with-border">
              <a href="" class="btn btn-block btn-primary btn-lg">Cadastrar</a>
              <a href="" class="btn btn-block btn-warning btn-lg">Listar</a>
            </div>
            <!-- /.box-header -->
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
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                  </tr>
              </table>
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
$this->load->view("admin_footer");
?>
<script>
  $(function () {
    $('#user-table').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
</body>
</html>
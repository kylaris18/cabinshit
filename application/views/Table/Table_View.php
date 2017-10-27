<?php
  $this->load->view('essentials/headerSrc.php');
  $this->load->view('essentials/headerMenu.php');
  $this->load->view('essentials/Sidebar.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Table Management
      <button data-toggle="modal" data-target="#modalAddTable" class="btn btn-info pull-right">Add New Table</button>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <table id="tbl_table" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Table Id</th>
                  <th>Table Name</th>
                  <th>Table Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($table_res as $aTable) {
                    if ($aTable['table_status'] === 'Available') {
                      $sLabelClass = 'label-info';
                    } else if ($aTable['table_status'] === 'Occupied') {
                      $sLabelClass = 'label-danger';
                    } else if ($aTable['table_status'] === 'Reserved') {
                      $sLabelClass = 'label-success';
                    }
                    ?>
                    <tr id="table_<?=$aTable['table_id']?>">
                      <td><?=$aTable['table_id']?></td>
                      <td><a href="#"><?=$aTable['table_name']?></a></td>
                      <td><span class="label <?=$sLabelClass?>"><?=$aTable['table_status']?></span>
                      </td>
                    </tr>
                    <?php
                  }
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Table Id</th>
                  <th>Table Name</th>
                  <th>Table Status</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
  <!-- Modal -->
  <!-- Modals -->
  <div class="modal fade" id="modalAddTable" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Add New Table</h4>
        </div>
        <div class="modal-body">
          <form role="form">
            <div class="box-body">
              <div class="form-group">
                <label for="addNewTableName">Table Name</label>
                <input type="text" class="form-control" id="addNewTableName" placeholder="Enter table Name">
              </div>
            </div>
            <!-- /.box-body -->
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" onclick="addNewTable();" class="btn btn-primary">Add</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- End Modal -->
</div>
<?php
  $this->load->view('essentials/footer.php');
  $this->load->view('essentials/footerSrc.php');
?>
<script>
  $(function () {
    oTable = $("#tbl_table").DataTable({
      ajax: '<?=base_url()?>contTable/getTableList'
    });
  });
  function addNewTable() {
    console.log($('#addNewTableName').val().trim());
    $.ajax({
      url: '<?=base_url()?>contTable/addNewTable',
      type: 'POST',
      dataType: 'json',
      data: {sNewTableName: $('#addNewTableName').val().trim()},
    })
    .done(function(oResult) {
      oTable.ajax.reload( null, false );
      // getTable();
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  }

  function getTable() {
    $.ajax({
      url: '<?=base_url()?>contTable/getTableList',
      type: 'GET',
      dataType: 'json',
    })
    .done(function(oResult) {
      var table = $('#tbl_table').DataTable( {
          ajax: '<?=base_url()?>contTable/getTableList'
      } );
      table.ajax.reload( null, false );
      // $("#tbl_table").DataTable().oResult.reload();
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  }
</script>
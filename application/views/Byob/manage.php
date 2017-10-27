<?php
$this->load->view('essentials/headerSrc.php');
$this->load->view('essentials/headerMenu.php');
$this->load->view('essentials/Sidebar.php');
?>
<div class="wrapper">

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><i class="fa fa-area-chart"></i>Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>BYOB ID</th>
                    <th>Name</th>
                    <th>Creator</th>
                    <th>Action</th>
                  </tr>
                  </thead>

                  <tbody>
                    <?php
                    foreach ($byob_res as $byob) {
                      ?>
                      <tr id="byob_<?=$byob['byob_id']?>">
                        <td><?=$byob['byob_id']?></td>
                        <td>
                          <a onclick="getByobIngrd(<?=$byob['byob_id']?>)" data-toggle="modal" data-target="#modalModifyIngrd" ><?=$byob['byob_name']?></a>
                        </td>
                        <td><?=$byob['byob_creator']?></td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-default" onclick="getByobDetails(<?=$byob['byob_id']?>);" data-toggle="modal" data-target="#modalModifyByob">Modify Byob</button>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Modify Byob Ingredients</a></li>
                              <li class="divider"></li>
                              <li><a href="#">Delete Byob</a></li>
                            </ul>
                          </div>
                        </td>     
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a> -->
              <!-- <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a> -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
</div>

<!-- Modals -->
<div class="modal fade" id="modalModifyByob" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Edit B.Y.O.B</h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="box-body">
            <input type="hidden" name="modifyByobId" id="modifyByobId">
            <div class="form-group">
              <label for="modifyByobName">BYOB Name</label>
              <input type="text" class="form-control" id="modifyByobName" placeholder="Enter BYOB Name">
            </div>
            <div class="form-group">
              <label for="modifyByobCreator">BYOB Creator</label>
              <input type="text" class="form-control" id="modifyByobCreator" placeholder="Enter BYOB Creator">
            </div>
          </div>
          <!-- /.box-body -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" onclick="modifyByob();" class="btn btn-primary">Edit</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modalModifyIngrd" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Default Modal</h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="box-body">
            <input type="hidden" name="modifyByobId" id="modifyByobId">
            <div class="form-group">
              <label for="modifyByobName">BYOB Name</label>
              <input type="text" class="form-control" id="modifyByobName" placeholder="Enter BYOB Name">
            </div>
            <div class="form-group">
              <label for="modifyByobCreator">BYOB Creator</label>
              <input type="text" class="form-control" id="modifyByobCreator" placeholder="Enter BYOB Creator">
            </div>
          </div>
          <!-- /.box-body -->
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" onclick="modifyByob();" class="btn btn-primary">Edit</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- End of Modals -->
<!-- ./wrapper -->
<?php
$this->load->view('essentials/footer.php');
$this->load->view('essentials/footerSrc.php');
?>
<script type="text/javascript">
  function getByobDetails(iByobId) {
    $.ajax({
      url: '<?=base_url();?>contByob/getByobDetails',
      type: 'POST',
      dataType: 'json',
      data: {iByobId: iByobId},
    })
    .done(function(oResult) {
      console.log("success");
      $('#modifyByobId').val(oResult.byob_id);
      $('#modifyByobName').val(oResult.byob_name);
      $('#modifyByobCreator').val(oResult.byob_creator);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  }

  function modifyByob() {
    var iByobId = $('#modifyByobId').val().trim();
    var sByobName = $('#modifyByobName').val().trim();
    var sByobCreator = $('#modifyByobCreator').val().trim();
    $.ajax({
      url: '<?=base_url();?>contByob/updateByob',
      type: 'POST',
      dataType: 'json',
      data: {iByobId: iByobId, sByobName: sByobName, sByobCreator: sByobCreator},
    })
    .done(function(oResult) {
      var $aDataCol = $('#byob_' + iByobId);
      $('#byob_' + iByobId + ' td:nth-child(2)').text(oResult.byob_name);
      $('#byob_' + iByobId + ' td:nth-child(3)').text(oResult.byob_creator);
      $('#modalModifyByob').modal('toggle');
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  }


</script>
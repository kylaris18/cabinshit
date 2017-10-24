<?php
$this->load->view('essentials/hasNoSessionChecker.php');
$this->load->view('essentials/headerSrc.php');
$this->load->view('essentials/headerMenu.php');
$this->load->view('essentials/Sidebar.php');
?>
<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Management <div class="pull-right"><button type="button" name="view_btn" id="view_btn" class="btn btn-info btn-sm" data-toggle="modal">View Orders</button></div>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="container box">


 <!-- Modal -->
<div tabindex="-1" class="modal fade" id="modal_users" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" aria-hidden="true" type="button" data-dismiss="modal">×</button>
        <h4 class="modal-title" id="myModalLabel">Inventory Update</h4>
      </div>
      <div class="modal-body">

      <!-- Modal Body -->
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Items</h3>
            </div>

            <div class="box-body">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-tag"></i> </span>
                <input type="text" class="form-control" placeholder="Item Code">
              </div>
              <br>

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-info"></i></span>
                <input type="text" class="form-control" placeholder="Item Name">
                
              </div>
              <br>
          
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-rub"></i></span>
                <input type="text" class="form-control" placeholder="Item Price">
                <span class="input-group-addon">.00</span>
              </div>
              <br>


              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                <input type="text" class="form-control" placeholder="Item Quantity">
              </div>
              <br>

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                <input type="textarea" class="form-control" placeholder="Item Quantity">
              </div>


              
            </div>
            <!-- /.box-body -->
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="button">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


      
          <div class="table-responsive">

          <table id="users" class="table table-bordered table-striped dataTable">
  <thead>
    <tr role="row">
      <!-- <th> Action </th> -->
      
        <th> ID </th>
      <th> Username </th>
      <th> User Type </th>
      
     </tr>
  </thead>

  <tbody>
      <?php foreach ($users_res as $r){ ?>
      <tr id="<?php echo $r['user_id']; ?>" > 
        <!-- <td> <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#md_rogueA">
          Update
        </button></td>
 -->      
        <td id="<?php echo $r['user_id']; ?>a" name="<?php echo $r['user_id']; ?>"> <?php echo $r['user_id']; ?> </td>
        <td id="<?php echo $r['user_id']; ?>b" name="<?php echo $r['user_name']; ?>"> <?php echo $r['user_name']; ?> </td>
        <td id="<?php echo $r['user_id']; ?>c" name="<?php echo $r['user_type']; ?>"> <?php echo $r['user_type']; ?> </td>
      </tr>
    <?php }?>
  </tbody>
  
  <tfoot>
    <tr>
      <!-- <th> Action </th> -->
        <th> ID </th>
      <th> Username </th>
      <th> User Type </th>
      
    </tr>
  </tfoot>
</table>
          </div>
      </div>    
    </section>

</div>
<?php
$this->load->view('essentials/footer.php');
$this->load->view('essentials/footerSrc.php');
?>
<script type="text/javascript">
    console.log('page scripts with base url at bottom of view.');
</script>
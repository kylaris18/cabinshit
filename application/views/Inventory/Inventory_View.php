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
        Inventory
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-cubes"></i>Inventory</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="container box">


 <!-- Modal -->
<div tabindex="-1" class="modal fade" id="modal_inventory" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
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

          <table id="inventory" class="table table-bordered table-striped dataTable">
  <thead>
    <tr role="row">
      <!-- <th> Action </th> -->
      
      <th> ID </th>
      <th> Item Name </th>
      <th> Item Price </th>
      <th> Item Quantity </th>
      <th> Item Description </th>

     </tr>
  </thead>

  <tbody>
      <?php foreach ($invent_res as $r){ ?>
      <tr id="<?php echo $r['item_code']; ?>" > 
        <!-- <td> <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#md_rogueA">
          Update
        </button></td>
 -->      
      
        <td id="<?php echo $r['item_code']; ?>a" name="<?php echo $r['item_code']; ?>"> <?php echo $r['item_code']; ?> </td>
        <td id="<?php echo $r['item_code']; ?>b" name="<?php echo $r['item_name']; ?>"> <?php echo $r['item_name']; ?> </td>
        <td id="<?php echo $r['item_code']; ?>c" name="<?php echo $r['item_price']; ?>"> <?php echo $r['item_price']; ?> </td>
        <td id="<?php echo $r['item_code']; ?>e" name="<?php echo $r['item_quantity']; ?>"> <?php echo $r['item_quantity']; ?> </td>
        <td id="<?php echo $r['item_code']; ?>f" name="<?php echo $r['item_description']; ?>"> <?php echo $r['item_description']; ?> </td>
       
      </tr>
    <?php }?>
  </tbody>
  <tfoot>
    <tr>
      <!-- <th> Action </th> -->
         
      <th> ID </th>
      <th> Item Name </th>
      <th> Item Price </th>
      <th> Item Quantity </th>
      <th> Item Description </th>
      
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
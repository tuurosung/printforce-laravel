<?php require_once '../navigation/header.php'; ?>
<?php require_once '../navigation/admin_nav.php'; ?>
<?php require_once '../serverscripts/Classes/Consumables.php'; ?>

<?php
    $c=new Consumable();
 ?>

<!--Main layout-->
<main class="pt-3 mx-lg-5">
  <div class="container-fluid mt-2">



    <div class="row mb-5">
      <div class="col-md-6">
          <h4 class="titles montserrat">Consumables</h4>
      </div>
      <div class="col-md-6 text-right">
        <button type="button" class="btn elegant-color-dark m-0 btn-rounded"  data-toggle="modal" data-target="#new_customer_modal"><i class="fas fa-plus mr-2"></i>
          Add Material
        </button>
      </div>
    </div>

    <div class="card my-5 <?php if($s->days_remaining_negpo >=0){ echo 'd-none'; } ?>">
      <div class="card-body">
        <blockquote class="blockquote bq-danger">
          <p class="bq-title montserrat font-weight-bold">Sorry, Subscription Expired</p>
          <p class="m-0">
            Your subscription has expired. Please renew your subscription to continue enjoying PrintForce.
          </p>
        </blockquote>

      </div>
    </div>

    <?php if($s->days_remaining_negpo <0){ die(); } ?>

    <!-- <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body pt-2 pb-2">
            Total Registered Customers
            <p class="m-0 montserrat font-weight-bold" style="font-size:18px"><?php //echo mycustomers(); ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body pt-2 pb-2">
            New Customers This Month
            <p class="m-0 montserrat font-weight-bold" style="font-size:18px"><?php //echo this_month_customers(); ?></p>
          </div>
        </div>
      </div>
    </div> -->

    <?php
        $check_for_for_first_time_users=mysqli_query($db,"SELECT * FROM consumable_items WHERE subscriber_id='".$active_subscriber."'") or die(mysqli_error($db));
        if(mysqli_num_rows($check_for_for_first_time_users)==0){
          $c->CreateItem('Test Item One','150.00','D0001');
          $c->CreateItem('Test Item Two','75.00','D0002');
        }
     ?>


    <div class="" id="data_holder">
      <table class="table datatables table-condensed">
        <thead class="">
          <tr>
            <th>#</th>
            <th>Description</th>
            <th>Unit Price</th>
            <th>Category</th>
            <th class="text-right">Stocked</th>
            <th class="text-right">Issued</th>
            <th class="text-right">Remaining</th>
            <th class="text-right">Value</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
              $i=1;
              $total_stock_value=0;
              $query=mysqli_query($db,"SELECT * FROM consumable_items WHERE subscriber_id='".$active_subscriber."' AND status='active'") or die(mysqli_error($db));

              while ($items=mysqli_fetch_array($query)) {
                $c->item_id=$items['item_id'];
                $c->ItemInfo();
                ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $items['item_name']; ?></td>
                  <td><?php echo $c->unit_price; ?></td>
                  <td><?php echo $c->category_name; ?></td>
                  <td class="text-right"><?php echo $c->total_added; ?></td>
                  <td class="text-right"><?php echo $c->total_issued; ?></td>
                  <td class="text-right"><?php echo $c->remaining_qty; ?></td>
                  <td class="text-right"><?php echo number_format($c->remaining_qty*$c->unit_price,2); ?></td>
                  <td class="text-right">
                    <div class="dropdown open">
                      <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Option
                      </button>
                      <div class="dropdown-menu b-0 p-0" aria-labelledby="dropdownMenu1">
                        <ul class="list-group">
                          <li class="list-group-item edit" id="<?php echo $items['item_id']; ?>">Edit</li>
                          <a class="list-group-item" href="store_room.php?item_id=<?php echo $items['item_id']; ?>">Portal</a>
                          <li class="list-group-item delete" id="<?php echo $items['item_id']; ?>">Delete</li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php
                $total_stock_value+=$c->remaining_qty*$c->unit_price;
              }
           ?>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-right font-weight-bold"><?php echo number_format($total_stock_value,2); ?></td>
                <td></td>
              </tr>
        </tbody>
      </table>
    </div>






    <div class="modal fade" id="new_customer_modal">
      <div class="modal-dialog modal-side modal-top-right" role="document">
        <div class="modal-content">
          <form id="new_item_frm" autocomplete="off">
          <div class="modal-body">
              <h6 class="font-weight-bold">New Item</h6>
              <hr class="hr">

              <div class="form-group">
                <label for="">Item Name</label>
                <input type="text" class="form-control" name="item_name" id="item_name" value="" required placeholder="Eg.  4ft SAV Roll">
              </div>

              <div class="form-group">
                <label for="">Unit Cost</label>
                <input type="text" class="form-control" name="unit_price" id="unit_price" value="" required>
              </div>

              <div class="form-group">
                <label for="">Category</label>
                <select class="custom-select browser-default" name="category_id" id="category_id">
                  <?php
                    $select_category=mysqli_query($db,"SELECT * FROM consumable_categories WHERE subscriber_id='default' AND status='active'") or die(mysqli_error($db));
                    while ($categories=mysqli_fetch_array($select_category)) {
                      ?>
                      <option value="<?php echo $categories['category_id']; ?>"><?php echo $categories['category_name']; ?></option>
                      <?php
                    }
                   ?>

                  <?php
                    $select_category=mysqli_query($db,"SELECT * FROM consumable_categories WHERE subscriber_id='".$active_subscriber."' AND status='active'") or die(mysqli_error($db));
                    while ($categories=mysqli_fetch_array($select_category)) {
                      ?>
                      <option value="<?php echo $categories['category_id']; ?>"><?php echo $categories['category_name']; ?></option>
                      <?php
                    }
                   ?>

                </select>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-black">Save Item</button>
          </div>
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="" id="modal_holder">

    </div>
    <?php require_once ('../navigation/admin_footer.php'); ?>
    <script type="text/javascript">
        $('#new_item_frm').on('submit', function(event) {
          event.preventDefault();
          $.ajax({
            url: '../serverscripts/admin/Consumables/new_item_frm.php',
            type: 'GET',
            data:$('#new_item_frm').serialize(),
            success:function(msg){
                if(msg==='save_successful'){
                  bootbox.alert("Consumable item added successfully",function(){
                    window.location.reload()
                  })
                }
                else {
                  bootbox.alert(msg)
                }
            }
          })
        });

        $('.table tbody').on('click', '.edit', function(event) {
          event.preventDefault();
          var item_id=$(this).attr('ID')
          $.get('../serverscripts/admin/Consumables/edit_item_modal.php?item_id='+item_id,function(msg){
            $('#modal_holder').html(msg)
            $('#edit_item_modal').modal('show')


            $('#edit_item_frm').on('submit', function(event) {
              event.preventDefault();
              $.ajax({
                url: '../serverscripts/admin/Consumables/edit_item_frm.php',
                type: 'GET',
                data:$('#edit_item_frm').serialize(),
                success:function(msg){
                    if(msg==='update_successful'){
                      bootbox.alert("Item info updated successfully",function(){
                        window.location.reload()
                      })
                    }
                    else {
                      bootbox.alert(msg)
                    }
                }
              })
            });
          })
        });

        $('.table tbody').on('click', '.delete', function(event) {
          event.preventDefault();
          var item_id=$(this).attr('ID')
          bootbox.confirm('Do you want to remove this item from inventory',function(r){
            if(r===true){
              $.get('../serverscripts/admin/Consumables/delete_item.php?item_id='+item_id,function(msg){
                if(msg==='delete_successful'){
                  bootbox.alert("Item deleted successfully",function(){
                    window.location.reload()
                  })
                }else {
                  bootbox.alert(msg)
                }
              })
            }
          })
        });
    </script>
</body>
</html>

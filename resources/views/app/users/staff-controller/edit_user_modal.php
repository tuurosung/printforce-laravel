<?php
  require_once '../../dbcon.php';
  require_once '../../Classes/Users.php';

  $user_id=clean_string($_GET['user_id']);
  $u=new User($q->db, $q->mysqli);

  $u->user_id=$user_id;
  $u->UserInfo();
 ?>



<div class="modal fade" id="edit_user_modal">
  <div class="modal-dialog modal-side modal-top-right" role="document">
    <div class="modal-content">

      <form id="edit_user_frm" autocomplete="off">
      <div class="modal-body">
        <h6 class="font-weight-bold montserrat">Edit User Info</h6>
        <hr class="hr">

        <input type="text" class="form-control d-none" name="user_id" id="user_id" value="<?php echo $user_id; ?>" required>

        <div class="form-group">
          <label for="">Full Name</label>
          <input type="text" class="form-control" name="full_name" id="full_name" value="<?php echo $u->full_name; ?>" required>
        </div>

        <div class="form-group">
          <label for="">Phone Number</label>
          <input type="text" class="form-control" name="phone_number" id="phone_number"  value="<?php echo $u->phone_number; ?>" required>
        </div>

        <div class="form-group">
          <label for="">Access Level</label>
          <select class="browser-default custom-select" name="access_level" id="access_level" >
            <option value="administrator" <?php if($u->access_level=='administrator'){ echo 'selected'; } ?>>Administrator</option>
            <option value="reception" <?php  if($u->access_level=='reception'){ echo 'selected'; } ?>>Reception</option>
          </select>
        </div>

        <div class="form-group">
          <label for="">Username</label>
          <input type="text" class="form-control" name="username" id="username"  value="<?php echo $u->username; ?>" required>
        </div>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-black">Update User</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

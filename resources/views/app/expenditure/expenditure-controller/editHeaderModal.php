<?php
require_once '../../Classes/Expenditure.php';
require_once '../../Classes/Seagate.php';

$seagate = new SeaGate();
$expenditure = new Expenditure();

$header_id = $seagate->Clean($_GET['header_id']);

$expenditure->header_id = $header_id;

$info = $expenditure->HeaderInfo();
?>


<!-- Modal -->
<div class="modal fade" id="editHeaderModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Header</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editHeaderFrm" autocomplete="off">
                <div class="modal-body">

                    <div class="form-group d-none">
                        <label for="" class="label">Header ID</label>
                        <input type="text" class="form-control" name="header_id" id="header_id" value="<?php echo $info['header_id']; ?> " required readonly>
                    </div>

                    <div class="form-group">
                        <label for="" class="label">Header Name</label>
                        <input type="text" class="form-control" name="header_name" id="header_name" value="<?php echo $info['header_name']; ?> " required>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-black"><i class="fas fa-check mr-3  "></i> Update Header</button>
                </div>
            </form>
        </div>
    </div>
</div>
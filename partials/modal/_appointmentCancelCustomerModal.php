<?php
echo'<div class="modal" id="appointmentCancelCustomerModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="mb-3">
                       <h4>Are You sure you want to delete that appoinment?</h4>
                       <p>Click <strong>OK</strong> for delete the appoinment.<br> 
                       Click <strong>Cancel</strong> for cancel the request.</p>
                    </div>
                    <button onclick="deletefun(apointment_no='.$apointment_no.')"  type="" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>';
    ?>
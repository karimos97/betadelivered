<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Delete  Order</h4>
        </div>
        <form action="`"  method="delete" >
            <input type="hidden" name="order_id">
        <div class="modal-body">
          <div class="alert alert-danger" role="alert">Are you sure you want to delete this order?</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger btn-confirm-delete" data-ng-click="delete order">Delete</button>
        </div>
    </form>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade" id="createOrderModalCenter" tabindex="-1" role="dialog" aria-labelledby="createOrderModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createOrderModalCenterTitle">Exchange</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="store_name" class="col-sm-4 col-form-label">store name</label>
                    <div class="col-sm-8">
                        <input type="text" id="order_store_name" class="form-control" readonly>
                        <input type="hidden" id="order_user_id" value="{{ auth()->id() }}">
                        <input type="hidden" id="order_store_id">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="currency" class="col-sm-4 col-form-label">currency</label>
                    <div class="col-sm-8">
                        <input type="text" id="order_currency_name" class="form-control" readonly>
                        <input type="hidden" id="order_currency_id">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="amount" class="col-sm-4 col-form-labrl">amount</label>
                    <div class="col-sm-8">
                        <input type="text" id="order_amount" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" onclick="addOrder()" data-dismiss="modal">Exchange</button>
            </div>
        </div>
    </div>
</div>
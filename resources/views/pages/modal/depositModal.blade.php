<!-- Modal -->
<div class="modal fade" id="depositModalCenter" tabindex="-1" role="dialog" aria-labelledby="deposittModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deposittModalCenterTitle">Deposit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="amount" class="col-sm-2 col-form-label">amount</label>
                    <div class="col-sm-8">
                        <input type="text" id="deposit_amount" class="form-control" placeholder="10">
                        <input type="hidden" id="wallet_id">
                    </div>
                    <label for="USD" class="col-sm-2 col-form-label">USD</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="deposit()" data-dismiss="modal">Deposit</button>
            </div>
        </div>
    </div>
</div>
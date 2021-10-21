<!-- Modal -->
<div class="modal fade" id="addWalletModalCenter" tabindex="-1" role="dialog" aria-labelledby="addWalletModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addWalletModalCenterTitle">Add Wallet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="currency" class="col-sm-2 col-form-label">currency</label>
                    <div class="col-sm-8">
                        <select id="a_currency" class="form-control">
                            @foreach($currency as $result)
                            <option value="{{ $result['id'] }}">{{ $result['currency_name'] }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" id="a_user_id" value="{{ auth()->id() }}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addWallet()" data-dismiss="modal">Add</button>
            </div>
        </div>
    </div>
</div>
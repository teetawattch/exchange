<!-- Modal -->
<div class="modal fade" id="createStoreModalCenter" tabindex="-1" role="dialog" aria-labelledby="createStoreModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createStoreModalCenterTitle">Create store</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="store_name" class="col-sm-4 col-form-label">store name</label>
                    <div class="col-sm-6">
                        <input type="text" id="store_name" class="form-control" placeholder="store name">
                        <input type="hidden" id="user_id" value="{{ auth()->id() }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price_per_unit" class="col-sm-4 col-form-label">price per unit</label>
                    <div class="col-sm-6">
                        <input type="text" id="price_per_unit" class="form-control" placeholder="1000">
                    </div>
                    <div class="col-sm-2">
                         <button class="btn" onclick="getPrice()"><i class="fas fa-sync-alt"></i> market</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="currency" class="col-sm-4 col-form-label">currency</label>
                    <div class="col-sm-6">
                        <select id="currency_id" class="form-control">
                            @foreach($currency as $result)
                            <option value="{{ $result['id'] }}">{{ $result['currency_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="amount" class="col-sm-4 col-form-label">amount</label>
                    <div class="col-sm-6">
                        <input type="text" id="amount" class="form-control" placeholder="100">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addStore()" data-dismiss="modal">Add</button>
            </div>
        </div>
    </div>
</div>
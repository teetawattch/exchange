@extends('layouts.app')

@section('content')
<div class="container mr-12">
    <div class="row justify-content-center">
        <div class="col-12 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>Market</h3>
                </div>
                <div class="card-body p-5 text-center">
                    <button class="btn btn-primary mb-4 float-right" data-toggle="modal" data-target="#createStoreModalCenter" >Create store</button>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">store id</th>
                                <th scope="col">store name</th>
                                <th scope="col">currency</th>
                                <th scope="col">amount</th>
                                <th scope="col">price</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($store as $resultStore)
                            <tr>
                                <td>{{ $resultStore['id'] }}</td>
                                <td>{{ $resultStore['store_name'] }}</td>
                                <td>{{ $resultStore['currency_name'] }}</td>
                                <td>{{ $resultStore['amount'] }}</td>
                                <td>{{ $resultStore['price_per_unit'] }}</td>
                                @if(auth()->id() == $resultStore['user_id'])
                                <td><button class="btn btn-warning" data-toggle="modal" data-target="#createOrderModalCenter" value="{{ $resultStore['id'] }}" onclick="getStore(this)" disabled><i class="fas fa-exchange-alt"></i> exchange</button></td>
                                @else
                                <td><button class="btn btn-warning" data-toggle="modal" data-target="#createOrderModalCenter" value="{{ $resultStore['id'] }}" onclick="getStore(this)"><i class="fas fa-exchange-alt"></i> exchange</button></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@csrf
@include('pages.modal.createStoreModal')
@include('pages.modal.createOrderModal')
@endsection

<script>
    function addStore(){
        var _token = document.getElementsByName('_token')[0].value
        try {
            $.ajax({
                url: "{{ route('addStore') }}",
                method: 'post',
                data: {
                    store_name: document.getElementById('store_name').value,
                    user_id: document.getElementById('user_id').value,
                    price_per_unit: document.getElementById('price_per_unit').value,
                    currency_id: document.getElementById('currency_id').value,
                    amount: document.getElementById('amount').value,
                    _token: _token
                },
                success: (res) => {
                    // console.log(res);
                    location.reload()
                }
            })
        } catch (error) {
            console.log(error);
        }
    }
    function getPrice(){
        var currency_id = document.getElementById('currency_id').value
        try {
            $.ajax({
                url: "{{ route('getPrice', '') }}" + '/' + currency_id,
                method: 'get',
                success: (res) => {
                    // console.log(res);
                    document.getElementById('price_per_unit').value = res.data[0].currency_price
                }
            })
        } catch (error) {
            console.log(error);
        }
    }
    function getStore(element){
        var id = element.value
        console.log(id);
        try {
            $.ajax({
                url: "{{ route('getStore', '') }}" + '/' + id,
                method: 'get',
                success: (res) => {
                    console.log(res);
                    document.getElementById('order_store_name').value =  res.data[0].store_name
                    document.getElementById('order_currency_name').value =  res.data[0].currency_name
                    document.getElementById('order_currency_id').value =  res.data[0].digital_currency_id
                    document.getElementById('order_store_id').value =  res.data[0].id
                }
            })
        } catch (error) {
            console.log(error);
        }
    }
    function addOrder(){
        var _token = document.getElementsByName('_token')[0].value
        try {
            $.ajax({
                url: "{{ route('addOrder') }}",
                method: 'post',
                data: {
                    amount: document.getElementById('order_amount').value,
                    user_id: document.getElementById('order_user_id').value,
                    digital_currency_id: document.getElementById('order_currency_id').value,
                    store_id: document.getElementById('order_store_id').value,
                    _token: _token
                },
                success: (res) => {
                    // console.log(res);
                    location.reload()
                }
            })
        } catch (error) {
            console.log(error);
        }
    }
</script>
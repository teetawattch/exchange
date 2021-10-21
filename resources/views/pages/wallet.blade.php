@extends('layouts.app')

@section('content')
<div class="container mr-12">
    <div class="row justify-content-center">
        <div class="col-12 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>My Wallet</h3>
                </div>
                <div class="card-body p-5 text-center">
                    @if($count_row >= 4)
                    <button class="btn btn-primary mb-4 float-right" data-toggle="modal" data-target="#addWalletModalCenter" disabled>Create Wallet</button>
                    @else
                    <button class="btn btn-primary mb-4 float-right" data-toggle="modal" data-target="#addWalletModalCenter">Create Wallet</button>
                    @endif
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">Currency name</th>
                                <th scope="col">Wallet address</th>
                                <th scope="col">Total amount</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($wallet as $resultWallet)
                            <tr>
                                <td> {{ $resultWallet['currency_name'] }} </td>
                                <td> {{ $resultWallet['address'] }} </td>
                                <td> {{ $resultWallet['total_amount'] }} </td>
                                <th> <button class="btn btn-danger col mb-2" data-toggle="modal" data-target="#depositModalCenter" value="{{ $resultWallet['id'] }}" onclick="getWalletData(this)"><i class="fas fa-money-bill-alt"></i> Deposit</button> <button class="btn btn-success col mb-2"><i class="fas fa-hand-holding-usd"></i> Withdraw</button> </th>
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
@include('pages.modal.addWalletModal')
@include('pages.modal.depositModal')
@endsection

<script>
    function addWallet() {
        var _token = document.getElementsByName('_token')[0].value
        try {
            $.ajax({
                url: "{{ route('addWallet') }}",
                method: 'POST',
                data: {
                    currency_id: document.getElementById('a_currency').value,
                    user_id: document.getElementById('a_user_id').value,
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
    function getWalletData(element){
        var id = element.value
        try {
            $.ajax({
                url: "{{ route('getWalletById', '')}}" + "/" + id,
                method:'get',
                success: (res) => {
                    // console.log(res);
                    document.getElementById('wallet_id').value = res.data[0].id
                }
            })
        } catch (error) {
            console.log(error);
        }
    }
    function deposit(){
        var _token = document.getElementsByName('_token')[0].value
        try {
            $.ajax({
                url: "{{ route('deposit') }}",
                method: 'post',
                data: {
                    wallet_id: document.getElementById('wallet_id').value,
                    amount: document.getElementById('deposit_amount').value,
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
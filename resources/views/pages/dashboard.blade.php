@extends('layouts.app')

@section('content')
<div class="container mr-12">
    <div class="row justify-content-center">
        <div class="col-6 mb-5">
            <div class="card">
                <div class="card-header"> <span id="btc_name"></span> </div>
                <div class="card-body p-5 text-center">
                    <span id="btc_price"></span> USD
                    <input type="hidden" id="btc_name_value">
                    <input type="hidden" id="btc_price_value">
                </div>
            </div>
        </div>
        <div class="col-6 mb-5">
            <div class="card">
                <div class="card-header"> <span id="eth_name"></span> </div>
                <div class="card-body p-5 text-center">
                    <span id="eth_price"></span> USD
                    <input type="hidden" id="eth_name_value">
                    <input type="hidden" id="eth_price_value">
                </div>
            </div>
        </div>
        <div class="col-6 mb-5">
            <div class="card">
                <div class="card-header"> <span id="xrp_name"></span> </div>
                <div class="card-body p-5 text-center">
                    <span id="xrp_price"></span> USD
                    <input type="hidden" id="xrp_name_value">
                    <input type="hidden" id="xrp_price_value">
                </div>
            </div>
        </div>
        <div class="col-6 mb-5">
            <div class="card">
                <div class="card-header"> <span id="doge_name"></span> </div>
                <div class="card-body p-5 text-center">
                    <span id="doge_price"></span> USD
                    <input type="hidden" id="doge_name_value">
                    <input type="hidden" id="doge_price_value">
                </div>
            </div>
        </div>
        <center>
            <button class="btn btn-secondary" onclick="saveCurrency()"><i class="fas fa-sync-alt"></i> Refresh</button>
        </center>
    </div>
</div>
@csrf
@endsection

<script>
    getDataBTC()
    getDataETH()
    getDataXRP()
    getDataDOGE()
    async function getDataBTC() {
        var url = "https://api.lunarcrush.com/v2?data=assets&key=clhlgaqau5rkyl6blnazu&symbol=BTC"
        var res = await fetch(url)
        var data = await res.json()
        // console.log(data.data[0].name);
        document.getElementById('btc_name').innerHTML = data.data[0].name
        document.getElementById('btc_price').innerHTML = data.data[0].price
        document.getElementById('btc_name_value').value = data.data[0].name
        document.getElementById('btc_price_value').value = data.data[0].price
    }
    async function getDataETH() {
        var url = "https://api.lunarcrush.com/v2?data=assets&key=clhlgaqau5rkyl6blnazu&symbol=ETH"
        var res = await fetch(url)
        var data = await res.json()
        // console.log(data.data[0].name);
        document.getElementById('eth_name').innerHTML = data.data[0].name
        document.getElementById('eth_price').innerHTML = data.data[0].price
        document.getElementById('eth_name_value').value = data.data[0].name
        document.getElementById('eth_price_value').value = data.data[0].price
    }
    async function getDataXRP() {
        var url = "https://api.lunarcrush.com/v2?data=assets&key=clhlgaqau5rkyl6blnazu&symbol=XRP"
        var res = await fetch(url)
        var data = await res.json()
        // console.log(data.data[0].name);
        document.getElementById('xrp_name').innerHTML = data.data[0].name
        document.getElementById('xrp_price').innerHTML = data.data[0].price
        document.getElementById('xrp_name_value').value = data.data[0].name
        document.getElementById('xrp_price_value').value = data.data[0].price
    }
    async function getDataDOGE() {
        var url = "https://api.lunarcrush.com/v2?data=assets&key=clhlgaqau5rkyl6blnazu&symbol=DOGE"
        var res = await fetch(url)
        var data = await res.json()
        // console.log(data.data[0].name);
        document.getElementById('doge_name').innerHTML = data.data[0].name
        document.getElementById('doge_price').innerHTML = data.data[0].price
        document.getElementById('doge_name_value').value = data.data[0].name
        document.getElementById('doge_price_value').value = data.data[0].price
    }
    async function saveCurrency() {
        var url = "{{ route('saveCurrency') }}"
        var _token = document.getElementsByName('_token')[0].value

        try {
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    btc_name: document.getElementById('btc_name_value').value,
                    btc_price: document.getElementById('btc_price_value').value,
                    eth_name: document.getElementById('eth_name_value').value,
                    eth_price: document.getElementById('eth_price_value').value,
                    xrp_name: document.getElementById('xrp_name_value').value,
                    xrp_price: document.getElementById('xrp_price_value').value,
                    doge_name: document.getElementById('doge_name_value').value,
                    doge_price: document.getElementById('doge_price_value').value,
                    _token: _token
                },
                success: (res) => {
                    location.reload()
                    // console.log(res);
                }

            })
        } catch (error) {
            console.log(error);
        }
    }
</script>
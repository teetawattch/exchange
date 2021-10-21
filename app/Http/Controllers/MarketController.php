<?php

namespace App\Http\Controllers;

use App\Models\DigitalCurrency;
use App\Models\Order;
use App\Models\Store;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function index()
    {
        $data['currency'] = DigitalCurrency::get();
        $data['store'] = Store::select('stores.id', 'stores.store_name', 'stores.user_id', 'stores.amount', 'stores.price_per_unit', 'stores.digital_currency_id', 'digital_currencies.id as currency_id', 'digital_currencies.currency_name')->join('digital_currencies', 'stores.digital_currency_id', 'digital_currencies.id')->get();
        return view('pages/market', $data);
    }
    public function addStore(Request $request)
    {
        try {

            $store = new Store();
            $store->store_name = $request->store_name;
            $store->amount = $request->amount;
            $store->price_per_unit = $request->price_per_unit;
            $store->user_id = $request->user_id;
            $store->digital_currency_id = $request->currency_id;
            $store->save();

            return response()->json(['message' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }
    public function getprice($id)
    {
        try {

            $data = DigitalCurrency::where('id', $id)->get();

            return response()->json(['message' => 'success', 'data' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }
    public function getStore($id)
    {
        try {

            $data = Store::select('stores.store_name', 'stores.id', 'digital_currencies.currency_name', 'stores.digital_currency_id')
            ->join('digital_currencies', 'stores.digital_currency_id', 'digital_currencies.id')->where('stores.id', $id)->get();
            return response()->json(['message' => 'success', 'data' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }
    public function addOrder(Request $request)
    {
        try {

            $data_currency = DigitalCurrency::where('id', $request->digital_currency_id)->first();
            $total = $request->amount * $data_currency->currency_price;

            $order = new Order();
            $order->amount = $request->amount;
            $order->total = $total;
            $order->status = 'pending';
            $order->user_id = $request->user_id;
            $order->digital_currency_id = $request->digital_currency_id;
            $order->store_id = $request->store_id;
            $order->save();

            $store = Store::where('id', $request->store_id)->first();
            $sub = $store->amount - $request->amount;

            Store::updateOrCreate(
                ['id' => $request->store_id],
                [
                    'amount' => $sub
                ]
            );

            return response()->json(['message' => 'success', $sub]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }
}

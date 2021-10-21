<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Wallet;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index(){
        $id = auth()->id();
        $data['request'] = Order::select('orders.id', 'users.username', 'orders.total', 'orders.created_at', 'orders.amount', 'orders.status')
        ->join('users', 'orders.user_id', 'users.id')->where('user_id', $id)->get();
        return view('pages/request', $data);
    }

    public function acceptRequest(Request $request){
        try {

            $id = $request->id;
            $requestData = Order::where('id', $id)->first();
            $userWalletData = Wallet::where('user_id', $requestData->user_id)->where('currency_id', $requestData->digital_currency_id)->first();

            Wallet::updateOrCreate(
                ['id' => $userWalletData->id],
                [
                    'total_amount' => $requestData->amount + $userWalletData->total_amount
                ]
            );

            Order::updateOrCreate(
                ['id' => $id],
                [
                    'status' => 'accept'
                ]
            );

            return response()->json(['message' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    public function denyRequest(Request $request){
        try {

            $id = $request->id;

            Order::updateOrCreate(
                ['id' => $id],
                [
                    'status' => 'deny'
                ]
            );

            return response()->json(['message' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }
}

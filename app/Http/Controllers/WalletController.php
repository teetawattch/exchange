<?php

namespace App\Http\Controllers;

use App\Models\DigitalCurrency;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = auth()->id();
        $data['count_row'] = Wallet::where('user_id', $id)->count();
        $data['currency'] = DigitalCurrency::get();
        $data['wallet'] = Wallet::join('digital_currencies', 'wallets.currency_id', 'digital_currencies.id')
            ->where('wallets.user_id', $id)
            ->get();
        return view('pages/wallet', $data);
    }
    public function addWallet(Request $request)
    {
        try {
            $str = rand();
            $result = hash("sha256", $str);

            $wallet = new Wallet();
            $wallet->currency_id = $request->currency_id;
            $wallet->address = $result;
            $wallet->user_id = $request->user_id;
            $wallet->total_amount = 0;
            $wallet->save();

            return response()->json(['message' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }
    public function getWalletById($id){
        try {
            $data = Wallet::where('id',$id)->get();
            return response()->json(['message' => 'success', 'data' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }
    public function deposit(Request $request){
        try {

            $wallet_id = Wallet::where('wallets.id', $request->wallet_id)
            ->first();

            $currency = DigitalCurrency::where('id', $wallet_id->currency_id)->first(); 


            $amount = $request->amount / $currency->currency_price; 
            $total_amount = $wallet_id->total_amount + $amount;

            Wallet::updateOrCreate(
                ['id' => $request->wallet_id],
                [
                    'total_amount' => $total_amount
                ]
            );
            return response()->json(['message' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }
}

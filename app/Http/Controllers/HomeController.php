<?php

namespace App\Http\Controllers;

use App\Models\DigitalCurrency;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages/dashboard');
    }
    public function savecurrency(Request $request){
        try {
            DigitalCurrency::updateOrCreate(
                ['currency_name' => $request->btc_name],
                [
                    'currency_price' => $request->btc_price
                ]
            );
            DigitalCurrency::updateOrCreate(
                ['currency_name' => $request->eth_name],
                [
                    'currency_price' => $request->eth_price
                ]
            );
            DigitalCurrency::updateOrCreate(
                ['currency_name' => $request->xrp_name],
                [
                    'currency_price' => $request->xrp_price
                ]
            );
            DigitalCurrency::updateOrCreate(
                ['currency_name' => $request->doge_name],
                [
                    'currency_price' => $request->doge_price
                ]
            );
            return response()->json(['message' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }
}

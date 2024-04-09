<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Wallet;

class WalletController extends Controller
{
    public function index(){

        // $wallets = Wallet::all();

        $wallets = Wallet::with('category','tags')->paginate(2);

        return response()->json([
            'succes' => true,
            'wallets' => $wallets,
        ]);
    }

    public function show($slug){
        $wallets = Wallet::with('category','tags')->where('slug', $slug)->first();

        if($wallets){
            return response()->json([
                'succes' => true,
                'wallet' => $wallets
            ]);
        }else{
            return response()->json([
                'succes' => false,
                'error' => 'Non ci sono Progetti'
            ]);
        }

    }
}

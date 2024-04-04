<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Wallet;

class WalletController extends Controller
{
    public function index(){

        $wallets = Wallet::all();

        return response()->json([
            'succes' => true,
            'wallets' => $wallets,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use \Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth as FacadesAuth;

class OrderController extends Controller
{
    public function add(Request $request)
    {
        $order = new Order;

        $order->animal_id = $request->animal_id;
        $order->count = $request->animals_count;
        $order->user_id = FacadesAuth::user()->id;
        $order->save();

        return redirect()->back();


        

    }
}

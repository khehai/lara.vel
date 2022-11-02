<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\OrderContract;

class CheckoutController extends Controller
{
    protected $orderRepository;
    // protected $payPal;

    public function __construct(OrderContract $orderRepository)     {
        $this->orderRepository = $orderRepository;
    }

    public function checkout()    {
        return view('app.checkout');
    }

    public function placeOrder(Request $request)     {
        $order = $this->orderRepository->storeOrderDetails($request->all());
        // dd($order);
        if ($order) {
            // $this->payPal->processPayment($order);

            \Cart::clear();
            return view('app.success', compact('order'));

        }
        return redirect()->back()->with('message','Order not placed');
    }



}

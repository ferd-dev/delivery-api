<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Gloudemans\Shoppingcart\CartItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::when(Auth::user()->isClient(), function ($query) {
            $query->where('user_id', Auth::id());
        })
            ->when(Auth::user()->isDelivery(), function ($query) {
                $query->where('status', 'pending');
            })->paginate(10);

        return OrderResource::collection($orders);
    }

    public function store()
    {
        Cart::restore(Auth::user()->email);

        $content = Cart::content()->map(function (CartItem $cartItem) {
            return [
                'name' => $cartItem->name,
                'price' => $cartItem->price,
                'qty' => $cartItem->qty,
                'tax_rate' => $cartItem->taxRate,
                'total' => $cartItem->total(),
            ];
        })->values();

        $order = Order::create([
            'user_id' => Auth::id(),
            'content' => $content,
            'status' => 'pending',
        ]);

        return new OrderResource($order);
    }
}

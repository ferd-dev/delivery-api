<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        abort_unless(Auth::user()->tokenCan('cart:manage'), 403, "You don't have permission");

        Cart::restore(Auth::user()->email);
        Cart::store(Auth::user()->email);

        return Cart::content();
    }

    public function store(Product $product)
    {
        abort_unless(Auth::user()->tokenCan('cart:manage'), 403, "You don't have permission");

        request()->validate([
            'qty' => 'required|integer|min:1',
        ]);

        Cart::restore(Auth::user()->email);

        Cart::add([
            'id' => 'prod-' . $product->id,
            'name' => $product->name,
            'qty' => request('qty'),
            'price' => $product->price,
            'weight' => 0,
        ]);

        Cart::store(Auth::user()->email);

        return Cart::content();
    }

    public function update($rowId)
    {
        abort_unless(Auth::user()->tokenCan('cart:manage'), 403, "You don't have permission");

        request()->validate([
            'qty' => 'required|integer|min:1',
        ]);

        Cart::restore(Auth::user()->email);

        Cart::update($rowId, [
            'qty' => request('qty'),
        ]);

        Cart::update($rowId, request('qty'));

        Cart::store(Auth::user()->email);

        return Cart::content();
    }

    public function destroy($rowId)
    {
        abort_unless(Auth::user()->tokenCan('cart:manage'), 403, "You don't have permission");

        Cart::restore(Auth::user()->email);

        Cart::remove($rowId);

        Cart::store(Auth::user()->email);

        return Cart::content();
    }
}

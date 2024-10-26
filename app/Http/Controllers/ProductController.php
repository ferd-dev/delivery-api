<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        abort_unless(Auth::user()->tokenCan('product:show'), 403, "You don't have permission to view this establishment");
        return new ProductResource($product);
    }
}

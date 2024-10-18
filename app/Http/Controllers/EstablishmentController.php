<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{
    public function index()
    {
        return Establishment::when(request()->filled('category'), function ($query) {
            $query->where('category', request('category'));
        })
            ->when(request()->exists('popular'), function ($query) {
                $query->orderBy('starts', 'DESC');
            })
            ->paginate(10);
    }
}

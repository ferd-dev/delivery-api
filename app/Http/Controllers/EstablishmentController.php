<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function show(Establishment $establishment)
    {
        return $establishment;
    }
}
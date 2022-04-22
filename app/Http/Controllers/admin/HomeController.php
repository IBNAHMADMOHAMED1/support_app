<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TikectStore;
use App\Models\Ticket;

class HomeController extends Controller
{
    //

    public function index()
    {
        $Tickets = Ticket::with('Statuses')->orderBy('created_at', 'desc')->get();
        // dd($Tickets);
        return view('Admin.dashboard', compact('Tickets'));
    }
}

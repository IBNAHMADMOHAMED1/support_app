<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TikectStore;
use App\Models\comment;
use App\Models\Ticket;
use App\Models\Status;

use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Tickets = Ticket::with('Statuses')->orderBy('created_at', 'desc')->get();

       
        // dd($Tickets);
        return view('Admin.dashboard', compact('Tickets', 'comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Comment::where('ticket_id', $id)->orderBy('created_at', 'desc')->get();



        $ticket = Ticket::with('Comments')->find($id);


        $user = Ticket::with('Users')->find($id);
        $admin = Auth::guard('admin')->user()->name;
        
        
        
     
        return view('Admin.comment.create', compact('ticket','user','admin', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $statusid = $request->input('statusid');
        $ticket = Ticket::find($id);
        $ticket->statusid = $statusid;
        $ticket->save();

        
    
        return redirect()->action('admin\TicketController@index')->with('update', 'Ticket updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

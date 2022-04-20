<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TikectStore;
use App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $Tickets = Ticket::with('Statuses')->where('userid', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('ticket.index', compact('Tickets'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('ticket.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TikectStore $request)
    {
        // access the message session


        $title = $request->input('title');
        $description = $request->input('description');
        $statusid = $request->input('statusid');
        $userid = auth()->user()->id;
        $serviceid = $request->input('serviceid');
        $statusid = 1;
   $data = [
        'title' => $title,
        'description' => $description,
        'statusid' => $statusid,
        'userid' => $userid,
        'serviceid' => $serviceid,
        'statusid' => $statusid,
    ];
   

        
      Ticket::create($data);
        
       
        return redirect()->action('user\TicketController@index')->with('addcomment', 'Ticket created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::with('comments')->find($id);
       
        return view('comment.create', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::destroy($id);
        return redirect()->action('user\TicketController@index')->with('deletcomment', 'Ticket deleted!');
    }
}

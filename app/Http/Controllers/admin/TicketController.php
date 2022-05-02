<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TikectStore;
use App\Models\comment;
use App\Models\Ticket;
use App\Models\Status;

use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\This;

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

        // check if ticket has admin comment change status to closed

       
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
    public function get($id)
    {
        $comments = Comment::where('ticket_id', $id)->orderBy('created_at', 'desc')->get();



        $ticket = Ticket::with('Comments')->find($id);


        $user = Ticket::with('Users')->find($id);
        $admin = Auth::guard('admin')->user()->name;
        $data = [
            'ticket' => $ticket,
            'comments' => $comments,
            'user' => $user,
            'admin' => $admin,
        ];
        return $data;
        
    }
    public function statusTicket($ticket, $comments, $user, $admin)
    {
        if ($comments->count() <= 0) {
           $ticket->statusid = 1;
            $ticket->save();
        } 

        foreach ($comments as $comment) {
            if ($comment->check_is_finsh== 1) {
                
                $ticket->statusid = 3;
                $ticket->save();
                break;
            }
           elseif ($comment->is_admin == 1) {
             
                $ticket->statusid = 2;
                $ticket->save();
           }
                   
        }
    }
   
    public function show($id)
    {
        $data = $this->get($id);
        $this->statusTicket($data['ticket'], $data['comments'], $data['user'], $data['admin']);
        return view('Admin.comment.create', $data);
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

    

    //  function of status ticket when ticket hase comment by admin
  
   
  
}

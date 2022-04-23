<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TikectStore;
use App\Models\Admin;
use App\Models\Ticket;
use App\Models\Status;
use App\Models\Comment;
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
        
        $Tickets = Ticket::with('Statuses')->where('userid', auth()->user()->id)->orderBy('created_at', 'desc')->get();

        // if exists comment in the comments table have check_is_finsh = 1 change the status to 2
        // foreach ($Tickets as $Ticket) {
        //     $comments = Comment::where('ticket_id', $Ticket->id)->where('check_is_finsh', 1)->get();
        //     if (count($comments) > 0) {
        //         $Ticket->statusid = 3;
        //         $Ticket->update();
        //     }

        // }
        // $comments = comment::where('is_admin', 1)->orderBy('created_at', 'desc')->get();
        // $notification = $comments->count();

        // dd(strtotime('-1 heure'));
        $comments = Comment::where('is_admin', 1)->where('created_at', '>', date('Y-m-d H:i:s', strtotime('1 heure')))->orderBy('created_at', 'desc')->get();
        $notification = $comments->count();
        

        
            // multiple return

            
       

 
        return view('ticket.index', compact('Tickets', 'comments', 'notification'));
    
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
        // $commentsadmin = comment::where('ticket_id', $id)->where('is_admin', 1)->orderBy('created_at', 'desc')->get();
        // // dd($commentsadmin);
        // $commentsuser = comment::where('ticket_id', $id)->where('is_admin', 0)->orderBy('created_at', 'desc')->get();
        
        $comments = Comment::where('ticket_id', $id)->orderBy('created_at', 'desc')->get();

        $admin = Admin::find(1)->name;
      
        $commentsadmin = Comment::where('ticket_id', $id)->where('is_admin', 1)->orderBy('created_at', 'desc')->get();
        //  if exitsts admin comments update statusid to 2
        
        if ($commentsadmin->count() > 0) {
            $ticket = Ticket::find($id);
            $ticket->statusid = 2;
            $ticket->save();
        }
        // if exists admin comments update statusid to 3
        if ($commentsadmin->count() > 0) {
        //    check is_finish = 1 in the comments user
            $commentsuser = Comment::where('ticket_id', $id)->where('is_admin', 0)->where('check_is_finsh', 1)->get();
            if ($commentsuser->count() > 0) {
                $ticket = Ticket::find($id);
                $ticket->statusid = 3;
                $ticket->save();
            }

           
        }
        

        

        
        
    
        $ticket = Ticket::with('Comments')->find($id);

        


        $user = Ticket::with('Users')->find($id);

        return view('comment.create', compact('ticket', 'user', 'admin', 'comments'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::with('services')->find($id);
    
        return view('ticket.edit', compact('ticket'));
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
        Ticket::find($id)->update($request->all());
        return redirect()->action('user\TicketController@index')->with('update', 'Ticket updated!');
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

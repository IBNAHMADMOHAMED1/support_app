<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Ticket;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    //   access the id of Admin
       $request['user_id']= auth()->guard('admin')->user()->id;
        $comment = $request->except('_token');
        // check if exist admin comment
        // join this condition one time

                
        
        Comment::create($comment);
        return redirect()->action('admin\TicketController@show',$id = $comment['ticket_id'])->with('addcomment', 'Comment added successfully');
        
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        // delete comment
        $comment = Comment::find($id);
        $id_ticket = $comment->ticket->id;
        // check if exist admin comment
        // join this condition one time
       
        Comment::destroy($id);
        return redirect()->action('admin\TicketController@show',$id_ticket)->with('deletcomment', 'Comment deleted!');
    }

   
}

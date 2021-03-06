<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable = ['comment', 'user_id', 'ticket_id', 'is_admin', 'check_is_finsh'];

    public function Ticket()
    {
        return $this->belongsTo('App\Models\Ticket');
    }
}

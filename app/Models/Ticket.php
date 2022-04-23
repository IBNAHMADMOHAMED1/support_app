<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'userid', 'serviceid'];

    public function Statuses()
    {
        return $this->belongsTo('App\Models\Status', 'statusid');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'userid');
    }
    public function services()
    {
        return $this->belongsTo('App\Models\Service', 'serviceid');
    } 
}

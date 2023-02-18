<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestsubmitVote extends Model
{
    use HasFactory;

    protected $fillable = ['vote','ip_address','contest_id','contest_submit_id'];

    public function scopeCheck($query,$ip_address,$contest_submit_id,$contest_id){
        $query->where([
            ['ip_address',$ip_address],
            ['contest_id',$contest_id],
            ['contest_submit_id',$contest_submit_id]
        ]);
    }
}

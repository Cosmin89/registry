<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreeDay extends Model
{
    protected $fillable = [
        'start_date', 'end_date', 'month', 'total_free_days'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

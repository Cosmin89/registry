<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkHour extends Model
{
    protected $fillable = [
        'hours', 'workdate', 'month'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

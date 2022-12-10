<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'statuses';

//    protected $guarded = ['*'];

    public $timestamps = true;

    public function getStatusIdAttribute()
    {
        return "$this->id : $this->status";
    }
}

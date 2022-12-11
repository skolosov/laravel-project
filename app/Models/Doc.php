<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Doc extends Model
{
    use HasFactory;

    protected $table = 'docs';
//открытые для редактирования данные
    protected $fillable = [
        'name',
    ];


//связь relationship типо join
    public function status(): HasOne
    {
        return $this->hasOne(Status::class,'id', 'status_id');
    }

    public $timestamps = true;
}

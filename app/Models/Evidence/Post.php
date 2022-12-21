<?php

namespace App\Models\Evidence;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Post
 * @package App\Models\Evidence
 *
 * @property int id
 * @property string name
 * @property string created_at
 * @property string updated_at
 */
class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'name',
    ];
}

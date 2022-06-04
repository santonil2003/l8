<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Todo Model
 * @property string name
 */
class Todo extends Model
{
    use HasFactory;

    // only needed for mass assignment ..e.g. Todo::craete(['name'=>'...']);
    protected $fillable = ['name'];
}

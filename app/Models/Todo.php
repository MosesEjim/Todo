<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'date', 'time', 'user_id'];

    public function snippet(){
        return substr($this->description, 0, 30);
    }
}

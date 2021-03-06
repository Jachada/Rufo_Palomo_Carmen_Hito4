<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable=['issue','comment','author'];
    use HasFactory;

    
}

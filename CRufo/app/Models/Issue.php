<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Issue extends Model
{
    protected $table = 'issues';
    protected $fillable = ['title','description','author','classroom'];
    use HasFactory;

    /**
     * Get the classroom associated with the issue.
     */
    public function classroomRelation()
    {
        return $this->belongsTo(Classroom::class, 'classroom');
    }

    public function conditionRelation()
    {
        return $this->belongsTo(Condition::class, 'id_condition');
    }

    public function userRelation()
    {
        return $this->belongsTo(User::class, 'author');
    }

    /**
     * Get the comments associated with the issue.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'issue');
    }

    public function obtenerIncidencias()
    {
        return Issue::all();
    }


    public function obtenerIncidenciaId($id)
    {
        return Issue::find($id);
    }

    public function obtenerIncidenciaUser($author)
    {
        return Issue::where('author', $author)->get();
    }

    
}

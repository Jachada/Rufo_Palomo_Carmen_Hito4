<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Classroom;
use App\Models\User;
use App\Models\Admin;
use App\Models\Condition;
use App\Models\Comment;
use Barryvdh\DomPDF\Facade as PDF;

class issueController extends Controller
{
    protected $issues;
    protected $class;
    protected $user;
    protected $admin;

    public function __construct(Issue $issues, Classroom $class, User $user, Admin $admin, Condition $conditions)
    {
        $this->issues = $issues;
        $this->class = $class;
        $this->user = $user;
        $this->admin = $admin;
        $this->conditions = $conditions;
    }

    /* COMPROBAR QUE ES ADMINISTRADOR */
    public function useradmin() {
        return $admin = $this->admin->esAdmin(auth()->id());
    }
    /**********/

    /* INDICE SEGUN ADMIN O USUARIO */
    public function index()
    {
        $issues = $this->issues->obtenerIncidencias();

        if ($this->useradmin()) {
            return view('components.admin-issue', ['issues' => $issues]);
        } else {
            return view('components.issues', ['issues' => $issues]);

        }
    }

    public function user() {
        $issues = $this->issues->obtenerIncidenciaUser(auth()->id());
        $user = $this->user->obtenerUsuario(auth()->id());
        return view('components.user', ['issues' => $issues], ['user' => $user]);

    }

    public function create()
    {
        $class = $this->class->obtenerClases();
        return view('components.issue-create', ['class' => $class]);

    }
    public function store(Request $request)
    {
        $issue = Issue::create([
            'title' => $request->title,
            'description' => $request->description,
            'author' => auth()->id(),
            'classroom' => $request->classroom,
        ]);

        /* REALIZADO CON TINKER */
        // $issue = new Issue();
        // $issue->title = $request->title;
        // $issue->description = $request->description;
        // $issue->author = auth()->id();
        // $issue->classroom = $request->classroom;

        $issue->save();
        return redirect("/incidencias");
    }

    public function view($id)
    {
        $issue = $this->issues->obtenerIncidenciaId($id);
        return view('components.issue-view', ['issue' => $issue]);
    }

    public function edit($id)
    {
        $issue = $this->issues->obtenerIncidenciaId($id);
        $class = $this->class->obtenerClases();
        $conditions = $this->conditions->obtenerCondiciones();


        if ($this->useradmin()) {
            return view('components.admin-issue-edit', ['issue' => $issue, 'class' => $class,'conditions' => $conditions]);
        } else {
            return view('components.issue-edit', ['issue' => $issue,'class' => $class]);

        }
        
    }
    public function update(Request $request, $id)
    {
        $issue = $this->issues->obtenerIncidenciaId($id);
        $issue->fill($request->all());
        $issue->save();
        return redirect("/incidencias");
    }

    public function destroy($id)
    {
        $issue = $this->issues->obtenerIncidenciaId($id);
        $issue->delete();
        return redirect("/incidencias");
    }

    public function storeComment(Request $request)
    {
        // dd($request->issue);
        $comment = Comment::create([
            'issue' => $request->issue,
            'comment' => $request->comment,
            'author' => auth()->id(),
        ]);

        /* REALIZADO CON TINKER */
        // $issue = new Issue();
        // $issue->title = $request->title;
        // $issue->description = $request->description;
        // $issue->author = auth()->id();
        // $issue->classroom = $request->classroom;

        $comment->save();
        return redirect("/incidencias");
    }

    //     public function librosPDF(){
    //         $datos =[
    //             "libros"=>Issue::all()
    //         ];
    //         $pdf = PDF::loadView('components.librosPDF', $datos);

    //         return $pdf->download('libros.pdf');
    //     }

    //     public function libroPDF($id){
    //         $libro =[
    //             "libro"=>Issue::find($id)
    //         ];
    //         $pdf = PDF::loadView('components.libroPDF', $libro);

    //         return $pdf->download('libro.pdf');
    //     }
}

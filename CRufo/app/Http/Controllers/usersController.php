<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;


class usersController extends Controller
{
    protected $users;
    public function __construct(User $users)
    {
        $this->users = $users;
    }

    // public function index()
    // {
    //     $users = $this->users->obtenerLibros();
    //     return view('components.listar', ['users' => $users]);
    // }

    public function admin()
    {
        $users = $this->users->obtenerUsuarios();
        return view('components.admin-users', ['users' => $users]);
    }

    public function destroy($id)
    {
        $user = $this->users->obtenerUsuario($id);
        $user->delete();
        return redirect("/usuarios");
    }

    // public function librosPDF(){
    //     $datos =[
    //         "libros"=>User::all()
    //     ];
    //     $pdf = PDF::loadView('components.librosPDF', $datos);

    //     return $pdf->download('libros.pdf');
    // }

    // public function libroPDF($id){
    //     $libro =[
    //         "libro"=>User::find($id)
    //     ];
    //     $pdf = PDF::loadView('components.libroPDF', $libro);

    //     return $pdf->download('libro.pdf');
    // }

}

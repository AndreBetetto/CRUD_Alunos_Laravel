<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    public function index()
    {
        $rows = Curso::all();
        return view('admin.cursos.index', compact('rows'));
    }

    public function create()
    {
        return view('admin.cursos.create');
    }

    public function store(Request $req)
    {
        $dados = $req->all();
        if($req->hasFile('arquivo')){
            $foto = $req->file('arquivo');
            $num = rand(1111,9999);
            $dir = "img/Cursos/";
            $ex = $foto->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $foto->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }
        Curso::create($dados);
        return redirect()->route('admin.cursos.index');

    }

    public function edit($id)
    {
        $row = Curso::find($id);
        return view('admin.cursos.edit', compact('row'));
    }

    public function destroy($id)
    {
        Curso::destroy($id);
        return redirect()->route('admin.cursos.edit');
    }

    public function update(Request $req, $id)
    {
        $dados = $req->all();
        if($req->hasFile('arquivo')){
            $imagem = $req->file('arquivo');
            $num = rand(1111,9999);
            $dir = "img/cursos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['foto'] = $dir."/".$nomeImagem;
        }
        Curso::find($id)->update($dados); 
        return redirect()->route('admin.alunos.index');   
    }
}

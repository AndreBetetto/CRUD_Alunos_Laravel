<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function index()
    {
        $rows = Aluno::all();
        return view('admin.alunos.index', compact('rows'));
    }

    public function create()
    {
        return view('admin.alunos.create');
    }

    public function store(Request $req)
    {
        $dados = $req->all();
        if($req->hasFile('imagem')){
            $imagem = $req->file('alunos');
            $num = rand(1111,9999);
            $dir = "img/alunos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }
        Aluno::create($dados);
        return redirect()->route('admin.alunos.index');

    }

    public function edit($id)
    {
        $row = Aluno::find($id);
        return view('admin.alunos.edit', compact('row'));
    }

    public function destroy($id)
    {
        Aluno::destroy($id);
        return redirect()->route('admin.alunos.edit');
    }

    public function update(Request $req, $id)
    {
        $dados = $req->all();
        if($req->hasFile('imagem')){
            $imagem = $req->file('imagem');
            $num = rand(1111,9999);
            $dir = "img/cursos/";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir."/".$nomeImagem;
        }
        Aluno::find($id)->update($dados); 
        return redirect()->route('admin.alunos.index');   
    }

    
}

<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listaAtividades = Atividade::all();
        return view ('atividade.list',["tituloPagina" => "Lista de Atividades",
                                        "nomeAluno" => "Nome do Aluno",
                                        "listaAtividades" => $listaAtividades ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //retornar uma viw chamada create
        return view('atividade.create');
        
    }

    /**
     * recebe os dados e salva no bdd
     */
    public function store(Request $request)
    {
        //vetor com as mensagens de erro
        $messages = array(
            'title.required' => 'É obrigatório um título para a atividade',
            'description.required' => 'É obrigatória uma descrição para a atividade',
            'scheduledto.required' => 'É obrigatório o cadastro da data/hora da atividade',
            'scheduledto.date' => 'O campo Agendado Para deve ser uma data válida',
            'scheduledto.after' => 'O campo Agendado Para deve ser uma data posterior que hoje'
        );

        //vetor com as especificações de validações
        $regras = array(
            'title' => 'required|string|max:255',
            'description' => 'required',
            'scheduledto' => 'required|date|after:today',
        );

        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);

        //executa as validações
        if ($validador->fails()) {
            return redirect("atividades/create")
            ->withErrors($validador)
            ->withInput($request->all);
        }

        //se passou pelas validações, processa e salva no banco...
        $obj_Atividade = new Atividade();
        $obj_Atividade->title =       $request['title'];
        $obj_Atividade->description = $request['description'];
        $obj_Atividade->scheduledto = $request['scheduledto'];
        $obj_Atividade->save();

        return redirect('/atividades')->with('success', 'Atividade criada com sucesso!!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $umaAtividade = Atividade::find($id);
       return view('atividade.show',["atividade" => $umaAtividade]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $umaAtividade = Atividade::find($id);
        return view("atividade.edit", ['atividade' => $umaAtividade]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //vetor com as mensagens de erro
        $messages = array(
            'title.required' => 'É obrigatório um título para a atividade',
            'description.required' => 'É obrigatória uma descrição para a atividade',
            'scheduledto.required' => 'É obrigatório o cadastro da data/hora da atividade',
            'scheduledto.date' => 'O campo Agendado Para deve ser uma data válida',
            'scheduledto.after' => 'O campo Agendado Para deve ser uma data posterior que hoje'
        );

        //vetor com as especificações de validações
        $regras = array(
            'title' => 'required|string|max:255',
            'description' => 'required',
            'scheduledto' => 'required|date|after:today',
        );

        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);

        //executa as validações
        if ($validador->fails()) {
            return redirect("atividades/$id/edit")
            ->withErrors($validador)
            ->withInput($request->all);
        }

        //se passou pelas validações, processa e salva no banco...
        $obj_Atividade = Atividade::findOrFail($id);
        $obj_Atividade->title =       $request['title'];
        $obj_Atividade->description = $request['description'];
        $obj_Atividade->scheduledto = $request['scheduledto'];
        $obj_Atividade->save();

        return redirect('/atividades')->with('success', 'Atividade editada com sucesso!!');
    }

    public function delete($id){
        $umaAtividade = Atividade::find($id);
        return view('atividade.delete',['atividade' => $umaAtividade]);
    }

    public function destroy($id)
    {
        $umaAtividade = Atividade::find($id);
        $umaAtividade->delete();
        return redirect('/atividades')->with('success','Atividade excluída com sucesso!!');
    }
}

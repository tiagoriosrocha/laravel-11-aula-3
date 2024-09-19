<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AtividadeController extends Controller
{
    /*
    * ATENÇÃO
    * EXISTEM DUAS PASTAS COM CONJUNTOS DE VIEWS DIFERENTES
    * A PRIMEIRA NÃO TEM LAYOUT E A SEGUNDA TEM LAYOUT COM O BOOTSTRAP
    * ESCOLHA UMA E DEIXA A OUTRA COMENTADA
    */
    
    //FORMATAÇÃO DAS VIEWS SEM LAYOUT PASTA /resources/views/atividade
    //private $pastaViews = "atividade";
    
    //FORMATAÇÃO DAS VIEWS COM LAYOUT PASTA /resources/views/atividade-bootstrap
    private $pastaViews = "atividade-bootstrap";
    
    public function index()
    {
        $listaAtividades = Atividade::all();
        return view ("$this->pastaViews.list",["tituloPagina" => "Lista de Atividades",
                                        "nomeAluno" => "Nome do Aluno",
                                        "listaAtividades" => $listaAtividades ]);
    }

    public function create()
    {
        //retornar uma viw chamada create
        return view("$this->pastaViews.create");
        
    }

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
    
    public function show($id)
    {
       $umaAtividade = Atividade::find($id);
       return view("$this->pastaViews.show",["atividade" => $umaAtividade]);
    }

    public function edit($id)
    {
        $umaAtividade = Atividade::find($id);
        return view("$this->pastaViews.edit", ['atividade' => $umaAtividade]);
    }

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
        return view("$this->pastaViews.delete",['atividade' => $umaAtividade]);
    }

    public function destroy($id)
    {
        $umaAtividade = Atividade::find($id);
        $umaAtividade->delete();
        return redirect('/atividades')->with('success','Atividade excluída com sucesso!!');
    }
}

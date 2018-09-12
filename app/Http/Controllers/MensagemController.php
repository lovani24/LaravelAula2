<?php

namespace App\Http\Controllers;

use App\Mensagem;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;

class MensagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensagens = Mensagem::all();
        return view('mensagem.list',['mensagens' => $mensagens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('mensagem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //faço as validações dos campos

        //vetor com as mensagens de erro
        $messages = array(
            'titulo' => 'É obrigatório um título para a atividade',
            'texto' => 'É obrigatória uma descrição para a atividade',
            'autor' => 'É obrigatório o cadastro da data/hora da atividade',
        );

        //vetor com as especificações de validações
        $regras = array(
            'titulo' => 'required|string|max:255',
            'texto' => 'required',
            'autor' => 'required|string',
        );

        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);

        //executa as validações
        if ($validador->fails()) {
            return redirect('mensagens/create')
            ->withErrors($validador)
            ->withInput($request->all);
        }

        //se passou pelas validações, processa e salva no banco...
        $obj_Atividade = new Mensagem();
        $obj_Atividade->titulo =       $request['titulo'];
        $obj_Atividade->texto = $request['texto'];
        $obj_Atividade->autor = $request['autor'];
        $obj_Atividade->save();

        return redirect('/mensagens')->with('success', 'Mensagem criada com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mensagem = Mensagem::find($id);
        return view('mensagem.show',['mensagem'=>$mensagem]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mensagem = Mensagem::find($id);
        return view('mensagem.edit',['mensagem'=>$mensagem]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //faço as validações dos campos

        //vetor com as mensagens de erro
        $messages = array(
            'titulo' => 'É obrigatório um título para a atividade',
            'texto' => 'É obrigatória uma descrição para a atividade',
            'autor' => 'É obrigatório o cadastro da data/hora da atividade',
        );

        //vetor com as especificações de validações
        $regras = array(
            'titulo' => 'required|string|max:255',
            'texto' => 'required',
            'autor' => 'required|string',
        );

        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);

        //executa as validações
        if ($validador->fails()) {
            return redirect("mensagens/$id/edit")
            ->withErrors($validador)
            ->withInput($request->all);
        }

        //se passou pelas validações, processa e salva no banco...
        $obj_Atividade = Mensagem::find($id);
        $obj_Atividade->titulo =       $request['titulo'];
        $obj_Atividade->texto = $request['texto'];
        $obj_Atividade->autor = $request['autor'];
        $obj_Atividade->save();

        return redirect('/mensagens')->with('success', 'Mensagem criada com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
         $obj_Mensagem = Mensagem::find($id);
        return view('mensagem.delete',['mensagem' => $obj_Mensagem]);
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    }


    public function destroy($id)
    {
        $obj_mensagens = Mensagem::findOrFail($id);
        $obj_mensagens->delete($id);
        return redirect('/mensagens')->with('success','Mensagens excluída com Sucesso!!');
    }
}

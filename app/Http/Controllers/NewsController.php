<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = News::orderBy('title')->get();
        return view('news.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id; 

        if(!News::create($data)){
            return redirect()->route('noticias.index')->with(['status' => "fail", 'msg' => 'Erro ao Cadastrar Notícia']);
        }

        return redirect()->route('noticias.index')->with(['status' => "success", 'msg' => 'Notícia Cadastrada com Sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('news.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = News::findOrFail($id);
        return view('news.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = News::findOrFail($id);

        if(!$item->fill($request->all())->save()){
            return redirect()->route('noticias.index')->with(['status' => "fail", 'msg' => 'Erro ao Autalizar a Notícia']);
        }

        return redirect()->route('noticias.index')->with(['status' => "success", 'msg' => 'Notícia Atualizada com Sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = News::findOrFail($id);

        if(!$item->delete()){
            return redirect()->route('noticias.index')->with(['status' => "fail", 'msg' => 'Erro ao Excluir a Notícia']);
        }

        return redirect()->route('noticias.index')->with(['status' => "success", 'msg' => 'Notícia Excluída com Sucesso!']);

    }
}

@extends('layouts.app', ['pageSlug' => 'indexnews'])

@section('content')


  <h3>Notícias</h3>

    @if (session('status'))
        <div class="alert {{ session('status') == 'success' ? ' alert-success': 'alert-danger' }}">
            {{ session('msg') }}
        </div>
    @endif   
  

  <a class="btn btn-fill btn-primary" href="{{ route('noticias.create') }}">CADASTRAR</a>

  <br>
  <br>

  
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title"> Simple Table</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive" >
          <table class="table tablesorter " id="">

            <thead class=" text-primary">
              <tr>
                <th style="width: 30%;">
                  Título
                </th>
                <th>
                  Conteúdo
                </th>
                <th style="width: 20%;">
                  Ações
                </th>
              </tr>
            </thead>

            <tbody>
                @forelse($data as $item)
                    <tr>
                        <td>
                            {{$item->title}}
                        </td>
                        <td>
                            <p class="text-muted" style="width: 50rem;text-overflow: ellipsis;flex-wrap:nowrap;white-space: nowrap;overflow: hidden;">
                            {{$item->content}}
                            </p>
                        </td>
                        <td>                  
                            <a href=" {{route('noticias.edit', $item->id)}} " class="btn btn-fill btn-primary" >Editar</a>

                            <form method="post" action="{{route('noticias.destroy', $item->id)}}" style="display: inline;">
                            @csrf
                            @method('delete')
                                <button href="#" class="btn btn-fill btn-primary">Excluir</button>                            
                            </form>

                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="40">Nenhuma Notícia Cadastrada ainda, clique em CADASTRAR e cadastre uma nova Notícia!</td>
                    </tr>
                @endforelse


            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
  
</div>




 @endsection
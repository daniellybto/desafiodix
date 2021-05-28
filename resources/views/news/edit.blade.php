@extends('layouts.app', ['pageSlug' => 'indexnews'])

@section('content')

<div class="row">
        <div class="col-md-10">

            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Nova Notícia') }}</h5>
                </div>

                <form method="post" action="{{ route('noticias.update', $item->id) }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')

                        <div>
                            <label>{{ __('Título da Notícia') }}</label>
                            <input type="text" name="title" placeholder="Título da Notícia" class="form-control" value="{{$item->title}}" required>
                        </div>

                        <div>
                            <label>{{ __('Slug da Notícia') }}</label>
                            <input type="text" name="slug" placeholder="URL da Notícia" class="form-control" value="{{$item->slug}}" required>
                        </div>

                        <div>
                            <textarea type="text" name="content" placeholder="Corpo da Notícia" class="form-control" value="{{$item->content}}" required></textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Salvar Notícia') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
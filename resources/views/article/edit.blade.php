@extends('base')

@section('content')

<div class="container">
    <h1 class="text-center mt-5">Editer cet article</h1>
    <form action="{{route('article.update', $article->id)}}" method="post">
        @method('PUT')
        @csrf
            <div class="form-group">
                <label for="Titre" class="form-label mt-4">Titre</label>
                <input type="text" value="{{ $article->title }}" name="title" class="form-control @error('title') is-invalid @enderror" id="titre" placeholder="Titre de votre article">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="Sous-Titre" class="form-label mt-4">Sous-Titre</label>
                <input type="text" value="{{ $article->subtitle }}" name="subtitle" class="form-control @error('subtitle') is-invalid @enderror" id="soustitre" placeholder="Sous-titre de votre article">
                @error('subtitle')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="category">Catégorie</label>
                    <select name="category" id="" class="form-control">
                        @foreach ( $categories as $category )
                            <option value="{{ $category->id }}" {{$category->id === $article->category->id ? 'selected' : ''}}>{{$category->label}}</option>       
                        @endforeach
                    </select>
                </div>    
            </div>      

            <div class="form-group">
                <label for="Contenu" class="form-label mt-4" @error('content') style="color: red" @enderror>Contenu</label>
                <textarea value="{{ $article->content }}" name="content" id="tinycme-editor" class="form-control w-100" id="contenu">
                {{ $article->content }}
                </textarea>
                @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <script>
                tinymce.init({
                  selector: '#tinycme-editor'
                });
            </script>

            <div class="d-flex justify-content-center my-5">
                
                    
            <button class="btn btn-primary">Poster l'article</button>
        </form>    
            </div> 
    </form>
    
</div>
@endsection
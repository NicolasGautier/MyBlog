@extends('base')

@section('content')

<div class="container">
    
   
    <h1 class="text-center mt-5">Articles</h1>
   
    <div class="d-flex justify-content-center">
      <a href="{{route('articles.create')}}" class="btn btn-info my-3"><i class="fas fa-plus mx-2"></i> Ajouter un nouvel article</a>
    </div>
    <table class="table table-hover">
        <thead>
          <tr class="table-active">
            <th scope="col">ID</th>
            <th scope="col">Titre</th>
            <th scope="col">Créé le</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{ $article->dateFormatted()}}</td>
                    <td class="d-flex">
                        
                      {{-- Bouton d'édition --}}
                      <a href="{{route('article.edit', $article->id)}}" class="btn btn-warning mx-3">Editer</a>
                      
                      {{-- Bouton de suppression qui déclenche la modal --}}
                        <button type="button" class="btn btn-danger mx-3" onclick="document.getElementById('modal-open-{{ $article->id }}').style.display='block'">Supprimer</button>
                        <form action={{ route('articles.delete', $article->id) }} method="POST">
                          @csrf
                          @method('DELETE')
                          
                          {{-- Fenêtre de modal avec bouton de suppression (ne pas oublier d'indiquer l'identifiant en JS sinon il y a un renumérotage)--}}
                          <div class="modal" id="modal-open-{{ $article->id }}">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Confirmation de suppression</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="document.getElementById('modal-open-{{ $article->id}}').style.display='none'" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Etes-vous sûr de vouloir supprimer l'article ?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Oui</button>
                                  <button type="button" class="btn btn-secondary" onclick="document.getElementById('modal-open-{{ $article->id}}').style.display='none'">Annuler</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                        {{-- Fin de la modal --}}

                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center mt-5">
        {{ $articles->links('vendor.pagination.custom')}}
    </div>
</div>

@endsection
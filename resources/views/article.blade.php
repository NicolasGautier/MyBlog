@extends('base')

@section('content')

<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-4">
      <h2 class="display-4 text-center"> {{$article -> title}}</h2>
        <div class="d-flex justify-content-center">
            <a href="{{route("articles")}}" class="btn btn-primary my-5">
                <i class="fas fa-arrow-left"></i>
                Retour
            </a>
        </div>
    </div>
    <h5 class="text-center"> {{$article -> subtitle}} </h5>
    <div class="d-flex justify-content-center">
    <span class="badge rounded-pill bg-info mt-2">{{$article->category->label}}</span>
    </div>
  </div>
  <div class="container">
    <p class="text-center">
      {{-- Faire très attention à ce système car quelqu'un peu écrire du js et casser le site.
      Ici pas de problème car seul l'Admin peut intégrer des articles et sa route est protégée. --}}
      {!!$article -> content!!}
    </p>
  </div>

@endsection
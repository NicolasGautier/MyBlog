@extends('base')

@section('content')
 
</div>
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 style="font-weight: bold" class="display-3 text-center">Articles</h1>
        <div class="articles row justify-content-center">
            @foreach ($articles as $article)
                <div class="col-md-6">
                    <div class="card my-3">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between mb-3">
                                <h5 class="card-title">{{ $article->title}}</h5>
                                <span class="badge rounded-pill bg-info mb-2">{{$article->category->label}}</span>
                            </div>
                            <p class="card-text">{{$article->subtitle}}</p>
                            <a href="{{ route('article', $article->slug) }}" class="btn btn-primary">
                                    Lire la suite
                                    <i class="fas fa-arrow-right"></i>
                                </a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div> 
    </div>
    <div class="d-flex justify-content-center mt-5">
        {{ $articles->links('vendor.pagination.custom')}}
    </div>
  </div>

@endsection
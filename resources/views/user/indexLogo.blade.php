@extends('layouts.home')
@section('content')
@php
  $title ='الوقو والهوية البصرية';
@endphp

<main style=" direction: rtl;
text-align: right; max-width: 100%" >
  <div class="album py-5 bg-light" style="max-width: 100%">
    <div class="container" style="margin-right: 2%; margin-left: 2%">

      <h3 class="title"> أعمالنا في مجال تصميم الهوايا البصرية واللوقوهات </h3>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" style=" max-width:100%;">

        @foreach ($works as $work)
          <div class="card shadow-sm">
          <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>-->
            <img class="log" src="{{ asset('storage/' . $work->path) }}" class="bd-placeholder-img card-img-top" alt="" class="bd-placeholder-img card-img-top" width="100%" height="225px" style="border-radius: 5%">
            <h4 class="name" style="margin-right: 4%">{{$work->name}}</h4>
            <div class="card-body">
              <p class="card-text">{{$work->description}}</p>
            </div>
          </div>
        
        @endforeach
    </div>
    </div>
  </div>

</main>

@endsection
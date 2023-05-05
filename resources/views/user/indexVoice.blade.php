@extends('layouts.home')
@section('content')
@php
  $title ='التعليق الصوتي';
@endphp

<script>
  b = document.getElementById('body');
  b.style.background = "#4A3274";
</script>

<main style=" direction: rtl;
text-align: right;" >
  <div class="album py-5 bg-light">
    <div class="container">

      <h3 class="title">اعمالنا في مجال التعليق الصوتي <small>عربي -انجليزي</small></h3>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        @foreach ($works as $work)
        <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>-->
        @if($videos[$work->id])
        <div class="card shadow-sm" >
        <video class="bd-placeholder-img card-img-top"   width="100%" height="225px" style="border-radius: 5% 5% 0% 0%"  poster="{{ asset('storage/'. $work->poster) }}" controls><source src="{{ asset('storage/' . $videos[$work->id]->path) }}"  type="video/mp4"> </video>
          <h4 class="name" style="margin-right: 4%;">{{$work->name}}</h4>
            <div class="card-body">
              <p class="card-text">{{$work->description}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                  اللغة:{{$work->lang}}
                </small>
              </div>
            </div>
          </div>

        @elseif($voices[$work->id])
        <div class="audio">
        <audio class="bd-placeholder-img card-img-top" alt="" class="bd-placeholder-img card-img-top" width="100%" height="225px" controls><source src="{{ asset('storage/' . $voices[$work->id]->path) }}" > </audio>
          <h3 style="margin-right: 4%">{{$work->name}}</h3>
          <div class="card-body">
            <p class="card-text">{{$work->description}}</p>
            <div class="d-flex justify-content-between align-items-center">
              <small class="text-muted">
                اللغة:{{$work->lang}}
              </small>
            </div>
          </div>
        </div>
        @endif
        
        @endforeach
    </div>
    </div>
  </div>

</main>

@endsection
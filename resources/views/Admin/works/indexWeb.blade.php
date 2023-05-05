@extends('layouts.admin')
@section('content')
@php
  $title ='برمجة وتصميم مواقع الويب';
  $color = '#fff';
@endphp

<main style=" direction: rtl;
text-align: right;" >
  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        @foreach ($works as $work)
          <div class="card shadow-sm" >
          <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>-->
            <img src="{{ asset('storage/' .$work->path ) }}" class="bd-placeholder-img card-img-top" alt="" class="bd-placeholder-img card-img-top" width="100%" height="225px">
            <h3 style="margin-right: 4%">{{$work->name}}</h3>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <form method="POST" action="{{ route('work.delete',[$work->id])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-sm btn-outline-danger" value="حذف">
                        </form>
                        <form method="get" action="{{ route('work.edit',[$work->id])}}">
                            <input type="submit" class="btn btn-sm btn-outline-success" value="تعديل">
                        </form>
                    </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        
        @endforeach
    </div>
    </div>
  </div>

</main>

@endsection
@extends('layouts.home')
@section('content')
@php
  $title ='تصميم وبرمجة تطبيقات الهاتف المحمول';
@endphp


<main style=" direction: rtl;
text-align: right;" >
  <div class="album py-5 bg-light">
    <div class="container">

      <h3 class="title">من اعمالنا في مجال تصميم وبرمجة التطبيقات</h3>

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        @foreach ($works as $work)
          <div class="card shadow-sm app" >
          <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>-->
            <img src="{{ asset('storage/' .$work->path ) }}" style="border-radius: 5%" class="bd-placeholder-img card-img-top" alt="" class="bd-placeholder-img card-img-top" width="100%" height="225px">
            <h4 class="name" style="margin-right: 4%">{{$work->name}}</h4>
            <div class="card-body">
              <p class="card-text">{{$work->description}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-app">
                <a href="{{$work->link}}" class="btn btn-sm btn-outline-primary btnApp">معاينة التطبيبق</a>
                    </div>
              </div>
            </div>
          </div>
        
        @endforeach
    </div>
    </div>
  </div>

</main>

@endsection
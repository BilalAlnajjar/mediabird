@extends('layouts.admin')

@php
$title = "تعديل";
$color = "#E5E5E5";
@endphp

@section('content')

@if($errors->any())
<div class="alert alert-danger er">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif

@if(session('sccess'))
<div class="alert alert-success al">{{ session('sccess') }} </div>
@endif


<form method='post' action="{{route('work.update',[$work->id])}}" enctype="multipart/form-data" class="formCreat">
    @csrf
    <div class="text">تعديل {{$work->name}}</div>
    <div class="form-group is-invalid">
        <label for="exampleInputEmaill">اسم العمل </label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmaill" value="{{old('name',$work->name)}}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">وصف العمل</label>
        <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="description">{{old('description',$work->description)}}</textarea>
        @error('description')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class='form-group'>
        <label for="serviceType">نوع الخدمة</label>
        <select name="serviceType" id="serviceType" onchange='myfunction()' class="form-control @error('serviceType') is-invalid @enderror">
            <option> ---------</option>
            <option value="1" @if(old('serviceType',$work->serviceType)=='Motion Graphics')) selected @endif> موشن جرافيكس</option>
            <option value="2" @if(old('serviceType',$work->serviceType)=='Logo Design')) selected @endif>لوقو </option>
            <option value="3" @if(old('serviceType',$work->serviceType)=='Brand Identity')) selected @endif >الهوية البصرية </option>
            <option value="4" @if(old('serviceType',$work->serviceType)=='Voice-over')) selected @endif>التعليق الصوتي </option>
            <option value="5" @if(old('serviceType',$work->serviceType)=='Web Design')) selected @endif>تصميم المواقع</option>
            <option value="6" @if(old('serviceType',$work->serviceType)=='Web Programming')) selected @endif>برمجة المواقع </option>
            <option value="7" @if(old('serviceType',$work->serviceType)=='App Design')) selected @endif>تصميم التطبيقات </option>
            <option value="8" @if(old('serviceType',$work->serviceType)=='App Programming')) selected @endif>برمجة التطبيقات </option>
        </select>
        @error('serviceType')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="price">سعر ساعة العمل</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{old('price',$work->price)}}">
        @error('price')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    @if($work->serviceType == 'Web Design' || $work->serviceType == 'Web Programming'|| $work->serviceType == 'App Design' || $work->serviceType == 'App Programming')
    <div class="form-group is-invalid link" id="link">
        <label for="lin">رابط الموقع </label>
        <input type="url" name ='link' class="form-control @error('link') is-invalid @enderror"  value="{{old('link',$work->link)}}" id="lin">
        @error('link')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    @endif

    @if($work->serviceType == 'Web Design' || $work->serviceType == 'Web Programming' || $work->serviceType == 'App Design' || $work->serviceType == 'App Programming' )
    <div class="form-group image" id="image">
        <label for="img">صور عن العمل</label>
        <div>
        <label for ="img" button type="image" class="btn btn-secondary"> اختار الملف</label>
        <input type="file" name="image[]" multiple style="visibility: hidden;"  class=" form-control @error('image') is-invalid @enderror" id="img" >
        </div>
        @foreach($image as $img)
        <img src=" {{ asset('storage/'. $img->path) }}" width="200">
        @endforeach

        @error('image')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    @endif

    @if($work->serviceType == 'Voice-over' )

    <div class='form-group' id="lang">
        <label for="lang">لغة الملف الصوتي</label>
        <select id="lan" name="lang" class="form-control co @error('serviceType') is-invalid @enderror">
            <option >---------</option>
            <option value="1"  @if(old('lan',$work->lang)=='العربية') selected @endif> اللغة العربية</option>
            <option value="2" @if(old('lan',$work->lang)=='الانجليزية') selected @endif >اللغة الانجليزية </option>
        </select>
        @error('lan')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    @endif


    @if($work->serviceType == 'Motion Graphics')
    <div class="form-group video" id="video">
        <label for="vid">فيديو العمل</label>
        <div>
        <label for ="vid" button type="video" class="btn btn-secondary"> اختار الملف</label>
        <input type="file" name="video" style="visibility: hidden;" class=" form-control @error('video') is-invalid @enderror" id="vid"/>
        </div>

        <video  width="200" controls><source src=" {{ asset('storage/'. $video->path) }}" type="video/mp4"></source></video>

        @error('video')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    @endif

    
    @if($work->serviceType == 'Voice-over' )
    <div class="form-group voice" id="voice">
        <label for="voi">الملف الصوتي الخاص بالعمل</label>
        <div>
        <label for ="voi" button type="voice" class="btn btn-secondary"> اختار الملف</label>
        <input type="file" name="voice" multiple style="visibility: hidden;"  class=" form-control @error('voice') is-invalid @enderror" id="voi">
        </div>
        @foreach($voice as $vo)
        <audio src=" {{ asset('storage/'. $vo->path) }}" width="100">
        @endforeach

        @error('voice')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    @endif

    @if($work->serviceType == 'Voice-over' || $work->serviceType == 'Motion Graphics')
    <div class="form-group image" id="poster">
        <label for="post">اضف غلاف للفيديو</label>
        <div>
        <label for ="post" button type="image" class="btn btn-secondary"> اختار الملف</label>
        <input type="file" name="poster" multiple style="visibility: hidden;"  class=" form-control @error('image') is-invalid @enderror" id="post" >
        </div>
        @error('poster')
        <p class="text-danger">{{ $message }}</p>
        @enderror

        <img src=" {{ asset('storage/'. $work->poster) }}" width="200">
    </div>
    @endif

    <input type="submit" class="bt btn btn btn-outline-primary" style="font-family:Lemonada;" style="font-weight:bold;" value="تعديل">

</form>



@endsection
@extends('layouts.admin')

@php
$title = "رفع عمل جديد";
$color = '#E5E5E5';
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


<form method='post' action="{{route('work.store')}}" enctype="multipart/form-data" class="formCreat">
    @csrf
    <div class="text">انشاء عمل جديد</div>
    <div class="form-group is-invalid">
        <label for="exampleInputEmaill">اسم العمل </label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmaill" value="{{old('name')}}">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">وصف العمل</label>
        <textarea name="description" class="form-control  @error('description') is-invalid @enderror" id="description">{{old('description')}}</textarea>
        @error('description')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class='form-group'>
        <label for="serviceType">نوع الخدمة</label>
        <select name="serviceType" id="serviceType"  onchange='myfunction()' class="form-control co @error('serviceType') is-invalid @enderror">
            <option >---------</option>
            <option value="1"> موشن جرافيكس</option>
            <option value="2">لوقو </option>
            <option value="3">الهوية البصرية </option>
            <option value="4">التعليق الصوتي </option>
            <option value="5">تصميم المواقع</option>
            <option value="6">برمجة المواقع </option>
            <option value="7">تصميم التطبيقات </option>
            <option value="8">برمجة التطبيقات </option>
        </select>
        @error('works_id')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="price">سعر ساعة العمل</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{old('price')}}">
        @error('price')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group is-invalid link" id="link">
        <label for="lin">رابط الموقع </label>
        <input type="url"  class="form-control @error('link') is-invalid @enderror"  value="{{old('link')}}" id="lin">
        @error('link')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group image" id="image">
        <label for="img">صور عن العمل</label>
        <div>
        <label for ="img" button type="image" class="btn btn-secondary"> اختار الملف</label>
        <input type="file"  multiple style="visibility: hidden;"  class=" form-control @error('image') is-invalid @enderror" id="img" >
        </div>
        @error('image')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group video" id="video">
        <label for="vid">فيديو العمل</label>
        <div>
        <label for ="vid" button type="vedeo" class="btn btn-secondary"> اختار الملف</label>
        <input type="file"  style="visibility: hidden;"  class=" form-control @error('video') is-invalid @enderror" id="vid" >
        </div>
        @error('video')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group image" id="poster">
        <label for="post">اضف غلاف للفيديو</label>
        <div>
        <label for ="post" button type="image" class="btn btn-secondary"> اختار الملف</label>
        <input type="file" style="visibility: hidden;"  class=" form-control @error('image') is-invalid @enderror" id="post" >
        </div>
        @error('poster')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class='form-group' id="lang">
        <label for="lang">لغة الملف الصوتي</label>
        <select  id="lan"  class="form-control co @error('serviceType') is-invalid @enderror">
            <option >---------</option>
            <option value="1"> اللغة العربية</option>
            <option value="2">اللغة الانجليزية </option>
        </select>
        @error('lang')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>


    <div class="form-group voice" id="voice">
        <label for="voi">الملف الصوتي الخاص بالعمل</label>
        <div>
        <label for ="voi" button type="voice" class="btn btn-secondary"> اختار الملف</label>
        <input type="file" style="visibility: hidden;"  class=" form-control @error('voice') is-invalid @enderror" id="voi">
        </div>
        @error('voice')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <p id="a"></p>

    <button type="submit" class="bt btn btn btn-outline-primary" style="font-family:Lemonada;" style="font-weight:bold;">انشاء</button>

</form>



@endsection
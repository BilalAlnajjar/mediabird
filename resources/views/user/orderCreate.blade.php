@extends('layouts.home')
@section('content')

<script>
    b = document.getElementById('body');
    b.style.background = "#4A3274";
</script>
<div class="card orderCraete">

@if($errors->any())
    <div class="alert alert-danger er" id="close">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
    <button type="button" class="close" aria-label="Close" style="transform:translate(-3988%,-344%)" onclick="fu()">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif
    
    <div class="card-header">تقديم طلب خدمة جديدة</div>
    <div class="card-body">
        <div class="card-title">
            <h3 class="text-center title-2">طلب خدمة</h3>
        </div>
        <hr>
    <form action="{{route('order.store')}}" method="post" novalidate="novalidate">
        @csrf
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">اسم الطلب</label>
                <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class='form-group has-success'>
                <label for="serviceType" class="control-label mb-1">نوع الخدمة</label>
                <select name="serviceType" id="serviceType"  onchange='myfunction()' class="form-control cc-name vali fontawesome-select @error('serviceType') is-invalid @enderror">
                    <option >---------</option>
                    <option value="1"> &#xf144; موشن جرافيكس </option>
                    <option value="2"> &#xf2ae; لوقو </option>
                    <option value="3"> &#xf06e; الهوية البصرية </option>
                    <option value="4"> &#xf130; التعليق الصوتي </option>
                    <option value="5"> &#xf1fc; تصميم المواقع </option>
                    <option value="6"> &#xf121; برمجة المواقع </option>
                    <option value="7"> &#xf179; تصميم التطبيقات </option>
                    <option value="8"> &#xf10b; برمجة التطبيقات </option>
                </select>
                @error('serviceType')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group has-success">
                <label for="description" class="control-label mb-1">وصف مفصل عن الخدمة </label>
                <textarea id="description" name="description" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                    autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error"> </textarea>
                <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            
            <div class='form-group has-success'>
                <label for="contact" class="control-label mb-1">طريقة التواصل التي تفضلها</label>
            <select name="contact" id="contact" onchange='myfunction()' class="form-control cc-name vali fontawesome-select @error('contact') is-invalid @enderror">
                <option >---------</option>
                <option value="1"> &#xf09a; فيس بوك</option>
                <option value="2"> &#xf1fa; البريد الالكتربوني<li class="fa fa-facebook"></li></option>
                <option value="3"> &#xf232; الوتس أب <li class="fa fa-facebook"></li> </option>
                <option value="4"> &#xf2c6; التلجرام <li class="fa fa-facebook"></li></option>
            </select>
                @error('contact')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group" id="face">
                <label for="facebook" class="control-label mb-1">ادخل رابط حساب الفيس بوك الخاص بك </label>
                <input id="facebook"  type="text" class="form-control cc-number identified visa" value="" placeholder="http://www.facebook.com/example" >
                @error('facebook')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" id="mail">
                <label for="email" class="control-label mb-1">ادهل عنوان البريد الالكتروني الخاص بك </label>
                <input id="email"  type="text" class="form-control cc-number identified visa" value="" placeholder="example@gmail.com">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group" id="whats">
                <label for="whatsup" class="control-label mb-1">اخل رقم الوتس اب الخاص بك </label>
                <input id="whatsup"  type="text" class="form-control cc-number identified visa" value="">
                @error('whatsup')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div class="form-group" id="tele">
                <label for="telegram" class="control-label mb-1"> ادخل معرف التلجرام البخاص بك </label>
                <input id="telegram"  type="text" class="form-control cc-number identified visa" value="" placeholder='@exaple'>
                @error('telegram')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="price" class="control-label mb-1">الميزانية</label>
                <input id="price" name="price" type="text" class="form-control cc-number identified visa" value="" data-val="true"
                    data-val-required="ادخل الميزانية الخاصة بالعمل" data-val-cc-number="من فضلك ادخل رقم"
                    autocomplete="price">
                <span class="help-block" data-valmsg-for="price" data-valmsg-replace="true"></span>
            </div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    <i class="fa fa-lock fa-lg"></i>&nbsp;
                    <span id="payment-button-amount">رفع الطلب </span>
                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
@extends('layouts.app')

@section('title')
الملف الشخصي
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="text-center">
                    <img src="{{asset('storage/'.auth()->user()->image)}}" alt="profile" srcset="" width="82" height="82">
                    <h3>
                        {{auth()->user()->name}}
                    </h3>
                </div>
                <div class="card-body text-right" dir="rtl">
                    <form action="/profile" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name}}">
                            @error('name')
                                <div class="text-danger">
                                    <small>{{$message}}</small>
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">البريد الالكتروني</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{auth()->user()->email}}">
                            @error('email')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">كلمة المرور</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="password-confirmation">تأكيد كلمة المرور</label>
                            <input type="password" name="password_confirmation" id="password-confirmation" class="form-control">
                            @error('password-confirmation')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">تغيير الصورة الشخصية</label>
                            <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input">
                                <label for="image" id="image-lable" class="custom-file-lable text-left" data-browse="استعراض"></label>
                            </div>
                            @error('image')
                            <div class="text-danger">
                                <small>{{$message}}</small>
                            </div>
                            @enderror
                        </div>


                        <div class="form-group d-flex mt-5 flex-row-reverse">
                            <button type="submit" class="btn btn-primary mr-2">حفظ التعديلات</button>
                            <button type="submit" class="btn btn-light" form="logout">تسجيل الخروج</button>
                        </div>
                    </form>
                    <form action="/logout" id="logout" method="post">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>





















@endsection

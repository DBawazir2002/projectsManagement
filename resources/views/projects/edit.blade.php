@extends('layouts.app')

@section('title','تعديل المشروع')


@section('content')
<div class="row justfiy-content text-right">
    <div class="col-10">
        <h3 class="text-center pb-5 font-weight-bold">
            تعديل المشروع
        </h3>
    </div>

    <form action="{{route('projects.update',$project)}}" method="post">
        @method('PATCH')
        @include('projects.form')
        <div class="form-group">
            <button type="submit" class="btn btn-primary">انشاء</button>
        </div>
    </form>
</div>




@endsection

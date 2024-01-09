@extends('layouts.app')

@section('title','انشاء مشروع جديد')


@section('content')
<div class="row justfiy-content text-right">
    <div class="col-10">
        <h3 class="text-center pb-5 font-weight-bold">
            مشروع جديد
        </h3>
    </div>

    <form action="/projects" method="post">
        @include('projects.form',['project' => new App\Models\Project()])
        <div class="form-group">
            <button type="submit" class="btn btn-primary">انشاء</button>
        </div>
    </form>
</div>




@endsection

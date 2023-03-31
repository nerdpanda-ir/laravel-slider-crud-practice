@extends('layouts.master')
@section('title')
    @parent | {{$title}}
@endsection

@section('body')
@component('components.errorBagPrinter') @endcomponent
<form action="{{ route('admin.slider.update',request()->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @component('components.form-error-printer',['field' => 'title'])
    @endcomponent
    <label for="title">title</label>
    <input type="text" name="title" value="{{ old('title',$slide->title)}}" id="title">
    <hr>
    @component('components.form-error-printer',['field' => 'description'])
    @endcomponent
    <label for="description">description</label>
    <textarea id="description" name="description">
        {{old('description', $slide->description)}}
    </textarea>
    <hr>
    @component('components.form-error-printer',['field' => 'thumbnial'])
    @endcomponent
    <label for="thumbnail">thumbnail</label>
    <input type="file" name="thumbnial" id="thumbnail">
    @if(!is_null($slide->thumbnail))
        <img src="{{asset($slide->thumbnail)}}" style="width: 200px ; height: 200px">
    @else
        <h6 style="color: darkred"> has no thumbnail</h6>
    @endif
    <hr>
    @component('components.form-error-printer',['field' => 'active'])
    @endcomponent
    <label for="active">active</label>
    <input type="checkbox" name="is_active" @checked(old('is_active',$slide->is_active))>
    <hr>
    <button type="submit">update</button>
</form>
@endsection

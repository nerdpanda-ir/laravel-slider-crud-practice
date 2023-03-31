@extends('layouts.master')
@section('title')
@parent | create new slider
@endsection
@section('body')
    @component('components.errorBagPrinter')
    @endcomponent
    <form action="{{route('admin.slider.store-slide')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @component('components.form-error-printer',['field' => 'title'])
        @endcomponent
        <label for="title">title</label>
        <input type="text" name="title" value="{{ old('title')}}" id="title">
        <hr>
        @component('components.form-error-printer',['field' => 'description'])
        @endcomponent
        <label for="description">description</label>
        <textarea id="description" name="description">
        {{old('description')}}
    </textarea>
        <hr>
        @component('components.form-error-printer',['field' => 'thumbnial'])
        @endcomponent
        <label for="thumbnail">thumbnail</label>
        <input type="file" name="thumbnial" id="thumbnail">
        <hr>
        @component('components.form-error-printer',['field' => 'active'])
        @endcomponent
        <label for="active">active</label>
        <input type="checkbox" name="is_active" @checked(old('is_active'))>
        <hr>
        <button type="submit"> save </button>
    </form>
@endsection

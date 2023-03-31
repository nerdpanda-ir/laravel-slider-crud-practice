@php
    /** @var \Illuminate\Database\Eloquent\Collection $slides*/
@endphp
@extends('layouts.master')
@section('title')
@parent | Home
@endsection
@section('script')
    <script src="{{asset('js/page/home.js')}}" type="module"></script>
@endsection
@section('body')
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($slides as $key => $slider)
                <div class="swiper-slide">
                    @if(!is_null($slider->thumbnail))
                        <img src="{{ $slider->thumbnail }}">
                    @else
                        <img src="{{ asset('img/default-slider.jpg') }}">
                    @endif

                    @if(!is_null($slider->title))
                        <h2>{{ $slider->title }}</h2>
                    @endif
                    @if(!is_null($slider->description))
                        <p>{{ $slider->description }}</p>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
@endsection

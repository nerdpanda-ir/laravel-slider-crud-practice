@php
    /** @var \Illuminate\Pagination\LengthAwarePaginator $slides */
    $verta = verta();
@endphp
@extends('layouts.master')
@section('title')
    @parent | {{$title}}
@endsection
@section('body')
    @include('partials.message-printer')
    @if($slides->isNotEmpty())
        <h4>total : {{$slides->total()}}</h4>
        <section class="actions">
            <form action="{{route('admin.slider.delete-all-sliders')}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </section>
        <section class="content">
            <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>thumbnail</th>
                    <th>title</th>
                    <th>description</th>
                    <th>is active</th>
                    <th>created date</th>
                    <th>updated date</th>
                    <th>actions</th>
                </tr>
            </thead>
             <tbody>
                @foreach($slides->items() as $key=>$slide)
                    @php
                        /** @var \App\Models\Slider $slide*/
                    @endphp
                    <tr>
                        <td>{{$key}}</td>
                        <td>
                            @unless(is_null($slide->thumbnail))
                                <img src="{{asset($slide->thumbnail)}}" alt="" style="width: 128px; height: 128px">
                            @else
                                <h6>no image</h6>
                            @endif
                        </td>
                        <td>
                            {{$slide->title}}
                        </td>
                        <td>
                            {{$slide->description}}
                        </td>
                        <td>
                            @if($slide->is_active)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td>
                            @unless(is_null($slide->created_at))
                                {{$slide->created_at}}
                                <hr>
                                {{$slide->jalali_created_at}}
                                <hr>
                                {{$slide->jalali_created_at->formatDifference()}}
                            @endunless
                            {{--
                            @unless(is_null($slide->created_at))
                                {{ $slide->created_at}}
                                <hr>
                                @php
                                    $timeStamp = strtotime($slide->created_at);
                                    $verta->setTimestamp($timeStamp);
                                @endphp
                                {{ $verta->formatDatetime() }}
                                <hr>
                                {{ $verta->formatDifference() }}
                            @endunless
                            --}}
                        </td>
                        <td>
                            @unless(is_null($slide->updated_at))
                                {{$slide->updated_at}}
                                <hr>
                                {{$slide->jalali_updated_at}}
                                <hr>
                                {{$slide->jalali_updated_at->formatDifference()}}
                            @endunless
                            {{--
                            @unless(is_null($slide->updated_at))
                                {{ $slide->updated_at }}
                                <hr>
                                @php
                                    $timeStamp = strtotime($slide->updated_at);
                                    $verta->setTimestamp($timeStamp);
                                @endphp
                                {{ $verta->formatDatetime() }}
                                <hr>
                                {{ $verta->formatDifference() }}
                            @endunless
                            --}}
                        </td>
                        <td>
                            <a href="{{ route('admin.slider.edit',$slide->id) }}">edit</a>
                            <form action="{{route('admin.slider.trash-slide',$slide->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit"> trash </button>
                            </form>
                            <a href="">
                                <form action="{{route('admin.slider.delete-slide',$slide->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"> Delete </button>
                                </form>
                            </a>
                        </td>
                    </tr>
                @endforeach
             </tbody>
        </table>
            {{ $slides->links("pagination::bootstrap-4") }}
        </section>
    @else
        <h1> no record found </h1>
    @endif
@endsection

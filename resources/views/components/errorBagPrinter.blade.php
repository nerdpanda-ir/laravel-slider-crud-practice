@if($errors->any())
    <ul style="color: darkred ; background-color: lightcoral">
        @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
        @endforeach
    </ul>
@endif

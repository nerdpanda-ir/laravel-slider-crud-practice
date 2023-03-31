@if(session()->has('messages.fail'))
    @component('components.error-message-printer')
        @slot('items',session()->get('messages.fail'))
    @endcomponent
@endif
@if(session()->has('messages.ok'))
    @component('components.success-message-printer')
        @slot('items',session()->get('messages.ok'))
    @endcomponent
@endif


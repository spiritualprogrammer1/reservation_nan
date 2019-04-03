@component('user_mac.activities.created_reservation')
    @slot('heading')
        {{auth()->user()->name}} le 
    @endslot

    @slot('body')
          
    @endslot
@endcomponent
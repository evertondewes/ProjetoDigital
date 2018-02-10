@auth
    @backend
        @include ('layouts.backend-sidebar')
    @endbackend

    @customer
        @include ('layouts.customer-sidebar')
    @endcustomer
@else
    @include ('layouts.guest-sidebar')
@endauth

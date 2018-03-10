@extends ('layouts.master')

@section ('title', 'Minha conta')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8">
            @include ('layouts.status')

            <div class="card">
                <div class="card-header bg-white text-center">
                    Minha conta
                </div>

                <div class="card-body">
                    @yield('profile-content')
                </div>
            </div>
        </div>

        @include ('profiles.menu')
    </div>
@endsection

@extends ('layouts.master')

@section ('title', 'Exibir projeto')

@section ('content')
    <div class="row my-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white text-center">
                    {{ $project->projectType->description }}
                </div>

                <div class="card-body">
                    @include ('layouts.projects.info')
                </div>
            </div>
        </div>

        @include ('customer.projects.menu')
    </div>
@endsection

@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">

         @include('partials.search')

    </div>


    <div class="container-fluid">
    
        @include('partials.grid3')

    </div>

</div>
@endsection

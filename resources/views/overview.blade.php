@extends('layouts.app')

@section('title', 'Pet Overview')

@section('content')
    <a class="text-start text-black text-decoration-none" href="{{ route('home') }}"><i class="ph ph-arrow-left"></i> Back</a>
    <h3 class="mb-4">Do you think the breed {{ $breedName }} suits you? Let's take a look!</h3>

    <img class="mb-4 w-25" src="{{ $breedImage }}" alt="{{ $breedName }}">

    <p>The breed {{ $breedName }} comes from {{ $origin }} and is bred for {{ $bredFor }}, this breed has a temperament of {{ $temperament }} and belongs to the breed {{ $breedGroup }} and has a life span of {{ $lifeSpan }}</p>
@endsection

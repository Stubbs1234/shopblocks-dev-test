@extends('layouts.app')

@section('title', 'Pet Overview')

@section('content')
    <a class="text-start text-black text-decoration-none" href="{{ route('home') }}"><i class="ph ph-arrow-left"></i> Back</a>
    <h3 class="mb-4">Do you think the breed {{ $breedName }} suits you? Let's take a look!</h3>

    <img class="mb-4 w-25" src="{{ $breedImage }}" alt="{{ $breedName }}">

    <table class="table table-bordered">
        <tr>
            <td>Breed Name</td><td>{{ $breedName }}</td>
        </tr>
        @if ($origin != null)
            <tr>
                <td>Origin</td><td>{{ $origin }}</td>
            </tr>
        @endif
        @if ($bredFor != null)
            <tr>
                <td>Bred For</td><td>{{ $bredFor }}</td>
            </tr>
        @endif
        @if ($temperament != null)
            <tr>
                <td>Temperament</td><td>{{ $temperament }} </td>
            </tr>
        @endif
        @if ($breedGroup != null)
            <tr>
                <td>Breed Group</td><td>{{ $breedGroup }} </td>
            </tr>
        @endif
        @if ($lifeSpan != null)
            <tr>
                <td>Life Span</td><td>{{ $lifeSpan }} </td>
            </tr>
        @endif

    </table>
@endsection

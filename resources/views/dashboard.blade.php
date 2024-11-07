@extends('layouts.app')

@section('title', 'Home')

@push('style')
    <style>
        #searchInput {
            padding: 10px 22px;
            border-color: var(--primary-bg-color-dark);
            min-width: 350px;
        }

        .searchInput-icon {
            right: 22px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
@endpush

@section('content')
    <h3 class="typewriter mb-4">
        <span id="typewriterText">What pet are you looking for?</span>
    </h3>

    <form class="d-flex justify-content-center w-100" style="max-width: 800px;">
        <div class="position-relative w-100">
            <input id="searchInput" class="form-control me-2 rounded-5 form-control-lg" type="search" placeholder="Search" aria-label="Search" value="">
            <i class="ph ph-magnifying-glass position-absolute searchInput-icon"></i>
        </div>
    </form>

    <div class="mt-4">
        <ul class="list-unstyled" id="results"></ul>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('searchInput').focus();

            const titles = [
                "Looking for a Dog Breed?",
                "What Dog Breed Fits You?",
                "Discover Rare Dog Breeds",
                "Which Breed is Right for Your Family?",
                "Discover Dogs by Size and Temperament"
            ];

            const randomTitle = titles[Math.floor(Math.random() * titles.length)];
            document.getElementById('typewriterText').textContent = randomTitle;
        });

        document.addEventListener('keyup', function () {
            let breed = document.getElementById('searchInput');

            axios.get('/get-pet-breed?', {params: {breed: breed.value}}).then(response => {
                displayOutput(response.data);
            });
        })

        function displayOutput(dogs) {
            let resultsDisplay = document.getElementById('results')

            while (resultsDisplay.lastElementChild) {
                resultsDisplay.removeChild(resultsDisplay.lastElementChild);
            }

            dogs.forEach(dog => {
                let li = document.createElement('li');
                let a = document.createElement('a');
                let link = document.createTextNode(dog.name);
                a.appendChild(link);
                a.title = dog.name;
                a.href = "/pet-overview/"+dog.reference_image_id;
                li.append(a)
                resultsDisplay.append(li)
            })
        }

    </script>
@endpush

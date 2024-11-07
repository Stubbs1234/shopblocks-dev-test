<?php

namespace App\Http\Controllers;

use App\Services\DogApi;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController
{
    public function __construct(protected DogApi $dogApi) {}

    public function index(): View
    {
        return view('dashboard');
    }

    public function getPetBreeds(Request $request): ?array
    {
        if ($request->has('breed')) {
           $breed = $request->get('breed');

            return $this->dogApi->getBreedsByQuery($breed);
        }

        return null;
    }
}

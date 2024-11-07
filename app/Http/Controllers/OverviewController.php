<?php

namespace App\Http\Controllers;

use App\Services\DogApi;
use Illuminate\Http\Client\ConnectionException;

class OverviewController
{
    public function __construct(protected DogApi $dogApi) {}

    /**
     * @throws ConnectionException
     */
    public function index(string $breedImageId)
    {
        $breed = $this->dogApi->getBreedInfo($breedImageId);
        $breedInfo = $breed['breeds'][0];

        return view('overview', [
            'breedName' => (isset($breedInfo['name'])) ? $breedInfo['name'] : '',
            'temperament' => (isset($breedInfo['temperament'])) ? $breedInfo['temperament'] : null,
            'origin' => (isset($breedInfo['origin'])) ? $breedInfo['origin'] : null,
            'lifeSpan' =>  (isset($breedInfo['life_span'])) ? $breedInfo['life_span'] : null,
            'bredFor' => (isset($breedInfo['bred_for'])) ? $breedInfo['bred_for'] : null,
            'breedGroup' => (isset($breedInfo['breed_group'])) ? $breedInfo['breed_group'] : null,
            'breedImage' => (isset($breed['url'])) ? $breed['url'] : null,
        ]);
    }

}

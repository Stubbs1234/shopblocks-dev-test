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
            'breedName' => $breedInfo['name'],
            'temperament' => $breedInfo['temperament'],
            'origin' => $breedInfo['origin'],
            'lifeSpan' =>  $breedInfo['life_span'],
            'bredFor' => $breedInfo['bred_for'],
            'breedGroup' => $breedInfo['breed_group'],
            'breedImage' => $breed['url'],
        ]);
    }

}

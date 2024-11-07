<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class DogApi
{

    /**
     * @throws ConnectionException
     */
    public function listBreeds(): ?array
    {
        $response = Http::withHeaders(['x-api-key', config('services.thedogapi.key')])
            ->get('https://api.thedogapi.com/v1/breeds');

        if ($response->successful()) {
            return json_decode($response->body());
        }

        return null;
    }
    public function getBreedsByQuery(string $query): ?array
    {
        $response = Http::get('https://api.thedogapi.com/v1/breeds/search', [
            'q' => $query
        ]);

        if ($response->successful()) {
            return json_decode($response->body());
        }

        return null;
    }

    /**
     * @throws ConnectionException
     */
    public function getBreed(int $breedId): ?array
    {
        $response = Http::withHeaders(['x-api-key', config('services.thedogapi.key')])
            ->get(sprintf('https://api.thedogapi.com/v1/breeds/%d', $breedId));

        if ($response->successful()) {
            return json_decode($response->body(), true);
        }

        return null;
    }

    /**
     * @throws ConnectionException
     */
    public function getBreedInfo(string $imageId): ?array
    {
        $response = Http::withHeaders(['x-api-key', config('services.thedogapi.key')])->get(sprintf('https://api.thedogapi.com/v1/images/%s', $imageId));

        if ($response->successful()) {
            return json_decode($response->body(), true);
        }

        return null;
    }
}

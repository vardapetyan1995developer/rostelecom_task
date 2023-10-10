<?php

namespace App\Services;

use App\Models\Service;
use App\Models\ServicesCompatibility;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class RosTelecomService
{
    /**
     * @return Collection
     */
    public function getAllServices(): Collection
    {
        return Service::query()->orderByDesc('id')->get();
    }

    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getAllServicesPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return Service::query()->orderByDesc('id')->paginate($perPage);
    }

    /**
     * @param string $sortDirection
     * @param string $column
     * @return Collection
     */
    public function getSuggestedServices(string $sortDirection = 'asc', string $column = 'id'): Collection
    {
        return Service::query()->orderBy($column, $sortDirection)->get();
    }

    /**
     * @return Collection
     */
    public function getDisabledServices(): Collection
    {
        return ServicesCompatibility::query()->with('services')->get();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function createService(array $data): bool
    {
        $result = false;

        $service = Service::query()->create([
            'name' => $data['name'],
            'content' => $data['content']
        ]);

        if ($service) $result = true;

        return $result;
    }

    /**
     * @param Service $service
     * @param array $data
     * @return bool
     */
    public function updateService(Service $service, array $data): bool
    {
        $result = false;

        if ($service->update(['name' => $data['name'], 'content' => $data['content']]))
            $result = true;

        return $result;
    }
}

<?php

namespace App\Repositories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

class TodoRepository
{
    public function getTasksForProvider(int $providerId, array $levels): Collection
    {
        return Todo::where('provider_id', $providerId)
            ->whereIn('level', $levels)
            ->orderByDesc('level')
            ->orderByDesc('estimated_duration')
            ->get();
    }
}

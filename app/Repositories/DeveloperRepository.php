<?php

namespace App\Repositories;

use App\Models\Developer;
use Illuminate\Support\Collection;

class DeveloperRepository
{
    public function getAllDevelopers(): Collection
    {
        return Developer::orderByDesc('level')->get();
    }
}

<?php

namespace App\Services;

use App\Models\Slot;
use Illuminate\Support\Collection;

class AvailabilityServices
{
    /**
     * @param $date
     * @return Collection
     */
    public function getSlots($date): Collection
    {
        return Slot::where('date', $date)
            ->where('is_active', true)
            ->where('is_booked', false)
            ->orderBy('start_time')
            ->get(['date', 'start_time', 'end_time']);
    }
}
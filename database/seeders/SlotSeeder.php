<?php

namespace Database\Seeders;

use App\Models\Slot;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SlotSeeder extends Seeder
{
    public function run(): void
    {
        $startDate = Carbon::today();
        $daysToSeed = 5; // next 5 days

        for ($i = 0; $i < $daysToSeed; $i++) {
            $date = $startDate->copy()->addDays($i)->toDateString();

            $startTime = Carbon::createFromTime(10, 0);
            $endTime   = Carbon::createFromTime(13, 0);

            while ($startTime < $endTime) {
                Slot::firstOrCreate([
                    'date' => $date,
                    'start_time' => $startTime->format('H:i:s'),
                    'end_time' => $startTime->copy()->addMinutes(30)->format('H:i:s'),
                ], [
                    'is_active' => true
                ]);

                $startTime->addMinutes(30);
            }
        }
    }
}

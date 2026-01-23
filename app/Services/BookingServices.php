<?php

namespace App\Services;

use App\Jobs\SendBookingConfirmationJob;
use App\Models\AvailabilitySlot;
use App\Models\Booking;
use App\Models\Slot;
use App\Models\User;

class BookingServices
{
    /**
     * @param $params
     * @return array
     */
    public function bookSlot($params): array
    {
        $slot = Slot::where([
            'date' => $params['date'],
            'start_time' => $params['start_time'],
            'is_active' => true,
            'is_booked' => false
        ])->first(['id', 'date', 'start_time', 'end_time']);

        if (empty($slot)) {
            return ['message' => 'Slot not available or already Booked'];
        }

        $user = User::firstOrCreate(['email' => $params['email']], ['name' => $params['name']]);
        $booking = Booking::create(['user_id' => $user->id, 'slot_id' => $slot->id]);
        $slot->update(['is_booked' => true]);
        SendBookingConfirmationJob::dispatch([
            'name' => $params['name'],
            'email' => $params['email'],
            'date' => $slot->date,
            'start_time' => $slot->start_time,
            'end_time' => $slot->end_time,
        ]);
        return ['message' => 'Booking confirmed', 'booking_id' => $booking->id ?? ''];
    }
}
<?php

namespace App\Jobs;

use App\Mail\BookingConfirmationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendBookingConfirmationJob
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var array
     */
    protected array $booking;

    /**
     * @param array $booking
     */
    public function __construct(array $booking)
    {
        $this->booking = $booking;
    }

    /**
     * @return void
     */
    public function handle()
    {
        Mail::to($this->booking['email'])
            ->send(new BookingConfirmationMail($this->booking));
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var array
     */
    public array $booking;

    /**
     * @param array $booking
     */
    public function __construct(array $booking)
    {
        $this->booking = $booking;
    }

    /**
     * @return \Illuminate\Mail\Mailable
     */
    public function build()
    {
        return $this->subject('Your Booking is Confirmed')
            ->view('emails.booking-confirmation')
            ->with($this->booking);
    }
}

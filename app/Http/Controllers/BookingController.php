<?php

namespace App\Http\Controllers;

use App\Services\BookingServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * @var BookingServices
     */
    private BookingServices $bookingServices;

    /**
     * BookingController constructor.
     * @param BookingServices $bookingServices
     */
    public function __construct(BookingServices $bookingServices)
    {
        $this->bookingServices = $bookingServices;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i:s',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 401);
        }
        $response = $this->bookingServices->bookSlot($request->all());
        return response()->json($response);
    }
}

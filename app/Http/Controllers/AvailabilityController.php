<?php

namespace App\Http\Controllers;

use App\Services\AvailabilityServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AvailabilityController extends Controller
{
    /**
     * @var AvailabilityServices
     */
    private AvailabilityServices $availabilityServices;

    /**
     * AvailabilityController constructor.
     * @param AvailabilityServices $availabilityServices
     */
    public function __construct(AvailabilityServices $availabilityServices)
    {
        $this->availabilityServices = $availabilityServices;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), ['date' => 'required|date']);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $response = $this->availabilityServices->getSlots($request->date);
        return response()->json(['date' => $request->date, 'slots' => $response]);
    }
}

<?php
namespace App\Http\Controllers\fornt;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('Frontend.reservation');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'full_name'         => 'required|string|max:255',
                'email'             => 'nullable|email|max:255',
                'number_of_persons' => 'required|integer|min:1',
                'phone'             => 'required|string|max:15',
                'check_in_date'     => 'required|date',
                'check_in_time'     => 'required',
            ]);

            // Uncomment the following line if you want to save the reservation
            $reservation = Reservation::create([
                'full_name'         => $request->full_name,
                'email'             => $request->email,
                'number_of_persons' => $request->number_of_persons,
                'phone'             => $request->phone,
                'check_in_date'     => date('Y-m-d',strtotime($request->check_in_date)),
                'check_in_time'     => date('H:i:s',strtotime($request->check_in_time)),
                //'message'           => $request->message,
            ]);
             if(!$reservation) {
                return response()->json(['message' => 'Reservation failed', 'status' => 401]);
             }
            // Uncomment the following line if you want to send a confirmation email
            // Mail::to($request->email)->send(new ReservationConfirmation($reservation));
            // Uncomment the following line if you want to send a notification
            // Notification::send($reservation, new ReservationNotification($reservation));

            return response()->json(['message' => 'Reservation created successfully','url' => url('/'), 'status' => 200]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors(), 'status' => 422]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred', 'error' => $e->getMessage(), 'status' => 500]);
        }
    }
}

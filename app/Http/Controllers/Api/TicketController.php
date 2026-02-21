<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\TicketStoreRequest;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;

class TicketController extends Controller
{
    public function store(TicketStoreRequest $request)
    {
        $validated = $request->validated();

        $customer = Customer::updateOrCreate(
            ['email' => $validated['customer_email']],
            [
                'name'  => $validated['customer_name'],
                'phone' => $validated['phone']
            ]
        );

        $ticket = $customer->tickets()->create([
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'status'  => 'new',
        ]);

        if ($request->hasFile('attachment')) {
            $ticket->addMediaFromRequest('attachment')->toMediaCollection('tickets');
        }

        return response()->json([
            'message' => "Заявка №{$ticket->id} принята!",
        ], 201);
    }

    public function statistics(): JsonResponse
    {
        return response()->json([
            'daily' => [
                'total'   => Ticket::lastDay()->count(),
                'new'     => Ticket::lastDay()->where('status', 'new')->count(),
                'resolved'=> Ticket::lastDay()->where('status', 'resolved')->count(),
            ],
            'weekly' => [
                'total'   => Ticket::lastWeek()->count(),
                'new'     => Ticket::lastWeek()->where('status', 'new')->count(),
                'resolved'=> Ticket::lastWeek()->where('status', 'resolved')->count(),
            ],
            'monthly' => [
                'total'   => Ticket::lastMonth()->count(),
                'new'     => Ticket::lastMonth()->where('status', 'new')->count(),
                'resolved'=> Ticket::lastMonth()->where('status', 'resolved')->count(),
            ],
        ]);
    }
}

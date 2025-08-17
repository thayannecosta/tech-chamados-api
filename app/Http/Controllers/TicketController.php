<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Ticket::query();

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        if ($request->filled('priority')) {
            $query->where('priority', $request->string('priority'));
        }

        if ($request->filled('search')) {
            $search = $request->string('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $perPage = (int) $request->get('perPage', 10);

        return TicketResource::collection(
            $query->latest()->paginate($perPage)->appends($request->query())
        );
    }

    public function store(StoreTicketRequest $request)
    {
        $ticket = Ticket::create([
            'title' => $request->string('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status', 'open'),
            'priority' => $request->input('priority', 'medium'),
        ]);

        return (new TicketResource($ticket))
            ->additional(['msg' => 'success'])
            ->response()
            ->setStatusCode(201);
    }

    public function show(Ticket $ticket)
    {
        return new TicketResource($ticket);
    }

    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->fill($request->validated());
        $ticket->save();

        return (new TicketResource($ticket))
            ->additional(['msg' => 'success']);
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return response()->json(['msg' => 'success']);
    }
}
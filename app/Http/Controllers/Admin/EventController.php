<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Event::class, 'event');
    }

    public function index()
    {
        return view('admin.events.index', [
            'events' => Event::with('user')->latest()->paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'location' => ['nullable', 'string', 'max:255'],
        ]);

        Event::create(array_merge($validated, [
            'user_id' => auth()->id(),
        ]));

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil dibuat.');
    }

    public function show(Event $event)
    {
        return view('admin.events.show', [
            'event' => $event->load('user'),
        ]);
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', [
            'event' => $event,
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'location' => ['nullable', 'string', 'max:255'],
        ]);

        $event->update($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Motel;

use App\Http\Controllers\Controller;
use App\Models\Motel\Room;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoomController extends Controller
{
    public function index(): View
    {
        return view('motel.rooms.index', [
            'rooms' => Room::orderBy('id', 'desc')->get(),
        ]);
    }

    public function create(): View
    {
        return view('motel.rooms.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'capacity' => ['required', 'integer', 'min:1'],
            'status' => ['required', 'in:available,occupied,maintenance'],
        ]);

        Room::create($data);

        return redirect()->route('motel.rooms.index')->with('success', 'Tao phong thanh cong.');
    }

    public function edit(Room $room): View
    {
        return view('motel.rooms.edit', [
            'room' => $room,
        ]);
    }

    public function update(Request $request, Room $room): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'capacity' => ['required', 'integer', 'min:1'],
            'status' => ['required', 'in:available,occupied,maintenance'],
        ]);

        $room->update($data);

        return redirect()->route('motel.rooms.index')->with('success', 'Cap nhat phong thanh cong.');
    }

    public function destroy(Room $room): RedirectResponse
    {
        $room->delete();

        return redirect()->route('motel.rooms.index')->with('success', 'Xoa phong thanh cong.');
    }
}

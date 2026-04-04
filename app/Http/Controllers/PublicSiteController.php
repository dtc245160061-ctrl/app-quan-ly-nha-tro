<?php

namespace App\Http\Controllers;

use App\Models\Room;

class PublicSiteController extends Controller
{
    public function index()
    {
        $rooms = Room::with('roomType')
            ->where('status', 'active')
            ->orderBy('room_name')
            ->get();

        $availableRooms = $rooms->filter(function ($room) {
            return (int) $room->quantity < (int) $room->occupancy;
        })->values();

        return view('public.home', [
            'rooms' => $rooms,
            'availableRooms' => $availableRooms,
        ]);
    }

    public function roomDetail($id)
    {
        $room = Room::with('roomType')->findOrFail($id);

        return view('public.room-detail', [
            'room' => $room,
        ]);
    }
}

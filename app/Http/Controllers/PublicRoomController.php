<?php

namespace App\Http\Controllers;

use App\Models\Motel\Room;
use Illuminate\View\View;

class PublicRoomController extends Controller
{
    public function index(): View
    {
        return view('public.rooms.index', [
            'rooms' => Room::where('status', 'available')->orderBy('name')->get(),
        ]);
    }
}

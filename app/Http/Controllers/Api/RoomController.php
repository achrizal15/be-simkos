<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoomResource;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $rooms = Room::with('features')-> when($request->has('withTrash'), function ($query) use ($request) {
            if ($request->withTrash == 'true') {
                return $query->withTrashed();
            }
            return $query;
        })
            ->when($request->has('minPrice'), function ($query) use ($request) {
                return $query->where('price', '>=', $request->minPrice);
            })
            ->when($request->has('maxPrice'), function ($query) use ($request) {
                return $query->where('price', '<=', $request->maxPrice);
            })
            ->when($request->has('type'), function ($query) use ($request) {
                return $query->where('type', $request->type);
            })
            ->when($request->has('search'), function ($query) use ($request) {
                return $query->where(function ($query) use ($request) {
                    return $query->where('name', 'like', '%' . $request->search . '%');
                });
            })
            ->latest()
            ->paginate(12);
        return RoomResource::collection($rooms);
    }

    public function show($id)
    {
        $room = Room::with('features')->find($id);
        if (!$room) {
            return response()->json(['message' => 'Room not found'], 404);
        }
        return new RoomResource($room);
    }

    public function destroy($id)
    {
        $room = Room::find($id);
        if (!$room) {
            return response()->json(['message' => 'Room not found'], 404);
        }
        $room->delete();
        return response()->json(['message' => 'Room deleted successfully'], 200);
    }
    public function store(CreateRoomRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $filePath = $file->store('/rooms');
            $validatedData['image_path'] = $filePath;
        }
        $room = Room::create($validatedData);
        if (isset($validatedData['features_id'])) {
            $room->features()->sync($validatedData['features_id']);
        }
        return new RoomResource($room->load('features'));
    }
    public function update(UpdateRoomRequest $request, $id)
    {
        $room = Room::find($id);

        if (!$room) {
            return response()->json(['message' => 'Room not found'], 404);
        }

        $validatedData = $request->validated();
        unset($validatedData['image_path']);
        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $filePath = $file->store('/rooms');
            $validatedData['image_path'] = $filePath;
        }
        $room->update($validatedData);
        if (isset($validatedData['features_id'])) {
            $room->features()->sync($validatedData['features_id']);
        }
        return new RoomResource($room->load('features'));
    }
    public function restore($id)
    {
        $room = Room::withTrashed()->find($id);

        if (!$room) {
            return response()->json(['message' => 'Room not found'], 404);
        }

        // Periksa apakah kamar sudah dihapus
        if (!$room->trashed()) {
            return response()->json(['message' => 'Room is not deleted'], 400);
        }

        $room->restore();

        return response()->json(['message' => 'Room restored successfully'], 200);
    }
}
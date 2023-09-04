<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeatureRequest;
use App\Http\Resources\FeatureResource;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index(Request $request)
    {
        $features = Feature::when($request->has('withTrash'), function ($query) use ($request) {
            if ($request->withTrash == 'true') {
                return $query->withTrashed();
            }
            return $query;
        })->latest()->paginate(10);
        return FeatureResource::collection($features);
    }
    public function destroy($id)
    {
        $feature = Feature::findOrFail($id);
        $feature->delete();

        return response()->json(['message' => 'Feature deleted successfully']);
    }
    public function show($id)
    {
        $feature = Feature::findOrFail($id);
        return new FeatureResource($feature);
    }
    public function restore($id)
    {
        $feature = Feature::withTrashed()->findOrFail($id);

        if ($feature->trashed()) {
            $feature->restore();
            return response()->json(['message' => 'Feature restored successfully']);
        } else {
            return response()->json(['message' => 'Feature is not deleted'], 400);
        }
    }
    public function store(FeatureRequest $request)
    {
        // Memvalidasi input menggunakan FeatureRequest
        $validatedData = $request->validated();
        // Menyimpan fitur ke dalam database
        $feature = Feature::create($validatedData);

        return (new FeatureResource($feature))
        ->additional(['message' => 'Feature updated successfully']);
    }

    public function update(FeatureRequest $request, $id)
    {
        $feature = Feature::findOrFail($id);
        // Memvalidasi input menggunakan FeatureRequest
        $validatedData = $request->validated();
        // Memperbarui fitur
        $feature->update($validatedData);
        return (new FeatureResource($feature))
        ->additional(['message' => 'Feature updated successfully']);
    }
}
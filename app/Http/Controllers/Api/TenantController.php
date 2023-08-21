<?php

namespace App\Http\Controllers\Api;

use App\Models\Tenant;
use App\Http\Controllers\Controller;
use App\Http\Resources\TenantResource;
use App\Http\Requests\CreateTenantRequest;
use App\Http\Requests\UpdateTenantRequest;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::latest()->withTrashed()->paginate(10);
        return TenantResource::collection($tenants);
    }
    public function destroy($id)
    {
        $tenant = Tenant::findOrFail($id);
        $tenant->delete();

        return response()->json(['message' => 'Tenant deleted successfully']);
    }
    public function show($id)
    {
        $tenant = Tenant::findOrFail($id);
        return new TenantResource($tenant);
    }

    public function store(CreateTenantRequest $request)
    {
        $validatedData = $request->validated();

        $tenant = Tenant::create($validatedData);

        return (new TenantResource($tenant))
            ->additional(['message' => 'Tenant created successfully']);
    }
    public function update(UpdateTenantRequest $request, $id)
    {
        $tenant = Tenant::findOrFail($id);
        $validatedData = $request->validated();

        $tenant->update($validatedData);

        return (new TenantResource($tenant))
            ->additional(['message' => 'Tenant updated successfully']);
    }
    public function restore($id)
    {
        $tenant = Tenant::withTrashed()->findOrFail($id);

        if ($tenant->trashed()) {
            $tenant->restore();
            return response()->json(['message' => 'Tenant restored successfully']);
        } else {
            return response()->json(['message' => 'Tenant is not deleted'], 400);
        }
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TenantResource;
use App\Http\Requests\CreateTenantRequest;
use App\Http\Requests\UpdateTenantRequest;

class TenantController extends Controller
{
    public function index(Request $request)
    {
        $tenants = Tenant::when($request->has('withTrash'), function ($query) use ($request) {
            if ($request->withTrash == 'true') {
                return $query->withTrashed();
            }
            return $query;
        })
            ->when($request->has('sortOrder') && $request->has('sortField'), function ($query) use ($request) {
                return $query->orderBy($request->sortField, $request->sortOrder > 0 ? 'ASC' : 'DESC');
            })
            ->when($request->has('search'), function ($query) use ($request) {
                return $query->where(function ($query) use ($request) {
                    return $query->where('name', 'like', '%' . $request->search . '%')
                        ->orWhere('phone', 'like', '%' . $request->search . '%')
                        ->orWhere('email', 'like', '%' . $request->search . '%');
                });
            })
            ->paginate(10);
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
        if ($request->hasFile('identification_document_filename')) {
            $file = $request->file('identification_document_filename');
            $filePath = $file->store('/tenant_documents');
            $validatedData['identification_document_filename'] = $filePath;
        }
        $tenant = Tenant::create($validatedData);

        return (new TenantResource($tenant))
            ->additional(['message' => 'Tenant created successfully']);
    }
    public function update(UpdateTenantRequest $request, $id)
    {
        $tenant = Tenant::findOrFail($id);
        $validatedData = $request->validated();
        try {
            unset($validatedData['identification_document_filename']);
            if ($request->hasFile('identification_document_filename')) {
                $file = $request->file('identification_document_filename');
                $filePath = $file->store('/tenant_documents');
                $validatedData['identification_document_filename'] = $filePath;
            }
            $tenant->update($validatedData);
    
            return (new TenantResource($tenant))
                ->additional(['message' => 'Tenant updated successfully']);
        } catch (\Throwable $th) {
            return throw $th;
        }
       
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
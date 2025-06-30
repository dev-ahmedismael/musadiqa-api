<?php

namespace App\Http\Controllers\Tenant\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tenant\Products\WarehouseRequest;
use App\Models\Tenant\Products\Warehouse;
use App\Traits\QueryBuilder;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    use QueryBuilder;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Warehouse::query();
        $data = $this->applyQuery($request, $query);

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WarehouseRequest $request)
    {
        try {
            $warehouse = Warehouse::create($request->validated());

            return response()->json([
                'message' => 'تم إضافة المستودع بنجاح.',
                'data' => $warehouse
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'حدث خطأ أثناء إضافة المستودع.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $warehouse = Warehouse::findOrFail($id);

        return response()->json(['data' => $warehouse], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WarehouseRequest $request, string $id)
    {
        $warehouse = Warehouse::findOrFail($id);

        $warehouse->update($request->validated());

        return response()->json(['message' => 'تم تعديل بيانات المستودع بنجاح.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $ids = $request->input('ids');

        if (!is_array($ids)) {
            return response()->json(['error' => 'Invalid request format'], 422);
        }

        Warehouse::destroy($ids);

        return response()->json(['message' => 'تم حذف المستودع بنجاح.']);
    }
}

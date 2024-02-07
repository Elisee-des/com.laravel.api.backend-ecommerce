<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::all();
        return response()->json($orderItems);
    }

    public function show($id)
    {
        try {
            $orderItem = OrderItem::findOrFail($id);
            return response()->json($orderItem);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Élément de commande non trouvé.'], 404);
        }
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'order_id' => 'required|integer',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer',
            'total' => 'required|numeric',
        ]);

        try {
            $orderItem = OrderItem::create($request->all());
            return response()->json($orderItem, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la création de l\'élément de commande.'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'order_id' => 'integer',
            'product_id' => 'integer',
            'quantity' => 'integer',
            'total' => 'numeric',
        ]);

        try {
            $orderItem = OrderItem::findOrFail($id);
            $orderItem->update($request->all());
            return response()->json($orderItem);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la mise à jour de l\'élément de commande.'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $orderItem = OrderItem::findOrFail($id);
            $orderItem->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la suppression de l\'élément de commande.'], 500);
        }
    }
}

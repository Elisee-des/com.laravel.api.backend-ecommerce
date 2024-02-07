<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }

    public function show($id)
    {
        try {
            $order = Order::findOrFail($id);
            return response()->json($order);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Commande non trouvée.'], 404);
        }
    }

    // public function store(Request $request)
    // {
    //     // Validation des données
    //     $request->validate([
    //         'customer_email' => 'required|email',
    //         'total' => 'required|numeric',
    //     ]);

    //     try {
    //         $order = Order::create($request->all());
    //         return response()->json($order, 201);
    //     } catch (\Exception $e) {
    //         return response()->json(['message' => 'Erreur lors de la création de la commande.'], 500);
    //     }
    // }

    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'customer_email' => 'email',
            'total' => 'numeric',
        ]);

        try {
            $order = Order::findOrFail($id);
            $order->update($request->all());
            return response()->json($order);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la mise à jour de la commande.'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la suppression de la commande.'], 500);
        }
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'customer_email' => 'required|email',
            'products' => 'required|array|min:1',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        try {
            return DB::transaction(function () use ($request) {
                // Créer la commande
                $order = Order::create([
                    'customer_email' => $request->input('customer_email'),
                    'total' => 0, // Initialiser le total à 0
                ]);

                // Ajouter les produits à la commande
                foreach ($request->input('products') as $productData) {
                    $product = Product::findOrFail($productData['product_id']);
                    $total = $product->product_price * $productData['quantity'];

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $productData['quantity'],
                        'total' => $total,
                    ]);

                    // Mettre à jour le total de la commande
                    $order->total += $total;
                }

                $order->save();
                
                $order->load('order_items.product');

                return response()->json($order, 201);
            });
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la création de la commande.'], 500);
        }
    }
}

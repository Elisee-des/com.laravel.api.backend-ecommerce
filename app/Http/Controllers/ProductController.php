<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);
            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Produit non trouvé.'], 404);
        }
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'product_name' => 'required|string|max:100',
            'product_category' => 'required|string|max:100',
            'product_description' => 'required|string',
            'product_price' => 'required|numeric',
            'product_stock' => 'required|integer',
            'product_image' => 'required|url',
        ]);

        try {
            $product = Product::create($request->all());
            return response()->json($product, 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la création du produit.'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'product_name' => 'string|max:100',
            'product_category' => 'string|max:100',
            'product_description' => 'string',
            'product_price' => 'numeric',
            'product_stock' => 'integer',
            'product_image' => 'url',
        ]);

        try {
            $product = Product::findOrFail($id);
            $product->update($request->all());
            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la mise à jour du produit.'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur lors de la suppression du produit.'], 500);
        }
    }
}

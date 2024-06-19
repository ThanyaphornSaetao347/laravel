<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all(); // ดึงข้อมูลทั้งหมดในตาราง 'products' โดยใช้โมเดล Product
        return view('product', compact('products')); //ส่งข้อมูลสินค้าที่ได้มาจากขั้นตอนก่อนหน้านี้ไปยังหน้าเว็บที่ชื่อ 'product' เพื่อใช้ในการแสดงผล
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'prod_id' => 'required|string|max:5',
            'prod_name' => 'required|string|max:15',
            'detials' => 'required|string',
            'price' => 'required|Double',
            'stock' => 'required|string'
        ]);

        Product::create($validated);

        return response()->json(['message' => 'Product Create Successfully'],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}

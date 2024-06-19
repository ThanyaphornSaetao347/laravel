<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Employees;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $emp = Employees::select('emp_no', 'first_name', 'last_name')
        ->take(3)
        ->get();


        // ดงึ ขอ้ มลู Employee ทม,ี ี emp_no เทา่ กบั 10001
        $employee = Employees::with('salaries')
        ->where('emp_no', 10001)
        ->get();

        return $employee;
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
        //
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

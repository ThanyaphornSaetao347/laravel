<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Http\Response; 
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $emp = DB::table('employees')->first(); 
        $dept = DB::table('departments')->get('dept_name');

        $male = DB::table('employees')
        ->select('first_name','last_name')
        ->where('first_name','like','A%')
        ->where('gender','M')
        ->take(50)
        ->get();

        $female = DB::table('employees')
        ->select('first_name')
        ->where('gender', 'F')
        ->whereRaw('YEAR(NOW()) - YEAR(birth_date) > ?', [50])
        ->take(50)
        ->get();
        // $emp = DB::table('employees')->take(100)->get(); 
        // $emp = DB::table('employees')->paginate(5);
        // $emp = DB::table('employees')->take(3)->get(['emp_no','first_name','last_name']);
        $data = json_decode(json_encode($dept), true);
        $Mdata = json_decode(json_encode($male), true);
        $Fdata = json_decode(json_encode($female), true);
        Log::info($data);
        return Inertia::render('Employee/index', [
            'dept' => $data,
            'male' => $Mdata,
            'female' => $Fdata,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response('create');
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
    public function show(string $id)
    {
        //
        return response('show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

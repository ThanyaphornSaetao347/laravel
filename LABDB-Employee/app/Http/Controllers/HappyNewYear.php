<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class HappyNewYear extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dept = DB::table('departments')->get();

        // $emp = DB::table('employees')	
        // ->take(10)		
        // ->get(['emp_no', 'first_name']);

        // $emp = DB::table('employees')
        // ->select('emp_no', 'first_name')        
        // ->offset(10)	
	    // ->limit(5)			
	    // ->get();

        // $emp = DB::table('employees')
        // ->where('emp_no','10009')
        // ->get();

        $emp = DB::table('employees')
        ->where('first_name', 'like', 'T%')
        ->whereRaw('YEAR(CURDATE()) - YEAR(birth_date) > 70')
        ->get();

        // $emp = DB::table('dept_emp')
        // ->select('dept_no',
		// 	DB::raw('COUNT(*) as cnt'))
        // ->whereYear('to_date','<>','9999')
        // ->groupBy('dept_no')
        // ->get();

        // $emp = DB::table('dept_emp')
        // ->select('*', DB::raw('YEAR(NOW()) - YEAR(to_date) as w'))
        // ->whereYear('to_date','2000')
        // ->limit(10)
        // ->get();

    //     $emp = DB::table('dept_emp')
	//   //
    //     ->leftJoin('employees','dept_emp.emp_no','=','employees.emp_no')

	//   //
    //     ->leftJoin('departments','dept_emp.dept_no','=','departments.dept_no')

	//   //
    //     ->select('employees.*','dept_name','dept_emp.to_date',
	// 		DB::raw('YEAR(CURDATE()) - YEAR(dept_emp.to_date) as work'))
    //         ->whereYear('to_date','<>','9999')
    //         ->limit(10)
    //         ->get();
    
            // DB::table('departments')->insert([
            //     'dept_no' => 'd010',
            //     'dept_name' => 'CS MJU'
            // ]);
            
            // DB::table('employees')
            // -> insertOrIgnore([
            //     'emp_no' => '9999999',
            //     'birth_date' => DB::raw('DATE_SUB(CURDATE(), 
            //             INTERVAL 30 DAY)'),
            //     'first_name' => 'Attawit',
            //     'last_name' => 'Chang',
            //     'gender' => 'M',
            //     'hire_date' => DB::raw('CURDATE()')
            //         ]
            // );


        $data = json_decode(json_encode($dept), true);
        Log::info($data);
        return Inertia::render('Employee/happy', [
            'dept' => $dept,
            'emp' => $emp,
        ]);
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
    public function show(string $id)
    {
        //
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

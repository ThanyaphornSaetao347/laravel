<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class QueryBuilder extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title= DB::table('titles')
        ->select('title')
        ->distinct()
        ->get();

        $age = DB::table('employees')
        ->select('emp_no', DB::raw('year(now()) - year(birth_date) as age'))
        ->distinct()
        ->orderByDesc('age')
        ->take(30)
        ->get();

        $maleCount = DB::table('employees')
        ->where('gender', 'M')
        ->count();
        $femaleCount = DB::table('employees')
        ->where('gender', 'F')
        ->count();

        $manager = DB::table('dept_manager as dm')
        ->leftJoin('employees as e', 'dm.emp_no', '=', 'e.emp_no')
        ->select('dm.dept_no', 'dm.emp_no', 'e.first_name', 'e.last_name')
        ->where('dm.from_date', '<=', DB::raw('CURDATE()'))
        ->where('dm.to_date', '>=', DB::raw('CURDATE()'))
        ->get();

        $sala = DB::table('salaries')
        ->whereYear('to_date','9999')
        ->orderbyDesc('salary')
        ->take(50)
        ->get();

        $work = DB::table('dept_emp')
        ->select('dept_no', DB::raw('COUNT(*) as employee_count'))
        ->groupBy('dept_no')
        ->get();

        $avg = DB::table('salaries as s')
        ->join('dept_emp as de', 'de.emp_no', '=', 's.emp_no')
        ->where('s.to_date', '9999-01-01')
        ->groupBy('de.dept_no')
        ->select('de.dept_no', DB::raw('AVG(s.salary) as avg'))
        ->get();
        
        // DB::table('dept_emp')->insert([
        //     'emp_no' => 9999999,
        //     'dept_no' => 'd010',
        //     'from_date' => '2023-01-01',
        //     'to_date' => '9999-01-01',
        // ]);
        
        

        // DB::table('salaries')
        // ->where('emp_no', 9999999)
        // ->where('to_date', '9999-01-01')
        // ->update(['salary' => DB::raw('salary * 1.1')]);

        // DB::table('salaries')
        // ->where('emp_no', 10001)
        // ->delete();

        $data = json_decode(json_encode($title), true);
        Log::info($data);
        return Inertia::render('Employee/query', [
            'title' => $data ,
            'age' => $age,
            'maleCount' => $maleCount,
            'femaleCount' => $femaleCount,
            'manager' => $manager,
            'sala' => $sala,
            'work' => $work,
            'avg' => $avg,
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

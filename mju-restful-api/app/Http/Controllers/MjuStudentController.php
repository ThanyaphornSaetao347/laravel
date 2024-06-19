<?php

namespace App\Http\Controllers;

use App\Models\MjuStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\updatedataMjustudentRequest;


class MjuStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
            public function index()
            {
            //     $students = MjuStudent::all();
            // return $students;

            $students = MjuStudent::with('major')->get();
            return response()->json(
                ['message' => 'Student get successfully',
                'get data by' => 'Thanyaphon',
                'data' => $students],
                201);
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
        // เช็ค ตรวจสอบ
        $validated = $request->validate([
            'student_code' => 'required|string|max:15',
            'first_name' => 'required|string|max:50',
            'nick_name' => 'required|string|max:20',
            'first_name_en' => 'required|string|max:50',
            'major_id' => 'required|int|max:50',
            'idcard' => 'required||digits:13',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);

        MjuStudent::create($validated);

        return response()->json(['message' => 'Student created successfully'], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request,MjuStudent $mjuStudent)
    {
        // เรียนวันที่ 29/01/2567

        // return 'hello world';
        // Log::info('mjuStudent->'.$mjuStudent); //ถ้ามีข้อมูล เอาไปใช้แสดงผลได้เลย ****
        // $student_code = $request->mju;
        Log::info($request->mju);
        $student_code = $request->mju;
        // $mjuStudent = MjuStudent::where('student_code',$student_code)->get();
        //ค้นหาตามรหัสนักศึกษา
        $mjuStudent = MjuStudent::with("major")->find($student_code);
        Log::info('mjuStudent---->'.$mjuStudent);
        return response()->json(
            [
                'message' => 'Student get successfully',
                'get Data by' => 'Thanyaphon',
                'data' => $mjuStudent
            ],
            200
        );
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
    public function update(Request $request, MjuStudent $mjuStudent, $imformation)
    {
        // return "hello update";
        $validated = $request->validate([
            'student_code' => 'required|string|max:15',
            'first_name' => 'required|string|max:50',
            'nick_name' => 'required|string|max:20',
            'first_name_en' => 'required|string|max:50',
            'major_id' => 'required|int|max:50',
            'idcard' => 'required|digits:13',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
        ]);

        $mjuStudent->update($validated);
        // อัพเดทข้อมูลในฐานข้อมูลตารางนี้
        $update = DB::table('mju_students')
        ->where('student_code',$imformation) //เช็คเงื่อนไขถ้ามีอันใดอันหนึ่งให้อัพเดทเลย
        ->orwhere('first_name',$imformation)
        ->orwhere('nick_name',$imformation)
        ->orwhere('first_name_en',$imformation)
        ->orwhere('major_id',$imformation)
        ->orwhere('idcard',$imformation)
        ->orwhere('address',$imformation)
        ->orwhere('phone',$imformation)
        ->orwhere('email',$imformation)
        ->update
        ([
            'student_code'=>$validated['student_code'],
            'first_name'=>$validated['first_name'],
            'nick_name'=>$validated['nick_name'],
            'first_name_en'=>$validated['first_name_en'],
            'major_id'=>$validated['major_id'],
            'idcard'=>$validated['idcard'],
            'address'=>$validated['address'],
            'phone'=>$validated['phone'],
            'email'=>$validated['email'],
        ]);

        return response()->json(['message' => 'Student updated successfully','data'=>$update],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MjuStudent $mjuStudent , $deletedata)
    {
        // return "hello delete";
        $destroy = DB::table('mju_students')
        ->where('student_code',$deletedata)->delete();

        return response()->json(['message' => 'Student delete successfully','data'=>$destroy],200);
    }
}

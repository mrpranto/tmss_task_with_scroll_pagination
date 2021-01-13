<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $studentInfo = Student::query()
            ->with('bloodGroup:id,name')
            ->select(['blood_group_id', 'name', 'roll_number', 'phone_number', 'address'])
            ->paginate(10000);

        if ($request->ajax()) {
            $view = view('data', compact('studentInfo'))->render();
            return response()->json(['html' => $view]);
        }

        return view('welcome');
    }

    public function getStudentInfo()
    {
        $studentInfo = Student::query()
            ->with('bloodGroup:id,name')
            ->select(['blood_group_id', 'name', 'roll_number', 'phone_number', 'address'])
            ->paginate(10000);


        return $this->renderTable($studentInfo);
    }

    public function renderTable($studentInfo)
    {
        $studentRender ='<table class="studentData"><thead><tr><th>Sl</th><th>Name</th><th>Roll No</th><th>Phone Number</th><th>Address</th><th>Blood Group</th></tr></thead><tbody>';

        foreach ($studentInfo as $key => $student)
        {
            $studentRender .='<tr><td>'.($studentInfo->firstItem()+$key).'</td>';
            $studentRender .='<td>'.$student->name.'</td>';
            $studentRender .='<td>'.$student->roll_number.'</td>';
            $studentRender .='<td>'.$student->phone_number.'</td>';
            $studentRender .='<td>'.$student->address.'</td>';
            $studentRender .='<td>'.$student->bloodGroup->name.'</td></tr>';
        }
        $studentRender .='</tbody></table>';

        return $studentRender;
    }
}

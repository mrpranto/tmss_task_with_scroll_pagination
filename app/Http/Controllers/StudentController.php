<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function getStudentInfo()
    {
        $studentInfo = Student::query()
            ->with('bloodGroup:id,name')
            ->select(['blood_group_id', 'name', 'roll_number', 'phone_number', 'address'])
//            ->take(1000)
            ->get();

        $studentRender ='<table>
                           <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Roll No</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Blood Group</th>
                            </tr>
                            </thead>
                            <tbody>';

        foreach ($studentInfo as $key => $student)
        {
            $studentRender .='<tr><td>'.($key+1).'</td>';
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

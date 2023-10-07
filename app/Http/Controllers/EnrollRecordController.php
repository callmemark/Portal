<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnrollRecord;
use App\Models\StudentRecord;
use App\Models\Subject;


class EnrollRecordController extends Controller
{
    public function create(Request $request, StudentRecord $student){
        $subject = json_decode($request -> input('subject-selected'), true);

        $sub_query = Subject::where('id', $subject['id'])->get();

        if($sub_query -> isEmpty()){
            return redirect(route('student.edit', ['student' => $student, 'subject' => $subject])) -> with('error'. 'Theres an error while adding data to the databse');
        }

        $request['subjectid'] = $subject['id'];
        $request['studentid'] = $student -> id;
        $request['grade'] = 0;
        
        $validated_data = $request -> validate([
            'subjectid' => 'string|required',
            'studentid' => 'string|required',
            'grade' => 'integer|required',
        ]);

        dd($validated_data);
        $new_create = EnrollRecord::create($validated_data);

        if(!$new_create){
            return redirect(route('student.edit', ['student' => $student, 'subject' => $subject])) -> with('error'. 'Theres an error while adding data to the databse');
        }

        return redirect(route('student.edit', ['student' => $student, 'subject' => $subject])) -> with('success'. 'Student was enrolled to subjcet: '.$subject->subject);
    }
}

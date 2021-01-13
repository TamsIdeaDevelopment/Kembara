<?php
/**
 * Created by PhpStorm.
 * User: mhmj
 * Date: 28/12/2020
 * Time: 4:18 PM
 */

namespace App\Http\Controllers\Classroom\HQ\Creates;


use App\Classroom;
use Illuminate\Http\Request;

class CreateClassroom
{
    public function createClassroom(Request $request)
    {
        if($request->hasFile('file1'))
        {

            $filenameWithExt = $request->file1->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file1->getClientOriginalExtension();
            $file1= $filename.'_'.time().'.'.$extension;
            $path = $request->file1->storeAs('public/Classroom', $file1);

        }
        else
        {
            $file1 = $request->input('file1');
        }

        if($request->hasFile('file2'))
        {
            $filenameWithExt = $request->file2->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file2->getClientOriginalExtension();
            $file2= $filename.'_'.time().'.'.$extension;
            $path = $request->file2->storeAs('public/Classroom', $file2);
        }
        else
        {
            $file2 = $request->input('file2');
        }

        if($request->hasFile('file3'))
        {
            $filenameWithExt = $request->file3->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file2->getClientOriginalExtension();
            $file3= $filename.'_'.time().'.'.$extension;
            $path = $request->file2->storeAs('public/Classroom', $file3);

        }
        else
        {
            $file3 = $request->input('file3');
        }

        if($request->hasFile('file4'))
        {
            $filenameWithExt = $request->file4->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file4->getClientOriginalExtension();
            $file4= $filename.'_'.time().'.'.$extension;
            $path = $request->file4->storeAs('public/Classroom', $file4);

        }
        else
        {
            $file4 = $request->input('file4');
        }
        if($request->hasFile('file5'))
        {
            $filenameWithExt = $request->file5->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file5->getClientOriginalExtension();
            $file5= $filename.'_'.time().'.'.$extension;
            $path = $request->file5->storeAs('public/Classroom', $file5);

        }
        else
        {
            $file5 = $request->input('file5');
        }


        $data = Classroom::create([
            'name' =>  $request->input('name'),
            'info_title' => $request->input('info_title'),
            'info_description' => $request->input('info_description'),
            'info_remark' => $request->input('info_remark'),
            'info_link' => $request->input('info_link'),
            'video_title' => $request->input('video_title'),
            'video_link' => $request->input('video_link'),
            'file1' => $file1,
            'file2' => $file2,
            'file3' => $file3,
            'file4' => $file4,
            'file5' => $file5,
        ]);

        return $data;

    }
}
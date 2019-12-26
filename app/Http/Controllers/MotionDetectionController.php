<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MotionDetectionController extends Controller
{
    //
    public function show()
    {

        return view('motion_detection.show');
    }

    public function save_image(Request $request)
    {

        $result = false;

        if ($request->hasFile('image')) {

            $request->file('image')->store('motion_detection'); // storage/app/motion_detectionに保存
            $result = true;
        }

        return ['result' => $result];
    }
}

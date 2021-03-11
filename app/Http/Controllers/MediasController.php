<?php

namespace App\Http\Controllers;
use App\Medias;
use Validator,Redirect,Response,File;
use Illuminate\Http\Request;

class MediasController extends Controller
{
    //
    public function index()
    {
        return view('medias.index');
    }

    public function save(Request $request)
    {
       request()->validate([
            'fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
       if ($files = $request->file('fileUpload')) {
           $destinationPath = 'public/image/'; // upload path
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
           $insert['image'] = "$profileImage";
        }
        $check = Medias::insertGetId($insert);

        return Redirect::to("medias.image")
        ->withSuccess('Great! Image has been successfully uploaded.');

    }

}

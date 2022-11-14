<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Support\ValidatedData;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class SliderController extends Controller
{
    //

    public function index()
    { $sliders=Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }
    public function create()
    {
        return view('admin.slider.create');

    }

    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();


       $uploadPath='uploads/slider/';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move($uploadPath,$filename);
            $finalPath=$uploadPath.$filename;
        }
        $validatedData['status']=$request->status==true?'1':'0';
        Slider::create([
            'title'=>$validatedData['title'],
            'description'=>$validatedData['description'],
            'image'=>$finalPath,
            'status'=>$validatedData['status']
        ]);
        

        return redirect('admin/slider')->with('message','Slider Added Succesfully');
        
    }
}

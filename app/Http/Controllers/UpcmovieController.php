<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upcmovie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use RealRashid\SweetAlert\Facades\Alert;

class UpcmovieController extends Controller
{
    public function upview()
    {
        $upmovie = Upcmovie::all();
        return view('upcmovies.umview', compact('upmovie'));
    }

    public function upmadd()
    {
        return view('upcmovies.umadd');
    }

    public function upminsert(Request $request)
    {
        $upmovie = new Upcmovie();

        $this->validate($request,[
            'umname' => 'required',
            'umtype' => 'required',
            'sdescription' => 'required', 
            'image' => 'required',
            'rdate' => 'required|date',
            'trailer' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/upcmovie/', $filename);
            $upmovie->image = $filename;
        }

        $upmovie->umname = $request->input('umname');
        $upmovie->umtype = $request->input('umtype');
        $upmovie->sdescription = $request->input('sdescription');
        $upmovie->rdate = $request->input('rdate');
        $upmovie->trailer = $request->input('trailer');
        $upmovie->save();
        Alert::success('Movie added Successfully', 'Success Message');
        return redirect('upmovie')->with('status',"Movie added Successfully");
    }

    public function updelete(Request $request)
    {
        $upmovie = Upcmovie::find($request->upmovie_delete_id);

        $path = 'uploads/upmovie/'.$upmovie->image;
        if (File::exists($path)) 
        {
            File::delete($path);
        }
        $upmovie->delete();
        Alert::error('Movie deleted Successfully');
        return redirect('upmovie');
    }
    /* public function upmview()
    {
        # code...
    } */
}

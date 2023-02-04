<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Catagory;
use RealRashid\SweetAlert\Facades\Alert;


class CatagoryController extends Controller
{
    public function index()
    {
        $catagory = Catagory::all();
        return view('catagory', compact('catagory'));
    }

    public function addcatagory()
    {
        return view('addcatagory');
    }

    public function insert(Request $request)
    {
        $catagory = new Catagory();
        
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'status' => 'required',
            'popular' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'image' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/catagory/', $filename);
            $catagory->image = $filename;
        }

        $catagory->name = $request->input('name');
        $catagory->slug = $request->input('slug');
        $catagory->description = $request->input('description');
        $catagory->status = $request->input('status') == TRUE? '1':'0';
        $catagory->popular = $request->input('popular') == TRUE? '1':'0';
        $catagory->meta_title = $request->input('meta_title');
        $catagory->meta_description = $request->input('meta_description');
        $catagory->meta_keywords = $request->input('meta_keywords');
        $catagory->save();
        Alert::success('Category Added', 'Success Message');
        return redirect('catagory')->with('status',"Catagory added Successfully");

        
    }

    public function editprod($id)
    {
        $catagory = Catagory::find($id);
        return view('editcatagory', compact('catagory')); 
    }

    public function update(Request $request, $id)
    {
        $catagory = Catagory::find($id);
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'status' => 'required',
            'popular' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'image' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $path = 'uploads/catagory/'.$catagory->image;
            if (File::exists($path)) 
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/catagory/', $filename);
            $catagory->image = $filename;
        }
        $catagory->name = $request->input('name');
        $catagory->slug = $request->input('slug');
        $catagory->description = $request->input('description');
        $catagory->status = $request->input('status') == TRUE? '1':'0';
        $catagory->popular = $request->input('popular') == TRUE? '1':'0';
        $catagory->meta_title = $request->input('meta_title');
        $catagory->meta_description = $request->input('meta_description');
        $catagory->meta_keywords = $request->input('meta_keywords');
        $catagory->update();
        Alert::success('Category Updatefd', 'Success Message');
        return redirect('catagory')->with('status',"Catagory Updated Successfully");
    }

    public function delete(Request $request)
    {
        $catagory = Catagory::find($request->catagory_delete_id);
        if ($catagory->image) {
            $path = 'uploads/catagory/'.$catagory->image;
            if (File::exists($path)) 
            {
                File::delete($path);
            }
        }
        $catagory->delete();
        Alert::error('Category is Deleted');
        return redirect('catagory');
    }
}

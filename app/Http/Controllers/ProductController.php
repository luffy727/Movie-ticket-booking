<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\Catagory;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index(){

        $product = Product::paginate(6);
        return view('products.index', compact('product'));
    }

    public function add()
    {
        $catagory = Catagory::all();
        return view('products.add', compact('catagory'));
    }

    public function insert(Request $request)
    {
        $product = new Product();

        $this->validate($request,[
            'cate_id' => 'required',
            'name' => 'required',
            'slug' => 'required', 
            'small_description' => 'required', 
            'description' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            'tax' => 'required',
            'qty' => 'required',
            'status' => 'required',
            'trending' => 'required',
            'meta_title' => 'required',
            'meta_decription' => 'required', 
            'meta_keywords' => 'required',
            'image' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/product/', $filename);
            $product->image = $filename;
        }

        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->tax = $request->input('tax');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status') == TRUE ? '1':'0';
        $product->trending = $request->input('trending') == TRUE ? '1':'0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_decription = $request->input('meta_decription');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->save();
        Alert::success('Product added Successfully', 'Success Message');
        return redirect('products')->with('status', "Product added successfully");


    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        
        $this->validate($request,[
            'name' => 'required',
            'slug' => 'required',
            'small_description' => 'required',
            'description' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            'tax' => 'required',
            'qty' => 'required',
            'status' => 'required',
            'trending' => 'required',
            'meta_title' => 'required',
            'meta_decription' => 'required',
            'meta_keywords' => 'required',
        ]);

        if ($request->hasFile('image')) {

            $path = 'uploads/product/'.$product->image;
            if (File::exists($path)) 
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/product/', $filename);
            $product->image = $filename;
        }

        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->tax = $request->input('tax');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status') == TRUE ? '1':'0';
        $product->trending = $request->input('trending') == TRUE ? '1':'0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_decription = $request->input('meta_decription');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->update();
        Alert::success('Product  updated Successfully', 'Success Message');
        return redirect('products')->with('status', "Product updated Successfully");
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->product_delete_id);

        $path = 'uploads/product/'.$product->image;
        if (File::exists($path)) 
        {
            File::delete($path);
        }
        $product->delete();
        Alert::error('Product deleted successfully', 'Error Message');
        return redirect('products')->with('status', "Product deleted successfully");
    }

    public function pexportpdf()
    {
        $product = Product::all();
        $pdf = Pdf::loadView('pdf.productdetails',[
            'product' => $product
        ]);
        return $pdf->stream();
    }
}

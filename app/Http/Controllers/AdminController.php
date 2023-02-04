<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Catagory;
use App\Models\Movie;
use App\Models\Product;
use App\Models\Booking;
use App\Models\Order;
use Auth;
use Image;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function admin()
    {
        $catagory = Catagory::count();
        $movie = Movie::count();
        $product = Product::count();
        $user = User::where('userType','USR')->count();
        $booking = Booking::count();
        $order = Order::count();
        $allbooking = Booking::where('status','1')->paginate(6);
        return view('admindashboard', compact('catagory','movie','product','user','booking','order','allbooking'));
    }
    public function index()
    {
        $users = User::all();
        return view('index')->with('users',$users);
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('useredit',compact('users'));
    }

    public function update(Request $request,$id)
    {
        $users= User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        // $users->userType = $request->input('userType');
        $users->update();
        Alert::success('Data Updated Successfully', 'Success Message');
        return redirect('/index')->with('status',"Data Updated Successfully");

    }

    public function remove($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/index')->with('status',"Data Deleted Successfully");
    }

    public function removeuser(request $request)
    {
       
        $user = User::find($request->user_delete_id);

        $user->delete();
        Alert::error('User deleted successfully');
        return redirect('index')->with('status', "Product deleted successfully");
    
    }

    public function add()
    {
        return view('add');
    }

    public function insert(Request $request)
    {
        $users = new User();
        
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'userType' => 'required',
        ]);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        $users->userType = $request->input('userType');
        $users->save();
        Alert::success('Inserted Data Successfully', 'Success Message');
        return redirect('/admin/dashboard')->with('status',"Inserted Data Successfully");
    }

    public function profile()
    {
        return view('profile', array('user' => Auth::user()) );
    }

    // PUblic function update_avatar(Request $request, $id)
    // {
    //     $user = User::find($id);
    //     if($request()->hasfile('avatar'))
    //     {
    //         $destination = '/uploads/avatars'.$user->avatar;
    //         if (File::exists($destination)) 
    //         {
    //             File::delete($destination);
    //         }
    //         $avataruploaded = $request()->file('avatar');
    //         $avatarname = time() . '.' . $avataruploaded->getClientOriginalExtension();
    //         $avatarpath = public_path('/uploads/avatars/');
    //         $avataruploaded->move($avatarpath, $avatarname);
    //         $user->avatar = $avatarname;
            
    //     }

    //     $user->update();
    //     return redirect('profile')->with('status','User image update successfully');
    // }
    
    
}

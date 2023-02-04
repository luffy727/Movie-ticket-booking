<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Movie;
use App\Models\MovieDate;
use App\Models\User;
use App\Models\Upcmovie;
use App\Models\Review;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use RealRashid\SweetAlert\Facades\Alert;


class MovieController extends Controller
{   
    //profile useer
    public function profile()
    {
        return view('user.profile', array('user' => Auth::user()) );
    }
    //view movie details
    public function index()
    {
        $movie = Movie::all();
        return view('movies.movie', compact('movie'));
    }

    //add movies
    public function add()
    {
        return view('movies.addmovie');
    }

    //save movie details
    public function insert(Request $request)
    {

        $movie = new Movie();

        $this->validate($request,[
            'mname' => 'required',
            'mtype' => 'required',
            'mdescription' => 'required', 
            'hall' => 'required', 
            'trending' => 'required',
            'seat_qty' => 'required',
            'chticket_price' => 'required',
            'adticket_price' => 'required',
            'image' => 'required',
            'date' => 'required|after:now',
            'time' => 'required',
            'video_url' => 'required',
            
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/movie/', $filename);
            $movie->image = $filename;
        }

        $movie->mname = $request->input('mname');
        $movie->mtype = $request->input('mtype');
        $movie->mdescription = $request->input('mdescription');
        $movie->hall = $request->input('hall');
        $movie->trending = $request->input('trending') == TRUE? '1':'0';
        $movie->chticket_price = $request->input('chticket_price');
        $movie->adticket_price = $request->input('adticket_price');
        $movie->seat_qty = $request->input('seat_qty');
        $movie->date = $request->input('date');
        $movie->time = $request->input('time');
        $movie->video_url = $request->input('video_url');
        $movie->save();
        Alert::success('Movie added Successfully');
        return redirect('movie');
    }

    //edit movie details page
    public function editmovie($id)
    {
        $movie = Movie::find($id);
        return view('movies.editmovie', compact('movie'));
    }

    //update movie details
    public function updatemovie(Request $request, $id)
    {
        $movie = Movie::find($id);
        if ($request->hasFile('image')) {

            $path = 'uploads/movie/'.$movie->image;
            if (File::exists($path)) 
            {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/product/', $filename);
            $movie->image = $filename;
        }

        $movie->mname = $request->input('mname');
        $movie->mtype = $request->input('mtype');
        $movie->mdescription = $request->input('mdescription');
        $movie->hall = $request->input('hall');
        $movie->trending = $request->input('trending') == TRUE? '1':'0';
        $movie->chticket_price = $request->input('chticket_price');
        $movie->adticket_price = $request->input('adticket_price');
        $movie->seat_qty = $request->input('seat_qty');
        $movie->date = $request->input('date');
        $movie->time = $request->input('time');
        $movie->video_url = $request->input('video_url');
        $movie->update();
        Alert::success('Movie Updated Successfully', 'Success Message');
        return redirect('movie');
    }

    //delete movie details
    public function deletemovie(Request $request)
    {
        $movie = Movie::find($request->movie_delete_id);

        $path = 'uploads/movie/'.$movie->image;
        if (File::exists($path)) 
        {
            File::delete($path);
        }
        $movie->delete();
        Alert::error('Movie deleted Successfully');
        return redirect('movie');
    }

    //show movies in userdashboard
    public function showmovie()
    {
        $upmovie = Upcmovie::all();
        $trending_movie = Movie::where('trending', '1')->take(15)->get();
        return view('userdashboard', compact('trending_movie','upmovie'));
    }

    //movie details
    public function movieview($mname)
    {
        if (Movie::where('mname', $mname)->exists()) 
            {
                $movie = Movie::where('mname', $mname)->first();
                $reviews = Review::where('movie_id', $movie->id)->get();
                return view('movies.viewmovie', compact('movie','reviews'));
            }
            else {
                Alert::info('Link was broken', 'Info Message');
                return redirect('user/dashboard')->with('status'. "Link was broken");
            }
    }

    // movie trailer
    public function trailer($mname)
    {
        if (Movie::where('mname', $mname)->exists()) 
            {
                $movie = Movie::where('mname', $mname)->first();
                return view('userdashboard', compact('movie'));
            }
            else {
                return redirect('user/dashboard')->with('status'. "Link was broken");
            }
    }
    //view movie date
    public function moviedateview()
    {
        $moviedate = MovieDate::paginate(10);
        return view('movies.movieshedule', compact('moviedate'));

    }

    public function adddate()
    {
        $movie = Movie::all();
        return view('movies.moviedate', compact('movie'));
    }

    // add movie date
    public function insertdate(Request $request)
    {
        $moviedate = new MovieDate();

        $this->validate($request,[
            'movie_id' => 'required',
            'movie_date' => 'required|after:now',
            'movie_time' => 'required',
            'movie_seats' => 'required'
        ]);

        $moviedate->movie_id = $request->input('movie_id');
        $moviedate->movie_date = $request->input('movie_date');
        $moviedate->movie_time = $request->input('movie_time');
        $moviedate->movie_seats = $request->input('movie_seats');
        $moviedate->save();
        Alert::success('Movie Date added successfully', 'Success Message');
        return redirect('movieshedule');
    }

    //delete movie date
    public function deletemoviedate(Request $request)
    {
        $moviedate = MovieDate::find($request->mdate_delete_id);
        $moviedate->delete();
        Alert::error('Moviedate delete Successfully');
        return redirect('movieshedule');
    }

    //view movie date
    public function dateview($mname)
    {
        if (Movie::where('mname', $mname)->exists()) 
        {
            $todayDate = date("Y-m-d");
            $movie = Movie::where('mname', $mname)->first();
            $moviedate = MovieDate::where('movie_id', $movie->id)->get();
            return view('movies.viewmoviedate', compact('movie','moviedate','todayDate'));
        }
        else {
            Alert::warning('Movie Dates Does not exists', 'Warning Message');
            return redirect('user/dashboard')->with('status', "Movie Dates Does not exists");
        }
    }

    public function mdexportpdf()
    {
        $moviedate = MovieDate::all();
        $pdf = Pdf::loadView('pdf.invoice',[
            'moviedate' => $moviedate
        ]);
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');
    }

    public function mexportpdf()
    {
        $movie = Movie::all();
        $pdf = Pdf::loadView('pdf.moviedetails',[
            'movie' => $movie
        ]);
        return $pdf->download('moviedetails.pdf');
    }

}

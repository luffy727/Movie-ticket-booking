<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;
use Auth;

class ReviewController extends Controller
{
    public function add($mname)
    {
        $movie = Movie::where('mname', $mname)->where('trending', '1')->first();

        if ($movie) {
            $review = Review::where('user_id', Auth::id())->where('movie_id', $movie_id)->first();
            if ($review) {
                return view('review.edit',compact('review'));
            }
            else {
            $movie_id = $movie->id;
            return view('review.index', compact('movie'));
            }
        }
        else {
            return redirect()->back()->with('status', "Link you Follw is Broken");
        }
    }

    public function create(Request $request)
    {
       $movie_id = $request->input('movie_id');
       $movie = Movie::where('id', $movie_id)->where('trending', '1')->first();
       if ($movie) {
        $user_review = $request->input('user_review');
        $new_review = Review::create([
            'user_id' => Auth::id(),
            'movie_id' => $movie_id,
            'user_review' => $user_review,
        ]);

        if ($new_review) {
            $m_name = $movie->mname;
            return redirect('movieview/'.$m_name)->with('status',"review added successfully");
        }
       }
    }

    public function edit($mname)
    {
        $movie = Movie::where('mname', $mname)->where('trending', '1')->first();
        if ($movie) {
            $movie_id = $movie->id;
            $review = Review::where('user_id', Auth::id())->where('movie_id',$movie_id)->first();
            if ($review) {
                return view('review.edit',compact('review'));
            }
            else {
                return redirect()->back()->with('status',"the link was broken");
            }
        }
        else {
            return redirect()->back()->with('status',"the link was broken");
        }
    }

    public function update(Request $request)
    {
         $user_review = $request->input('user_review');
        if ($user_review != '') {
            $review_id = $request->input('review_id');
            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();
            if ($review) {
                $review->user_review = $request->input('user_review');
                $review->update();
                return redirect('movieview/'.$review->movie->mname)->with('status', "Review updated successfully");
            }
            else {
                return redirect()->back()->with('status',"the link was broken");
            }
        }
        else {
            return redirect()->back()->with('status',"the link was broken");
        }

    }
}

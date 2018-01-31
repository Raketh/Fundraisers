<?php

namespace App\Http\Controllers;

use App\Fundraiser;
use App\Review;
use App\Reviewer;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FundraiserController extends Controller
{
    public function index()
    {
        $fundraisers = Fundraiser::select('fundraisers.*', DB::raw('avg(reviews.rating) AS average, count(*) AS count'))
            ->join('reviews', 'reviews.fundraiser_id', '=', 'fundraisers.id')
            ->groupBy('reviews.fundraiser_id')
            ->orderBy('average', 'desc')
            ->get();

        return view('home', compact('fundraisers'));
    }

    public function show(Fundraiser $fundraiser)
    {

        $reviews = $fundraiser->reviews()->orderBy('created_at', 'desc')->get();


        return view('fundraiser.show', compact(['fundraiser', 'reviews']));
    }

    public function create()
    {
        return view('fundraiser.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fundraiserName' => 'required|unique:fundraisers,name|max:150',
            'reviewerName' => 'required|string|max:100',
            'email' => 'required|email',
            'review' => 'required|string|max:1000',
            'starRating' => 'required|integer|between:1,5'
        ]);

        $fundraiser = Fundraiser::firstOrCreate(['name' => request('fundraiserName')]);

        $reviewer = Reviewer::findOrCreateReviewer(request('email'), request('reviewerName'));

        $review = new Review(['rating' => request('starRating'), 'review' => request('review')]);
        $review->publishReview($review, $fundraiser, $reviewer);


        return redirect('/');
    }

}

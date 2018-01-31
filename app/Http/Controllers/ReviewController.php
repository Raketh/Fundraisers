<?php

namespace App\Http\Controllers;

use App\Fundraiser;
use App\Review;
use App\Reviewer;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(fundraiser $fundraiser)
    {
        return view('fundraiser.review', compact('fundraiser'));
    }

    public function store(Request $request, Fundraiser $fundraiser)
    {
        $this->validate($request, [
            'reviewerName' => 'required|string|max:100',
            'email' => 'required|email',
            'review' => 'required|string|max:1000',
            'starRating' => 'required|integer|between:1,5'
        ]);

        $review = new Review(['rating' => request('starRating'), 'review' => request('review')]);
        $reviewer = Reviewer::findOrCreateReviewer(request('email'), request('reviewerName'));

        $existingReview = $fundraiser->reviews()->where('reviewer_id', $reviewer->id)->exists();
        if ($existingReview) {
            return back()->withInput()->withErrors(array('message' => 'You have already submitted a review for this fundraiser.'));
        }

        $review->publishReview($review, $fundraiser, $reviewer);

        return redirect("/fundraiser/$fundraiser->name");
    }
}

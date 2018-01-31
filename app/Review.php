<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fundraiser()
    {
        return $this->belongsTo(Fundraiser::class, 'fundraiser_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reviewer()
    {
        return $this->belongsTo(Reviewer::class, 'reviewer_id');
    }


    /**
     * @param Review $review
     * @param Fundraiser $fundraiser
     * @param Reviewer $reviewer
     * @return Review
     */
    public function publishReview(Review $review, Fundraiser $fundraiser, Reviewer $reviewer)
    {
        $review->reviewer()->associate($reviewer);
        $review->fundraiser()->associate($fundraiser);
        $review->save();
        return $review;
    }

}


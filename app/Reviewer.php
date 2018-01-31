<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reviewer
 * @package App
 */
class Reviewer extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function review()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * @param $email
     * @param $reviewerName
     * @return mixed
     */
    public static function findOrCreateReviewer($email, $reviewerName)
    {
        $reviewer = Reviewer::firstOrNew(['email' => $email]);
        $reviewer->name = $reviewerName;
        $reviewer->save();

        return $reviewer;
    }


}

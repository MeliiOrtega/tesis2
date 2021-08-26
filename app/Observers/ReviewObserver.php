<?php

namespace App\Observers;

use App\Models\Course;
use App\Models\Review;

class ReviewObserver
{
    /**
     * Handle the Review "created" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function created(Review $review)
    {
        $this->recalculateCourseRating($review->course_id);
    }


    /**
     * Handle the Review "deleted" event.
     *
     * @param  \App\Models\Review  $review
     * @return void
     */
    public function deleted(Review $review)
    {
        $this->recalculateCourseRating($review->course_id);
    }





    public function recalculateCourseRating($course_id){
        $product = Course::with('reviews')->find($course_id); //VER
        $avg_rating = 0;
        if ($product->reviews->count()) {
            $avg_rating = round($product->reviews->avg('rating'),1) ;

        }
        $product->update([

            'reviews_count' => $product->reviews->count(),
            'avg_rating' => $avg_rating,
        ]);

    }
}

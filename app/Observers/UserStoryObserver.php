<?php

namespace App\Observers;

use App\Models\UserStory;
use App\Classes\Helper;
use Auth;

class UserStoryObserver
{
    public function creating(UserStory $userStory)
    {
        if (!isset($userStory->user_id)) {
            $userStory->user_id = Auth::user()->id;
        }

        $userStory->slug = Helper::slug($userStory->title);
    }

    public function deleting(UserStory $userStory)
    {
        $userStory->comments()->delete();
        $userStory->issues()->delete();
        $userStory->notes()->delete();
        $userStory->labels()->delete();
        $userStory->favorite()->delete();
    }
}

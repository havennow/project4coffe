<?php

namespace App\Observers;

use App\Models\Favorite;
use Auth;

class FavoriteObserver
{
    public function creating(Favorite $favorite)
    {
        $favorite->user_id = Auth::user()->id;
    }
}

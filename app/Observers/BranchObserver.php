<?php

namespace App\Observers;

use App\Models\Branch;
use Auth;

class BranchObserver
{
    public function creating(Branch $branch)
    {
        $branch->user_id = Auth::user()->id;
    }
}

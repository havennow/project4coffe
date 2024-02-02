<?php

namespace App\Observers;

use App\Models\Label;
use App\Models\Status;
use App\Classes\Helper;
use Auth;

class LabelObserver
{
    public function creating(Label $label)
    {
        $label->slug = Helper::slug($label->title);
        $label->user_id = Auth::user()->id;
    }

    public function created(Label $label)
    {
        (new Status())->track('labels', $label);
    }
}

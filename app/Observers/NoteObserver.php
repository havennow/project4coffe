<?php

namespace App\Observers;

use App\Models\Note;
use App\Models\Status;
use App\Classes\Helper;
use Auth;

class NoteObserver
{
    public function creating(Note $note)
    {
        $note->user_id = Auth::user()->id;
        $note->slug = Helper::slug($note->title);
    }

    public function created(Note $note)
    {
        (new Status())->track('notes', $note);
    }
}

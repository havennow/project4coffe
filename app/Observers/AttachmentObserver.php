<?php

namespace App\Observers;

use App\Models\Status;
use App\Models\Attachment;
use Auth;

class AttachmentObserver
{
    public function creating(Attachment $attachment)
    {
        $attachment->user_id = Auth::user()->id;
    }

    public function created(Attachment $attachment)
    {
        (new Status())->track('attachments', $attachment);
    }
}

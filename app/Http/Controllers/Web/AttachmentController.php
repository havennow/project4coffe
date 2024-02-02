<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\AttachmentRequest;

class AttachmentController extends Controller
{
    public function store(AttachmentRequest $request)
    {
        resolve('AttachmentService')->upload($request);
        return back()->with('success', trans('App.file-uploaded-successfully'));
    }
}

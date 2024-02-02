<?php

namespace App\Services;

use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests\NoteRequest;
use App\Models\Note;

class NoteService extends Service
{
    public function create(NoteRequest $request)
    {
        $data = [
            'noteable_id' => $request->noteable_id,
            'noteable_type' => $request->noteable_type,
            'title' => $request->title,
        ];

        $note = Note::create($data);

        return $note;
    }

    public function update(Request $request)
    {
        $note = Note::slug($request->slug)->first();

        $note->closed_user_id = Auth::id();
        $note->closed_at = Carbon::now();

        return $note->save();
    }
}

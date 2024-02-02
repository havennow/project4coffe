<?php

namespace App\Services;

use Config;
use App\Http\Requests\LabelRequest;
use App\Models\Label;

class LabelService extends Service
{
    public function create(LabelRequest $request)
    {
        $data = [
            'labelable_id' => $request->labelable_id,
            'labelable_type' => $request->labelable_type,
            'title' => $request->title,
        ];

        try {
            $label = Label::create($data);
        } catch (\Exception $e) {
            $label = Label::where('title', $request->title)->first();
        }

        $relation = Config::get('database.relation');

        $result = $relation[$request->labelable_type]::where('id', $request->labelable_id)->first();

        if (!$result->labels()->where('label_id', $label->id)->first()) {
            $result->labels()->attach([$label->id]);
        }

        return $label;
    }
}

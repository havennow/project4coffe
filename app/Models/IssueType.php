<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\GlobalScope;
use App\Presenters\GlobalPresenter;

class IssueType extends Model
{
    use GlobalScope;
    use GlobalPresenter;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'issue_types';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['parent_id', 'alias', 'title', 'position', 'enabled'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function issues()
    {
        return $this->hasMany(Issue::class, 'issue_type_id', 'id');
    }
}

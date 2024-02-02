<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Attachment;
use App\Models\Branch;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Issue;
use App\Models\Label;
use App\Models\Note;
use App\Models\ProductBacklog;
use App\Models\Sprint;
use App\Models\Status;
use App\Models\UserStory;
use App\Models\Organization;
use App\Observers\AttachmentObserver;
use App\Observers\BranchObserver;
use App\Observers\CommentObserver;
use App\Observers\FavoriteObserver;
use App\Observers\IssueObserver;
use App\Observers\LabelObserver;
use App\Observers\NoteObserver;
use App\Observers\ProductBacklogObserver;
use App\Observers\SprintObserver;
use App\Observers\StatusObserver;
use App\Observers\UserStoryObserver;
use App\Observers\OrganizationObserver;

class ModelObserverProvider extends ServiceProvider
{
    public function boot()
    {
        Attachment::observe(AttachmentObserver::class);
        Branch::observe(BranchObserver::class);
        Comment::observe(CommentObserver::class);
        Favorite::observe(FavoriteObserver::class);
        Issue::observe(IssueObserver::class);
        Label::observe(LabelObserver::class);
        Note::observe(NoteObserver::class);
        ProductBacklog::observe(ProductBacklogObserver::class);
        Sprint::observe(SprintObserver::class);
        Status::observe(StatusObserver::class);
        UserStory::observe(UserStoryObserver::class);
        Organization::observe(OrganizationObserver::class);
    }

    public function register()
    {
    }
}

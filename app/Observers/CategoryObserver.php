<?php

namespace App\Observers;

use App\Jobs\LogJob;
use App\Models\Category;

class CategoryObserver
{
    const NAME = "App/Category";

    /**
     * Handle the Category "created" event.
     *
     * @param \App\Models\Category $category
     * @return void
     */
    public function created(Category $category)
    {
        LogJob::dispatch([
            'model'       => self::NAME,
            'action'      => 'CREATED',
            'old_version' => collect($category->getRawOriginal())->toJson(),
            'new_version' => $category
        ]);
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param \App\Models\Category $category
     * @return void
     */
    public function updated(Category $category)
    {
        LogJob::dispatch([
            'model'       => self::NAME,
            'action'      => 'UPDATED',
            'old_version' => collect($category->getRawOriginal())->toJson(),
            'new_version' => $category
        ]);
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param \App\Models\Category $category
     * @return void
     */
    public function deleted(Category $category)
    {
        LogJob::dispatch([
            'model'       => self::NAME,
            'action'      => 'DELETED',
            'old_version' => collect($category->getRawOriginal())->toJson(),
            'new_version' => $category
        ]);
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param \App\Models\Category $category
     * @return void
     */
    public function restored(Category $category)
    {
        LogJob::dispatch([
            'model'       => self::NAME,
            'action'      => 'RESTORED',
            'old_version' => collect($category->getRawOriginal())->toJson(),
            'new_version' => $category
        ]);
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param \App\Models\Category $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        LogJob::dispatch([
            'model'       => self::NAME,
            'action'      => 'FORCE_DELETED',
            'old_version' => collect($category->getRawOriginal())->toJson(),
            'new_version' => $category
        ]);
    }
}

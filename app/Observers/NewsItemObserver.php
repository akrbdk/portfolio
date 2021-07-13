<?php

namespace App\Observers;

use App\Events\NewsEvent;
use App\Models\News;

class NewsItemObserver
{
    /**
     * Handle the News "created" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function created(News $news)
    {
        $this->handle($news, __FUNCTION__);
    }

    /**
     * Handle the News "updated" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function updated(News $news)
    {
        $this->handle($news, __FUNCTION__);
    }

    /**
     * Handle the News "deleted" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function deleted(News $news)
    {
        $this->handle($news, __FUNCTION__);
    }

    /**
     * Handle the News "restored" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function restored(News $news)
    {
        $this->handle($news, __FUNCTION__);
    }

    /**
     * Handle the News "force deleted" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function forceDeleted(News $news)
    {
        $this->handle($news, __FUNCTION__);
    }

    private function handle(News $model, string $eventName)
    {
        NewsEvent::dispatch($model, $eventName);
    }
}

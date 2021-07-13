<?php

namespace App\Events;

use App\Models\News;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewsEvent
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(private News $news, private string $event)
    {
    }

    public function getModel(): News
    {
        return $this->news;
    }

    public function getEvent(): string
    {
        return $this->event;
    }
}

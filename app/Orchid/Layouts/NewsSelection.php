<?php

namespace App\Orchid\Layouts;

use App\Orchid\Filters\NewsFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class NewsSelection extends Selection
{
    /**
     * @return Filter[]
     */
    public function filters(): array
    {
        return [
            NewsFilter::class
        ];
    }
}

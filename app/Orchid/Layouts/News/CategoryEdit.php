<?php

namespace App\Orchid\Layouts\News;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Layouts\Rows;

class CategoryEdit extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): array
    {
        return [
            Input::make('row.title')->title('Title')->required(),
            Input::make('row.slug')->title('Slug'),
            Switcher::make('row.active')->title('Active')->sendTrueOrFalse()
        ];
    }
}

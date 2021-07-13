<?php

namespace App\Orchid\Layouts\News;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Layouts\Rows;

class ItemEditBody extends Rows
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
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function fields(): array
    {
        return [
            Picture::make('row.image')->title('Image')->targetId(),
            Quill::make('row.body'),
            Button::make('Save')
                ->method('saveItem')
                ->class('btn btn-secondary')
                ->icon('save')
        ];
    }
}

<?php

namespace App\Orchid\Layouts\News;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Layouts\Rows;

class ItemEditPreview extends Rows
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
            Picture::make('row.preview_image')->title('Preview image')->targetId(),
            Quill::make('row.brief'),
            Button::make('Save')
                ->method('saveItem')
                ->class('btn btn-secondary')
                ->icon('save')
        ];
    }
}

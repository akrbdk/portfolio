<?php

namespace App\Orchid\Layouts\News;

use App\Models\NewsCategory;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Layouts\Rows;

class ItemEditBase extends Rows
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
            Relation::make('row.category_id')
                ->fromModel(NewsCategory::class, 'title')
                ->title('Category'),
            Input::make('row.title')->title('Title')->required(),
            Input::make('row.slug')->title('Slug'),
            DateTimer::make('row.show_date')->title('Show date'),
            Switcher::make('row.active')->title('Active')->sendTrueOrFalse(),
            Button::make('Save')
                ->method('saveItem')
                ->class('btn btn-secondary')
                ->icon('save')
        ];
    }
}

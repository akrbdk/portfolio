<?php

namespace App\Orchid\Layouts\News;

use App\Models\News;
use App\Models\NewsCategory;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ItemList extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'list';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('title', 'Title')
                ->sort(true)
                ->filter(TD::FILTER_TEXT)
                ->render(function (News $item) {
                    return Link::make($item->title)->route('platform.news.item-edit', ['item' => $item->id]);
                }),
            TD::make('slug', 'Slug')->sort(),
            TD::make('active', 'Active')->booleanState()->sort(),
            TD::make('category_id', 'Category')->render(static fn(News $item) => $item->category?->title)->sort(),
            TD::make('created_at', 'Created at')->defaultHidden()->dateTimeString(),
            TD::make('updated_at', 'Updated at')->defaultHidden()->dateTimeString()
        ];
    }
}

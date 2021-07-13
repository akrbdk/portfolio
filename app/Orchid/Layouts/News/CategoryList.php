<?php

namespace App\Orchid\Layouts\News;

use App\Models\NewsCategory;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CategoryList extends Table
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
                ->render(function (NewsCategory $category) {
                    return Link::make($category->title)->route('platform.news.category-edit', ['category' => $category->id]);
                }),
            TD::make('slug', 'Slug'),
            TD::make('active', 'Active')->booleanState(),
            TD::make('news_count', 'News count')->render(function(NewsCategory $category) {
                return Link::make($category->news_count)->route('platform.news.item');
            }),
            TD::make('created_at', 'Created at')->defaultHidden()->dateTimeString(),
            TD::make('updated_at', 'Updated at')->defaultHidden()->dateTimeString()
        ];
    }
}

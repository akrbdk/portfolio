<?php

namespace App\Orchid\Screens\News;

use App\Models\NewsCategory;
use App\Orchid\Layouts\News\CategoryList;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class Category extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Category';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'News folder';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'list' => NewsCategory::query()->withCount('news')->paginate()
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Go back')->icon('arrow-left')->route('platform.main')
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            CategoryList::class
        ];
    }
}

<?php

namespace App\Orchid\Screens\News;

use App\Models\News;
use App\Orchid\Filters\NewsFilter;
use App\Orchid\Filters\RoleFilter;
use App\Orchid\Layouts\News\ItemList;
use App\Orchid\Layouts\NewsSelection;
use Orchid\Filters\Filter;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class Item extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'News item';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = 'News list';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'list' => News::query()
                ->with('category')
                ->filters()
                ->defaultSort('id')
                ->filtersApplySelection(NewsSelection::class)
                ->paginate()
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
            NewsSelection::class,
            ItemList::class
        ];
    }
}

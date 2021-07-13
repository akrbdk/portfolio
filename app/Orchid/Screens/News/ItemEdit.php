<?php

namespace App\Orchid\Screens\News;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class ItemEdit extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'News Edit';

    /**
     * Display header description.
     *
     * @var string|null
     */
    public $description = '';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(News $item): array
    {
        return [
            'row' => $item
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            Layout::tabs([
                'Base' => \App\Orchid\Layouts\News\ItemEditBase::class,
                'Preview' => \App\Orchid\Layouts\News\ItemEditPreview::class,
                'Body' => \App\Orchid\Layouts\News\ItemEditBody::class,
            ])
        ];
    }

    public function saveItem(News $item, Request $request)
    {
        $data = $request->input('row');
        $id = (int)$item->getIncrementing();

        if ($request->input('row.slug') && $item->slug !== $request->input('row.slug')) {
            $request->validate([
                'row.title' => 'max:255|required',
                'row.slug' => 'max:255|regex:/^[a-z0-9\-_]+$/i|unique:' . $item->getTable() . ',slug,' . $id,
            ]);
        }

        $item->fill($data);

        if (!$request->input('row.slug')) {
            $item->slug = Str::slug($request->input('row.title'));
            // TODO: check unique
        }

        if ($request->input('row.category_id')) {
            $category = NewsCategory::find($request->input('row.category_id'));
            $item->category()->associate($category);
        } else {
            $item->category()->dissociate();
        }

        $item->save();

        Toast::success('Row updated');
    }
}

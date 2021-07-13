<?php

namespace App\Orchid\Screens\News;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class CategoryEdit extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Category Edit';

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
    public function query(NewsCategory $category): array
    {
        return [
            'row' => $category
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
            Button::make('Save')->method('saveCategory')->icon('save')
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
            \App\Orchid\Layouts\News\CategoryEdit::class
        ];
    }

    public function saveCategory(NewsCategory $category, Request $request)
    {
        $data = $request->input('row');
        $category->fill($data);

        $category->save();

        Toast::success('Row updated');
    }
}

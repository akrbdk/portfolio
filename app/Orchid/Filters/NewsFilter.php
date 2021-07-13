<?php

namespace App\Orchid\Filters;

use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;

class NewsFilter extends Filter
{
    /**
     * @var array
     */
    public $parameters = [
        'title',
        'category'
    ];

    /**
     * @return string
     */
    public function name(): string
    {
        return 'News filter';
    }

    /**
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        $title = $this->request->get('title');
        $category = (int)$this->request->get('category');

        if ($title) {
            $builder->where('title', 'like', '%' . $this->request->get('title') . '%');
        }

        if ($category) {
            $builder->where('category_id', $category);
        }

        return $builder;
    }

    /**
     * @return Field[]
     */
    public function display(): array
    {
        return [
            Input::make('title')
                ->title('Search by title')
                ->value($this->request->get('title')),
            Relation::make('category')
                ->fromModel(NewsCategory::class, 'title')
                ->title('Category')
                ->value($this->request->get('category'))
        ];
    }
}

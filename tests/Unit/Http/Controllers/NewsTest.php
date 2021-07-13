<?php

declare(strict_types=1);

namespace Http\Controllers;

use App\Http\Controllers\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

final class NewsTest extends TestCase
{
    public function testList()
    {
        $news = \App\Models\News::query()->with(['previewImage'])->get();
        $response = $this->get(route('news.list'));

        $unActiveRow = $news->first(fn($el) => !$el->active);
        $activeRow = $news->first(fn($el) => $el->active);

        $this->assertTrue($response->getStatusCode() === Response::HTTP_OK);
        $this->assertStringContainsString($activeRow->title, $response->getContent());
        $this->assertStringNotContainsString($unActiveRow->title, $response->getContent());
    }
}

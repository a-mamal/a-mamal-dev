<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Support\MarkdownRenderer;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(MarkdownRenderer $markdownRenderer)
    {
        $articles = Article::latest()->get();

        foreach ($articles as $article) {
            $article->content = $markdownRenderer->render($article->content);
        }

        return view('pages.articles', compact('articles'));
    }
}

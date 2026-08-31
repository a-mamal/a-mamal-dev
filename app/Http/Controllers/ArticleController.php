<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Support\MarkdownRenderer;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();

        return view('pages.articles', compact('articles'));
    }

    public function show(string $slug, MarkdownRenderer $markdownRenderer)
    {
        // Find the article by its slug or return a 404 response if it doesn't exist
        $article = Article::where('slug', $slug)->firstOrFail();

        // Convert the article's Markdown content into HTML for display
        $article->content = $markdownRenderer->render($article->content);

        // Pass the article to the individual article view
        return view('pages.article', compact('article'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Project;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $articles = Article::where('is_published', true)->orderBy('updated_at', 'desc')->get();
        $projects = Project::orderBy('updated_at', 'desc')->get();

        $content = view('sitemap', compact('articles', 'projects'))->render();

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}

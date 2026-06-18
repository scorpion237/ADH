<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Project;
use App\Models\Stat;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $stats = Stat::orderBy('sort_order', 'asc')->get();
        $projects = Project::orderBy('created_at', 'desc')->get();
        $articles = Article::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->get();

        // Get settings in key-value format for easy template rendering
        $settings = Setting::all()->pluck('value', 'key')->all();

        return view('welcome', compact('stats', 'projects', 'articles', 'settings'));
    }

    public function showArticle($slug)
    {
        $article = Article::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $settings = Setting::all()->pluck('value', 'key')->all();
        
        // Load recent articles for the sidebar
        $recentArticles = Article::where('is_published', true)
            ->where('id', '!=', $article->id)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('articles.show', compact('article', 'recentArticles', 'settings'));
    }

    public function showProject($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $settings = Setting::all()->pluck('value', 'key')->all();
        
        // Load recent projects
        $recentProjects = Project::where('id', '!=', $project->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('projects.show', compact('project', 'recentProjects', 'settings'));
    }
}

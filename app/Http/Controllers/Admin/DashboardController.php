<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Project;
use App\Models\Stat;
use App\Models\Setting;

class DashboardController extends Controller
{
    public function index()
    {
        $articlesCount = Article::count();
        $projectsCount = Project::count();
        $statsCount = Stat::count();
        $settingsCount = Setting::count();

        $recentArticles = Article::orderBy('created_at', 'desc')->take(5)->get();
        $recentProjects = Project::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'articlesCount',
            'projectsCount',
            'statsCount',
            'settingsCount',
            'recentArticles',
            'recentProjects'
        ));
    }
}

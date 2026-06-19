<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);

        $data = $validated;
        $data['slug'] = Str::slug($validated['title']) . '-' . rand(100, 999);
        $data['is_published'] = $request->has('is_published');
        $data['published_at'] = $data['is_published'] ? ($validated['published_at'] ?? now()) : null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $data['image'] = '/storage/' . $path;
        }

        Article::create($data);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article créé avec succès !');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);

        $data = $validated;
        $data['is_published'] = $request->has('is_published');
        $data['published_at'] = $data['is_published'] ? ($validated['published_at'] ?? $article->published_at ?? now()) : null;

        if ($validated['title'] !== $article->title) {
            $data['slug'] = Str::slug($validated['title']) . '-' . rand(100, 999);
        }

        if ($request->hasFile('image')) {
            // Delete old image if it exists and is local
            if ($article->image && Str::startsWith($article->image, '/storage/')) {
                Storage::disk('public')->delete(Str::after($article->image, '/storage/'));
            }

            $path = $request->file('image')->store('articles', 'public');
            $data['image'] = '/storage/' . $path;
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article mis à jour avec succès !');
    }

    public function destroy(Article $article)
    {
        if ($article->image && Str::startsWith($article->image, '/storage/')) {
            Storage::disk('public')->delete(Str::after($article->image, '/storage/'));
        }

        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article supprimé avec succès !');
    }
}

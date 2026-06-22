<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Helpers\CloudinaryHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'           => 'required|string|max:255',
            'description'     => 'required|string',
            'content'         => 'required|string',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'budget'          => 'nullable|string|max:255',
            'location'        => 'nullable|string|max:255',
            'status'          => 'required|string|in:planning,ongoing,completed',
            'seo_title'       => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
        ]);

        $data = $validated;
        $data['slug'] = Str::slug($validated['title']) . '-' . rand(100, 999);

        if ($request->hasFile('image')) {
            $data['image'] = CloudinaryHelper::upload(
                $request->file('image')->getRealPath(),
                'projects'
            );
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Projet créé avec succès !');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'           => 'required|string|max:255',
            'description'     => 'required|string',
            'content'         => 'required|string',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'budget'          => 'nullable|string|max:255',
            'location'        => 'nullable|string|max:255',
            'status'          => 'required|string|in:planning,ongoing,completed',
            'seo_title'       => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
        ]);

        $data = $validated;

        if ($validated['title'] !== $project->title) {
            $data['slug'] = Str::slug($validated['title']) . '-' . rand(100, 999);
        }

        if ($request->hasFile('image')) {
            if ($project->image && Str::startsWith($project->image, 'https://res.cloudinary.com')) {
                CloudinaryHelper::delete($project->image);
            }

            $data['image'] = CloudinaryHelper::upload(
                $request->file('image')->getRealPath(),
                'projects'
            );
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Projet mis à jour avec succès !');
    }

    public function destroy(Project $project)
    {
        if ($project->image && Str::startsWith($project->image, 'https://res.cloudinary.com')) {
            CloudinaryHelper::delete($project->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Projet supprimé avec succès !');
    }
}
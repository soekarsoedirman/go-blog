<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index() {
        $blogs = Blog::latest()->get();
        return view('blogs.index', compact('blogs'));
    }

    public function create() {
        return view('blogs.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        Blog::create($data);
        return redirect()->route('blogs.index');
    }

    public function show(Blog $blog) {
        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog) {
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $blog->update($data);
        return redirect()->route('blogs.index');
    }

    public function destroy(Blog $blog) {
        $blog->delete();
        return redirect()->route('blogs.index');
    }
}

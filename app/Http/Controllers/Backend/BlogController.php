<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    //--index
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('backend.pages.blogs.index', [
            'blogs'=>$blogs
        ]);
    }

    //--create
    public function create()
    {
        return view('backend.pages.blogs.create');
    }

    //--store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'banner' => 'required|image|mimes:png,jpg,jpeg,webp',
            'thumbnail' => 'image|mimes:png,jpg,jpeg,webp',
        ]);

        //--banner image upload
        if ($request->hasFile('banner')) {
            $banner_name = uniqid() . '_' . 'banner' . '.' . $request->file('banner')->extension();
            $request->file('banner')->move(public_path('uploads/Blogs/banner'), $banner_name);
        }

        //---date store blog table--
        $blog = Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'banner' => $banner_name,
        ]);

        if ($blog) {
            //--thumbnail image upload
            if ($request->hasFile('thumbnail')) {
                $thumbnail_name = uniqid() . '_' . 'thumbnail' . '.' . $request->file('thumbnail')->extension();
                $request->file('thumbnail')->move(public_path('uploads/Blogs/thumbnail'), $thumbnail_name);
                $blog->update([
                    'thumbnail'=>$thumbnail_name
                ]);
            }
        }

        return redirect()->route('admin.blogs')->with('success', 'Blog Upload Successfully!');
    }

    //-----edit
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('backend.pages.blogs.edit', [
            'blog'=>$blog
        ]);
    }

    //-----update
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'description' => 'required',
            'banner' => 'image|mimes:png,jpg,jpeg,webp',
            'thumbnail' => 'image|mimes:png,jpg,jpeg,webp',
        ]);
        $blog = Blog::findOrFail($id);
        //----blog post update
        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
        ]);

        //---thumbnail updated---
        if ($request->hasFile('thumbnail')) {
            $oldFile = $blog->thumbnail;
            $oldPath = 'uploads/Blogs/thumbnail/' . $oldFile;
            if ($oldPath) {
                File::delete(public_path($oldPath));
            }

            $NewName = uniqid() . '_' . 'thumbnail_update' . '.' . $request->file('thumbnail')->extension();
            $request->file('thumbnail')->move(public_path('uploads/Blogs/thumbnail'), $NewName);
            $blog->update([
                'thumbnail' => $NewName,
            ]);
        }

        //---banner updated---
        if ($request->hasFile('banner')) {
            $oldFile = $blog->banner;
            $oldPath = 'uploads/Blogs/banner/' . $oldFile;
            if ($oldPath) {
                File::delete(public_path($oldPath));
            }

            $NewName = uniqid() . '_' . 'banner_update' . '.' . $request->file('banner')->extension();
            $request->file('banner')->move(public_path('uploads/Blogs/banner'), $NewName);
            $blog->update([
                'banner' => $NewName,
            ]);
        }

        return redirect()->back()->with('success', 'Blog Updated Successfully!');
    }

    //----delete
    public function delete($id)
    {
         $blog = Blog::findOrFail($id);

         //---thumbnail delete--
         if($blog->thumbnail){
            $oldFile = $blog->thumbnail;
            $oldPath = 'uploads/Blogs/thumbnail/' . $oldFile;
            if ($oldPath) {
                File::delete(public_path($oldPath));
            }
         }

         //---banner delete--
         if($blog->banner){
            $oldFile = $blog->banner;
            $oldPath = 'uploads/Blogs/banner/' . $oldFile;
            if ($oldPath) {
                File::delete(public_path($oldPath));
            }
         }

         $blog->delete();
         return redirect()->back()->with('success', 'Blog Deleted Successfully!');
    }
}

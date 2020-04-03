<?php

namespace App\Http\Controllers\blog;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function show(Post $post){
        return view('blog.show')->with('post',$post);
    }

    public function category(Category $category){

        return view('blog.category')
            ->with('category',$category)
            ->with('tags',Tag::all())
            ->with('posts',$category->posts()->Searched()->simplePaginate(3))
            ->with('categories',Category::all());
    }

    public function tag(Tag $tag){
        return view('blog.tag')
            ->with('tag',$tag)
            ->with('tags',Tag::all())
            ->with('posts',$tag->posts()->Searched()->simplePaginate(3))
            ->with('categories',Category::all());
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\User;
use TCG\Voyager\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogController extends Controller
{
    public function index()
      {
        // Retrieve all posts
        $allPosts = Blog::with('author', 'categories')
            ->where('status', 'PUBLISHED')
            ->orderBy('category_id', 'asc')
            ->get();

        $featuredPosts = Blog::where('status', 'PUBLISHED')
            ->where('featured', 1)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        $spotedPost = Blog::with('author', 'categories')
            ->where('status', 'PUBLISHED')
            ->orderBy('created_at', 'desc')
            ->take(1)
            ->get();
        
        $categories = DB::select('SELECT * FROM categories 
                WHERE ((SELECT COUNT(category_id) 
                FROM posts 
                WHERE category_id = categories.id) >= 5) AND parent_id IS NULL;');
        
        // Inisialisasi array untuk menampung hasil gabungan
        $combinedResults = [];
        
        foreach ($categories as $category) {
            // Ambil 5 randomPost berdasarkan kategori yang terpilih
            $randomPost = Blog::with('author', 'categories')
                ->where('category_id', $category->id)
                ->where('status', 'PUBLISHED')
                ->inRandomOrder()
                ->take(5)
                ->get();
        
            // Gabungkan hasil ke dalam array
            $combinedResults[] = [
                'category' => $category,
                'randomPost' => $randomPost,
            ];
        }

        $trendingPost = Blog::with('author','categories')
            ->where('status', 'PUBLISHED')
            ->orderBy('viewed', 'desc')->take(5)->get();


        $leftPosts = Blog::with('categories')
            ->where('status', 'PUBLISHED')
            ->orderBy('created_at', 'desc')
            ->skip(1)
            ->take(3)
            ->get();

        $rightPosts = Blog::with('categories')
            ->where('status', 'PUBLISHED')
            ->orderByDesc('created_at', 'desc')->skip(4)->take(3)->get();

        return view('blog.index', compact('allPosts', 'featuredPosts','trendingPost', 'leftPosts','rightPosts','spotedPost', 'categories', 'combinedResults'));
   
      }

      public function show($slug)
      {
        $post = Blog::with('author','categories')->where('slug', $slug)->first();

        $latest = Blog::with('author','categories')
            ->where('status', 'PUBLISHED')
            ->orderBy('created_at', 'desc')->take(7)->get();

        $trendingPost = Blog::with('author','categories')
            ->where('status', 'PUBLISHED')
            ->orderBy('viewed', 'desc')->take(7)->get();

        $post->increment('viewed');

        return view('blog.show', compact('post','trendingPost','latest'));
      }

      public function category($category)
      {
        $news = Blog::with('author', 'categories')
            ->whereHas('categories', function ($query) use ($category) {
                $query->where('name', $category);
            })->paginate(5);
    
        // Akses data paginasi
        $totalPosts = $news->total(); // Total jumlah post
        $currentPage = $news->currentPage(); // Halaman saat ini
        $perPage = $news->perPage(); // Jumlah post per halaman
        $links = $news->links(); // Link paginasi
       
        $latest = Blog::with('author','categories')
            ->where('status', 'PUBLISHED')
            ->orderBy('created_at', 'desc')->take(7)->get();

        $trendingPost = Blog::with('author','categories')
            ->where('status', 'PUBLISHED')
            ->orderBy('viewed', 'desc')->take(7)->get();

        return view('blog.category', compact('news', 'category','totalPosts', 'currentPage','perPage', 'links', 'latest', 'trendingPost'));
      }

}

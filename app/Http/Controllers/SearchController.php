<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Sesuaikan dengan model dan kolom yang ingin Anda cari
        $results = Blog::with(['categories', 'author'])
        ->where('title', 'LIKE', "%$query%")
        ->orWhere('body', 'LIKE', "%$query%")
        ->paginate(5);

        $totalPosts = $results->total(); // Total jumlah post
        $currentPage = $results->currentPage(); // Halaman saat ini
        $perPage = $results->perPage(); // Jumlah post per halaman
        $links = $results->links(); // Link paginasi
       
        $latest = Blog::with('author','categories')
            ->where('status', 'PUBLISHED')
            ->orderBy('created_at', 'desc')->take(7)->get();

        $trendingPost = Blog::with('author','categories')
            ->where('status', 'PUBLISHED')
            ->orderBy('viewed', 'desc')->take(7)->get();

        return view('search-results', compact('results', 'currentPage','perPage', 'links', 'totalPosts', 'latest', 'trendingPost'));
    }
}

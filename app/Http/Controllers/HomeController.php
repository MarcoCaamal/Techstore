<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get active products as top components
        $topComponents = Product::with(['category'])
            ->where('is_active', true)
            ->limit(8)
            ->get();

        // Get recent active products as featured
        $featuredProducts = Product::with(['category'])
            ->where('is_active', true)
            ->limit(6)
            ->get();

        // If not enough products, get latest ones
        if ($topComponents->count() < 5) {
            $topComponents = Product::with(['category'])
                ->latest()
                ->limit(8)
                ->get();
        }

        if ($featuredProducts->count() < 3) {
            $featuredProducts = Product::with(['category'])
                ->latest()
                ->limit(6)
                ->get();
        }

        return view('components.home.main', compact('topComponents', 'featuredProducts'));
    }

    public function products(Request $request)
    {
        // Get search parameters
        $search = $request->get('search');
        $category = $request->get('category');
        $minPrice = $request->get('min_price');
        $maxPrice = $request->get('max_price');
        $sortBy = $request->get('sort_by', 'latest');

        // Base query for products
        $query = Product::with(['category']);

        // Apply search filter
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%")
                  ->orWhereHas('category', function($categoryQuery) use ($search) {
                      $categoryQuery->where('name', 'LIKE', "%{$search}%");
                  });
            });
        }

        // Apply category filter
        if ($category && $category !== 'all') {
            $query->whereHas('category', function($categoryQuery) use ($category) {
                $categoryQuery->where('slug', $category)
                             ->orWhere('name', 'LIKE', "%{$category}%");
            });
        }

        // Apply price range filter
        if ($minPrice !== null) {
            $query->where('price', '>=', $minPrice);
        }
        if ($maxPrice !== null) {
            $query->where('price', '<=', $maxPrice);
        }

        // Apply sorting
        switch ($sortBy) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'rating':
                $query->orderBy('created_at', 'desc'); // Fallback since rating doesn't exist
                break;
            case 'featured':
                $query->where('is_active', true)->orderBy('created_at', 'desc');
                break;
            default: // latest
                $query->orderBy('created_at', 'desc');
                break;
        }

        // Get paginated results
        $products = $query->paginate(12)->appends($request->query());

        // Get featured products (top components) for display
        $topComponents = Product::with(['category'])
            ->where('is_active', true)
            ->limit(8)
            ->get();

        // If not enough products in top components, get latest ones
        if ($topComponents->count() < 5) {
            $topComponents = Product::with(['category'])
                ->latest()
                ->limit(8)
                ->get();
        }

        // Get all categories for filter dropdown
        $categories = \App\Models\Category::all();

        return view('components.home.products', compact('products', 'topComponents', 'categories', 'request'));
    }

    public function offers()
    {
        // Get products that are active (simulating discounts)
        $flashSaleProducts = Product::with(['category'])
            ->where('is_active', true)
            ->orderBy('price', 'desc')
            ->limit(6)
            ->get();

        // Get featured products on sale (active products)
        $featuredOffers = Product::with(['category'])
            ->where('is_active', true)
            ->limit(8)
            ->get();

        return view('components.home.offers', compact('flashSaleProducts', 'featuredOffers'));
    }

    /**
     * Display support page.
     */
    public function support()
    {
        return view('components.home.support');
    }

    public function contact()
    {
        return view('components.home.contact');
    }

    public function cart(Request $request)
    {
        // Assuming you have a Cart model or service to handle cart items
        $cartItems = []; // Replace with actual cart retrieval logic

        return view('components.home.cart', compact('cartItems'));
    }
}

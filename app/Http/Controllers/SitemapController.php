<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\blog;
use App\Models\ApprovedUrl;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function generateUrls()
    {
        $urls = [];

        // Products
        $urls[] = url("/products");
        $productUrls = Product::pluck('slug')->map(function ($slug) {
            return url("/products/{$slug}");
        });
        $urls = array_merge($urls, $productUrls->all());

        // Product Categories
        $urls[] = url("/categories");
        $categoryUrls = Category::pluck('slug')->map(function ($slug) {
            return url("/categories/{$slug}");
        });
        $urls = array_merge($urls, $categoryUrls->all());

        // Product Subcategories
        $urls[] = url("/subcategories");
        $subcategoryUrls = Subcategory::pluck('slug')->map(function ($slug) {
            return url("/sub-categories/{$slug}");
        });
        $urls = array_merge($urls, $subcategoryUrls->all());

        // Services
        $urls[] = url("/services");
        $serviceUrls = Service::pluck('slug')->map(function ($slug) {
            return url("/services/{$slug}");
        });
        $urls = array_merge($urls, $serviceUrls->all());

        // Service Categories
        $urls[] = url("/service-categories");
        $serviceCategoryUrls = ServiceCategory::pluck('slug')->map(function ($slug) {
            return url("/service-categories/{$slug}");
        });
        $urls = array_merge($urls, $serviceCategoryUrls->all());

        // Blogs
        $urls[] = url("/blogs");
        $blogUrls = blog::pluck('blog_slug')->map(function ($blog_slug) {
            return url("/blogs/{$blog_slug}");
        });
        $urls = array_merge($urls, $blogUrls->all());

        return $urls;
    }

    public function index()
    {
        $generatedUrls = $this->generateUrls();
        $approvedUrls = ApprovedUrl::pluck('original_url')->toArray();

        $newUrls = array_diff($generatedUrls, $approvedUrls);
        return view('admin.sitemap', compact('newUrls'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'original_urls' => 'required|array',
            'original_urls.*' => 'required|url',
            'editable_urls' => 'required|array',
            'editable_urls.*' => 'required|url',
            'priorities' => 'required|array',
            'priorities.*' => 'required|numeric|min:0|max:1',
            'frequencies' => 'required|array',
            'frequencies.*' => 'required|in:always,hourly,daily,weekly,monthly,yearly,never',
        ]);

        foreach ($validatedData['original_urls'] as $key => $originalUrl) {
            ApprovedUrl::create([
                'original_url' => $originalUrl,
                'editable_url' => $validatedData['editable_urls'][$key],
                'priority' => $validatedData['priorities'][$key],
                'frequency' => $validatedData['frequencies'][$key],
            ]);
        }

        return redirect()->route('admin.sitemap.index')->with('success', 'URLs approved and added successfully.');
    }

    public function showApprovedUrls()
    {
        $approvedUrls = ApprovedUrl::latest()->paginate(30);
        return view('admin.approved-urls', compact('approvedUrls'));
    }

    public function updateApprovedUrls(Request $request)
    {
        $validatedData = $request->validate([
            'urls' => 'required|array',
            'urls.*.id' => 'required|exists:approved_urls,id',
            'urls.*.editable_url' => 'required|url',
            'urls.*.priority' => 'required|numeric|min:0|max:1',
            'urls.*.frequency' => 'required|in:always,hourly,daily,weekly,monthly,yearly,never',
        ]);

        foreach ($validatedData['urls'] as $urlData) {
            ApprovedUrl::where('id', $urlData['id'])->update([
                'editable_url' => $urlData['editable_url'],
                'priority' => $urlData['priority'],
                'frequency' => $urlData['frequency'],
            ]);
        }

        return response()->json(['success' => true]);
    }
}
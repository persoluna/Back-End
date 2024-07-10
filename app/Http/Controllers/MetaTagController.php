<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Subcategory;
use App\Models\blog;
use App\Models\MetaTag;
use Illuminate\Http\Request;

class MetaTagController extends Controller
{
    public function index()
    {
        $metaTags = MetaTag::all(); // or use pagination
        return view('meta-tags.index', compact('metaTags'));
    }

    public function create()
    {
        // Pass the available types to the view
        $types = [
            'Product' => Product::class,
            'Category' => Category::class,
            'Subcategory' => Subcategory::class,
            'Service' => Service::class,
            'ServiceCategory' => ServiceCategory::class,
            'Blog' => blog::class,
        ];

        return view('meta-tags.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'metatagable_type' => 'required',
            'metatagable_id' => 'required',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'canonical' => 'nullable|string',
            'author' => 'nullable|string',
            'language' => 'nullable|string',
            'copyright' => 'nullable|string',
            'content_type' => 'nullable|string',
            'rating' => 'nullable|string',
            'robots' => 'nullable|string',
            'googlebot' => 'nullable|string',
            'distribution' => 'nullable|string',
            'schema' => 'nullable|string',
            'viewport' => 'nullable|string',
            'keywords' => 'nullable|string',
            'revisit_after' => 'nullable|string',
            'refresh' => 'nullable|string',
            'og_title' => 'nullable|string',
            'og_type' => 'nullable|string',
            'og_url' => 'nullable|string',
            'og_image' => 'nullable|string',
            'og_description' => 'nullable|string',
            'twitter_card' => 'nullable|string',
            'twitter_site' => 'nullable|string',
            'twitter_title' => 'nullable|string',
            'twitter_description' => 'nullable|string',
            'twitter_image' => 'nullable|string',
        ]);

        $metaTag = new MetaTag($request->all());
        $metaTag->save();

        return redirect()->route('meta-tags.index')->with('success', 'Meta tag created successfully.');
    }

    public function edit(MetaTag $metaTag)
    {
        return view('meta-tags.edit', compact('metaTag'));
    }

    public function update(Request $request, MetaTag $metaTag)
    {
        $validated = $request->validate([
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'canonical' => 'nullable|string',
            'author' => 'nullable|string',
            'language' => 'nullable|string',
            'copyright' => 'nullable|string',
            'content_type' => 'nullable|string',
            'rating' => 'nullable|string',
            'robots' => 'nullable|string',
            'googlebot' => 'nullable|string',
            'distribution' => 'nullable|string',
            'schema' => 'nullable|string',
            'viewport' => 'nullable|string',
            'keywords' => 'nullable|string',
            'revisit_after' => 'nullable|string',
            'refresh' => 'nullable|string',
            'og_title' => 'nullable|string',
            'og_type' => 'nullable|string',
            'og_url' => 'nullable|string',
            'og_image' => 'nullable|string',
            'og_description' => 'nullable|string',
            'twitter_card' => 'nullable|string',
            'twitter_site' => 'nullable|string',
            'twitter_title' => 'nullable|string',
            'twitter_description' => 'nullable|string',
            'twitter_image' => 'nullable|string',
        ]);

        $metaTag->update($validated);
        return redirect()->route('meta-tags.index')->with('success', 'Meta Tag updated successfully.');
    }

    public function destroy(MetaTag $metaTag)
    {
        $metaTag->delete();
        return redirect()->route('meta-tags.index')->with('success', 'Meta Tag deleted successfully.');
    }

    public function getItems($type)
    {
        switch ($type) {
            case 'Product':
                $items = Product::all(['id', 'product_name']);
                break;
            case 'Category':
                $items = Category::all(['id', 'name']);
                break;
            case 'Subcategory':
                $items = Subcategory::all(['id', 'name']);
                break;
            case 'Service':
                $items = Service::all(['id', 'name']);
                break;
            case 'ServiceCategory':
                $items = ServiceCategory::all(['id', 'name']);
                break;
            case 'Blog':
                $items = Blog::all(['id', 'blog_title']);
                break;
            default:
                $items = [];
        }

        return response()->json($items);
    }
}

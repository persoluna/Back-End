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
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Carbon\Carbon;

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

        $urls[] = url("/about");
        $urls[] = url("/globalpresences");
        $urls[] = url("/infrastructures");
        $urls[] = url("/qualitycontrols");
        $urls[] = url("/team");
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

    public function generateSitemap()
    {
        try {
            $approvedUrls = ApprovedUrl::all();

            $this->generateProductSitemap($approvedUrls);
            $this->generateServiceSitemap($approvedUrls);
            $this->generateBlogSitemap($approvedUrls);
            $this->generateMainSitemap($approvedUrls);
            $this->generateSitemapIndex();

            if (request()->ajax() || request()->wantsJson()) {
                return response()->json(['message' => 'Sitemaps generated successfully']);
            }

            return back()->with('success', 'Sitemaps generated successfully');
        } catch (\Exception $e) {
            \Log::error('Sitemap generation error: ' . $e->getMessage());

            if (request()->ajax() || request()->wantsJson()) {
                return response()->json(['error' => 'An error occurred while generating the sitemaps'], 500);
            }

            return back()->with('error', 'An error occurred while generating the sitemaps');
        }
    }

    private function generateProductSitemap($approvedUrls)
    {
        $urls = $approvedUrls->filter(function($url) {
            return Str::contains($url->editable_url, ['/products', '/categories', '/sub-categories']);
        });

        $this->saveSitemapFile('product.xml', $urls);
    }

    private function generateServiceSitemap($approvedUrls)
    {
        $urls = $approvedUrls->filter(function($url) {
            return Str::contains($url->editable_url, ['/services', '/service-categories']);
        });

        $this->saveSitemapFile('service.xml', $urls);
    }

    private function generateBlogSitemap($approvedUrls)
    {
        $urls = $approvedUrls->filter(function($url) {
            return Str::contains($url->editable_url, '/blogs');
        });

        $this->saveSitemapFile('blog.xml', $urls);
    }

    private function generateMainSitemap($approvedUrls)
    {
        $mainUrls = ['/', '/about', '/globalpresences', '/infrastructures', '/qualitycontrols', '/team'];
        $urls = $approvedUrls->filter(function($url) use ($mainUrls) {
            return in_array(parse_url($url->editable_url, PHP_URL_PATH), $mainUrls);
        });

        $this->saveSitemapFile('main.xml', $urls);
    }

    private function saveSitemapFile($filename, $urls)
    {
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;

        $urlset = $dom->createElement('urlset');
        $urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $dom->appendChild($urlset);

        foreach ($urls as $url) {
            $urlElement = $dom->createElement('url');

            $loc = $dom->createElement('loc', $url->editable_url);
            $urlElement->appendChild($loc);

            // Generate a random timestamp within the last week
            $randomDate = Carbon::now()->subDays(rand(0, 7))->format('c');
            $lastmod = $dom->createElement('lastmod', $randomDate);
            $urlElement->appendChild($lastmod);

            $changefreq = $dom->createElement('changefreq', $url->frequency);
            $urlElement->appendChild($changefreq);

            $priority = $dom->createElement('priority', number_format($url->priority, 1));
            $urlElement->appendChild($priority);

            $urlset->appendChild($urlElement);
        }

        $xmlContent = $dom->saveXML();
        $filePath = public_path($filename);
        file_put_contents($filePath, $xmlContent);
    }

    private function generateSitemapIndex()
    {
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;

        $sitemapindex = $dom->createElement('sitemapindex');
        $sitemapindex->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $dom->appendChild($sitemapindex);

        $sitemaps = ['product.xml', 'service.xml', 'blog.xml', 'main.xml'];

        $currentTime = Carbon::now()->format('c');

        foreach ($sitemaps as $sitemap) {
            $sitemap_element = $dom->createElement('sitemap');
            $loc = $dom->createElement('loc', url($sitemap));
            $sitemap_element->appendChild($loc);

            $lastmod = $dom->createElement('lastmod', $currentTime);
            $sitemap_element->appendChild($lastmod);

            $sitemapindex->appendChild($sitemap_element);
        }

        $xmlContent = $dom->saveXML();
        $filePath = public_path('sitemap.xml');
        file_put_contents($filePath, $xmlContent);
    }
}
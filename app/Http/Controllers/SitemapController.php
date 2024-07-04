<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        return view('admin.sitemap');
    }

    public function generate(Request $request)
    {
        $xml = $this->generateSitemapXML();
        return response()->json(['xml' => $xml]);
    }

    public function publish(Request $request)
    {
        $xml = $request->input('xml');
        file_put_contents(public_path('sitemap.xml'), $xml);
        return view('admin.sitemap');
    }

    private function generateSitemapXML()
    {
        $routes = $this->getFrontendRoutes();
        $xml = new \SimpleXMLElement('<urlset/>');
        $xml->addAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        foreach ($routes as $route) {
            $url = $xml->addChild('url');
            $url->addChild('loc', url($route));
        }

        return $xml->asXML();
    }

    private function getFrontendRoutes()
    {
        $filePath = base_path('routes/frontend.txt');
        $routes = [];

        if (file_exists($filePath)) {
            $file = fopen($filePath, 'r');
            while (($line = fgets($file)) !== false) {
                $line = trim($line);
                if (!empty($line) && preg_match('/Route::get\(\'([^\']+)\'/', $line, $matches)) {
                    $routes[] = $matches[1];
                }
            }
            fclose($file);
        }

        return $routes;
    }
}

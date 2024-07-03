<?php
namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\blog;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $productCount = Product::count();
        $categoryCount = Category::count();
        $subCategoryCount = Subcategory::count();
        $blogCount = blog::count();

        $selectedYear = $request->input('year') ? $request->input('year') : Carbon::now()->year;

        $userInquiries = Inquiry::selectRaw('DATE_FORMAT(created_at, "%b") as formatted_month,
                                             SUM(CASE WHEN is_GPM = 1 THEN 1 ELSE 0 END) as gpm_count,
                                             SUM(CASE WHEN is_GPM = 0 THEN 1 ELSE 0 END) as seo_count')
            ->whereYear('created_at', $selectedYear)
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%m")'), DB::raw('DATE_FORMAT(created_at, "%b")'))
            ->orderBy(DB::raw('DATE_FORMAT(created_at, "%m")'))
            ->get();

        $totalInquiries = Inquiry::count();
        $yearlyInquiries = $userInquiries->sum('gpm_count') + $userInquiries->sum('seo_count');
        $inquiryPercentage = ($totalInquiries > 0) ? ($yearlyInquiries / $totalInquiries) * 100 : 0;

        $years = DB::table('user_inquiries')
                ->select(DB::raw('YEAR(created_at) as year'))
                ->distinct()
                ->orderByDesc('year')
                ->pluck('year')
                ->toArray();

        $gpmInquiriesCount = Inquiry::gpm()->count();
        $seoInquiriesCount = Inquiry::seo()->count();

        return view('dashboard', compact(
            'productCount', 'categoryCount', 'subCategoryCount', 'blogCount',
            'userInquiries', 'totalInquiries', 'inquiryPercentage', 'years',
            'selectedYear', 'yearlyInquiries', 'gpmInquiriesCount', 'seoInquiriesCount'));
    }

    public function getInquiryDetails($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        return response()->json($inquiry);
    }
}

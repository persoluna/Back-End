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

        $userInquiries = DB::table('user_inquiries')
            ->select(
                DB::raw('DATE_FORMAT(created_at, "%b") as formatted_month'), // Use "%b" for abbreviated month name
                DB::raw('COUNT(*) as inquiry_count')
            )
            ->whereYear('created_at', $selectedYear)
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%m")'), DB::raw('DATE_FORMAT(created_at, "%b")')) // Include "%b" in GROUP BY
            ->get();

        $totalInquiries = DB::table('user_inquiries')->count();
        $yearlyInquiries = $userInquiries->sum('inquiry_count');
        $inquiryPercentage = ($totalInquiries > 0) ? ($yearlyInquiries / $totalInquiries) * 100 : 0;

        $years = DB::table('user_inquiries')
                ->select(DB::raw('YEAR(created_at) as year'))
                ->distinct()
                ->orderByDesc('year')
                ->pluck('year')
                ->toArray();

        return view('dashboard', compact('productCount', 'categoryCount', 'subCategoryCount', 'blogCount', 'userInquiries', 'totalInquiries', 'inquiryPercentage', 'years', 'selectedYear', 'yearlyInquiries'));
    }
}

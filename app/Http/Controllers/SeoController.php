<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Analytics;
use Spatie\Analytics\Period;

class SeoController extends Controller
{

    public function showTopReferrers()
    {
        $period = Period::days(90);
        $topReferrer = Analytics::fetchTopReferrers($period, 100);
        return view('analytics.topreferrers', ['topReferrer' => $topReferrer]);
    }

    public function showTopOperatingSystems()
    {
        $period = Period::days(90);
        $osData = Analytics::fetchTopOperatingSystems($period, 100);
        return view('analytics.operating-systems', ['osData' => $osData]);
    }

    public function showCountryVisits()
    {
        $period = Period::days(90);
        $countryData = Analytics::fetchTopCountries($period, 100);
        return view('analytics.countries', ['countryData' => $countryData]);
    }

    public function showMostVisits()
    {
        $period = Period::days(90);
        $mostvisitedpages = Analytics::fetchMostVisitedPages($period, 100);
        return view('analytics.mostvisitedpages', ['mostvisitedpages' => $mostvisitedpages]);
    }

    public function getVisitorsAndPageViews()
    {
        $period = Period::days(90);
        $data = Analytics::fetchVisitorsAndPageViews($period);
        return response()->json($data);
    }

    public function getVisitorsAndPageViewsByDate()
    {
        $period = Period::days(90);
        $data = Analytics::fetchVisitorsAndPageViewsByDate($period);
        return response()->json($data);
    }

    public function getTotalVisitorsAndPageViews()
    {
        $period = Period::days(90);
        $data = Analytics::fetchTotalVisitorsAndPageViews($period);
        return response()->json($data);
    }

    public function getMostVisitedPages()
    {
        $period = Period::days(90);
        $data = Analytics::fetchMostVisitedPages($period, 20);
        return response()->json($data);
    }

    public function getTopReferrers()
    {
        $period = Period::days(90);
        $data = Analytics::fetchTopReferrers($period, 20);
        return response()->json($data);
    }

    public function getUserTypes()
    {
        $period = Period::days(90);
        $data = Analytics::fetchUserTypes($period);
        return response()->json($data);
    }

    public function getTopBrowsers()
    {
        $period = Period::days(90);
        $data = Analytics::fetchTopBrowsers($period, 10);
        return response()->json($data);
    }

    public function getTopCountries()
    {
        $period = Period::days(90);
        $data = Analytics::fetchTopCountries($period, 10);
        return response()->json($data);
    }

    public function getTopOperatingSystems()
    {
        $period = Period::days(90);
        $data = Analytics::fetchTopOperatingSystems($period, 10);
        return response()->json($data);
    }

    public function index()
    {
        $period = Period::days(90);
        $topBrowsers = Analytics::fetchTopBrowsers($period, 6);
        $getVisitorsAndPageViews = Analytics::fetchVisitorsAndPageViews($period, 5);
        $getTopOperatingSystems = Analytics::fetchTopOperatingSystems($period, 5);
        $topCountries = Analytics::fetchTopCountries($period, 100);
        return view('SEO.index', compact('topBrowsers', 'getVisitorsAndPageViews', 'getTopOperatingSystems', 'topCountries'));
    }
}

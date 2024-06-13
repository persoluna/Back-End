<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use App\Models\UserLocation;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $ipAddress = $request->ip();
        $position = Location::get('62.211.101.30');

        $userLocation = new UserLocation();
        $userLocation->ip = $position->ip;
        $userLocation->countryName = $position->countryName;
        $userLocation->currencyCode = $position->currencyCode;
        $userLocation->countryCode = $position->countryCode;
        $userLocation->regionCode = $position->regionCode;
        $userLocation->regionName = $position->regionName;
        $userLocation->cityName = $position->cityName;
        $userLocation->zipCode = $position->zipCode;
        $userLocation->isoCode = $position->isoCode;
        $userLocation->postalCode = $position->postalCode;
        $userLocation->latitude = $position->latitude;
        $userLocation->longitude = $position->longitude;
        $userLocation->metroCode = $position->metroCode;
        $userLocation->areaCode = $position->areaCode;
        $userLocation->timezone = $position->timezone;
        $userLocation->save();

        return view('welcome');
    }

    public function getUserCounts()
    {
        $userCounts = UserLocation::selectRaw('countryName, count(*) as count')
            ->groupBy('countryName')
            ->pluck('count', 'countryName')
            ->toArray();

        return response()->json($userCounts);
    }
}
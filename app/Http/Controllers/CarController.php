<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\Color;
use App\Models\Location;
use App\Models\Year;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'brand' => 'nullable|integer|min:0',
            'location' => 'nullable|integer|min:0',
            'year' => 'nullable|array|min:0',
            'year.*' => 'nullable|integer|min:1',
            'color' => 'nullable|integer|min:0',
            'sort' => 'nullable|string|in:new-to-old,old-to-new,low-to-high,high-to-low',
            'page' => 'nullable|integer|min:1',
            'perPage' => 'nullable|integer|in:15,30,60,120',
            'active' => 'nullable|boolean',
        ]);

        $f_brand = $request->has('brand') ? $request->brand : 0;
        $f_location = $request->has('location') ? $request->location : 0;
        $f_year = $request->has('year') ? $request->year : [];
        $f_color = $request->has('color') ? $request->color : 0;
        $f_sort = $request->has('sort') ? $request->sort : null;
        $f_page = $request->has('page') ? $request->page : 1;
        $f_perPage = $request->has('perPage') ? $request->perPage : 15;
        $f_active = $request->has('active') ? $request->active : 1;

        $cars = Car::when($f_brand, function ($query) use ($f_brand) {
            $query->where('brand_id', $f_brand);
        })
            ->when($f_location, function ($query) use ($f_location) {
                $query->where('location_id', $f_location);
            })
            ->when($f_year, function ($query) use ($f_year) {
                $query->whereIn('year_id', $f_year);
            })
            ->when($f_color, function ($query) use ($f_color) {
                $query->where('color_id', $f_color);
            })
            ->where('active', $f_active)
            ->with('brand', 'location', 'year', 'color')
            ->when(isset($f_sort), function ($query) use ($f_sort) {
                if ($f_sort == 'old-to-new') {
                    $query->orderBy('id');
                } elseif ($f_sort == 'high-to-low') {
                    $query->orderBy('price', 'desc');
                } elseif ($f_sort == 'low-to-high') {
                    $query->orderBy('price');
                } else {
                    $query->orderBy('id', 'desc');
                }
            }, function ($query) {
                $query->orderBy('id', 'desc');
            })
            ->paginate($f_perPage, ['*'], 'page', $f_page)
            ->withQueryString();

        $brands = Brand::orderBy('name')
            ->get();
        $locations = Location::orderBy('name')
            ->get();
        $years = Year::orderBy('name')
            ->get();
        $colors = Color::orderBy('name')
            ->get();

        return view('car.index')
            ->with([
                'cars' => $cars,
                'brands' => $brands,
                'locations' => $locations,
                'years' => $years,
                'colors' => $colors,
                'f_brand' => $f_brand,
                'f_location' => $f_location,
                'f_year' => $f_year,
                'f_color' => $f_color,
                'f_sort' => $f_sort,
                'f_perPage' => $f_perPage,
                'f_active' => $f_active,
            ]);
    }


    public function show($id)
    {
        $car = Car::findOrFail($id);

        return view('car.show')
            ->with([
                'car' => $car,
            ]);
    }
}

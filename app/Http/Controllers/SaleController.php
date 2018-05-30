<?php

namespace App\Http\Controllers;

use App\Models\Admin\Property;
use Illuminate\Http\Request;
use App\Models\Admin\Category;

class SaleController extends Controller
{
    protected $static_data, $default_language;
    public function __construct(){
        $this->static_data = static_home();
        $this->default_language = default_language();
    }

    public function index(Request $request)
    {
        $static_data = $this->static_data;
        $default_language = $this->default_language;
        $title = 'Sale | Findaproperty';
        $categories = Category::get();
        $recent_properties = Property::orderBy('created_at', 'desc')->take(Property::RECENT_PROPERTIES)->get();
        if ( ! empty($request->all())) {
            $properties = Property::where('sales', 1)->where('status', 1);
            if (isset($request->type)) {
                $properties->where('category_id', $request->type);
            }
            if (isset($request->beds)) {
                $properties->each(function ($value) use ($request) {
                    return $value->property_info['bedrooms'] == $request->beds;
                });
            }
            if (isset($request->lower) && isset($request->upper)) {
                $filter_properties = $properties->get()->filter(function ($value) use ($request) {
                    return $value->prices['service_charge'] >= $request->lower && $value->prices['service_charge'] <= $request->upper;
                })->values();
            }
            $search_properties = $filter_properties;
            return view('realstate.sale', compact('static_data', 'search_properties', 'recent_properties', 'categories', 'title'));
        }
        $properties = Property::where('sales', 1)->where('status', 1)->orderBy('created_at', 'desc')->paginate(Property::GET_PROPERTIES);
        
        return view('realstate.sale', compact('static_data', 'properties', 'recent_properties', 'categories', 'title'));
    }
}

<?php

// Important functions 

use App\Models\Category;
use App\Models\Product;
use App\Models\Settings;

if (!function_exists('p')) {
    function p($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

if (!function_exists('get_formatted_date')) {
    function get_formatted_date($date, $format)
    {
        $formattedDate = date($format, strtotime($date));
        return $formattedDate;
    }
}





if (!function_exists('mainCategory')) {
    function mainCategory()
    {
        $data = Category::where('parent_id', 0)->where('status', 1)->select('id', 'category_name')->get();

        return $data;
    }
}


if (!function_exists('settings')) {
    function settings()
    {
        $data = Settings::all();
        $settingData = array();
        foreach ($data as $datavalue) {
            $settingData[$datavalue['setting_key']] = $datavalue['setting_value'];
        }
        return $settingData;
    }
}

<?php

// Important functions 

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



use App\Models\category;
use App\Models\product;
use App\Models\User;




if (!function_exists('adminProfile')) {
    function adminProfile()
    {
        $data = User::select('id', 'name', 'email')
            ->first();
        return $data;
    }
}

if (!function_exists('mainCategory')) {
    function mainCategory()
    {
        $data = category::where('parent_id', 0)->where('status', 1)->select('id', 'category')->get();
        return $data;
    }
}
if (!function_exists('homePageProducts')) {
    function homePageProducts()
    {
        $data = product::where('products.status', 1)
            ->where('categories.status', 1)
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.uid as product_id', 'products.*', 'categories.*')
            ->orderBy('categories.category')
            ->paginate(6);
        // return $data;
        return 'hey';
    }
}

if (!function_exists('navBar_mainCat')) {
    function navBar_mainCat()
    {
        $navBar_showMainCat = category::where('status', 1)->where('parent_id', 0)->select('categories.*', 'category as mainCat')->get();
        return $navBar_showMainCat;
    }
}
if (!function_exists('navBar_subCat')) {
    function navBar_subCat()
    {
        $data = category::where('status', 1)->where('parent_id', 0)->select('categories.*', 'category as mainCat')
            ->get();

        $mainCatId = array();
        $mainCat = array();

        foreach ($data as $value) {
            $mainCatId[] = $value['id'];
            $mainCat[] = $value['category'];
        }
        $results = category::where(function ($query) use ($mainCatId) {
            foreach ($mainCatId as $item) {
                $query->orWhere('parent_id', $item);
            }
        })->get();
        return $results;
    }
    if (!function_exists('count_product')) {
        function count_product($cat)
        {
            $data = category::where('categories.category', $cat)
                ->join('products', 'categories.id', 'products.sub_cat')
                ->where('products.status', 1)
                ->get();
            return count($data);
        }
    }

    /* Column 1 data */
    if (!function_exists('get_random_subcat1')) {
        function get_random_subcat1()
        {

            $data = product::where('products.status', 1)
                ->where('categories.status', 1)
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.uid as product_id', 'products.*', 'categories.*')
                ->limit(5)->inRandomOrder()->get();
            return $data;
        }
    }
    /* Column 2 data */
    if (!function_exists('get_random_subcat2')) {
        function get_random_subcat2()
        {
            $data = product::where('products.status', 1)
                ->where('categories.status', 1)
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.uid as product_id', 'products.*', 'categories.*')
                ->limit(5)->inRandomOrder()->get();
            return $data;
        }
    }
    /* Column 3 data */
    if (!function_exists('get_random_subcat3')) {
        function get_random_subcat3()
        {
            // $data = category::where('categories.parent_id', 7)
            //     ->join('products', 'categories.id', 'products.sub_cat')
            //     ->where('products.status', 1)
            //     ->limit(5)
            //     ->get();
            // return $data;
            $data = product::where('products.status', 1)
                ->where('categories.status', 1)
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.uid as product_id', 'products.*', 'categories.*')
                ->limit(5)->inRandomOrder()->get();
            return $data;
        }
    }
}

<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Response;

use App\Models\ProductsModel;

class ProductController extends Controller
{
	// function get all products
    public function getAllProducts(){
    	return response()->json((new ProductsModel)->getAllProductsData(), 200);
    }

    // function get all categories
    public function getAllCategories(){
    	return response()->json((new ProductsModel)->getAllCategories(), 200);
    }

    // function get trending products
    public function getTrendingPRoducts(){
    	return response()->json((new ProductsModel)->getTrendingPRoducts(), 200);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    // protected $table = 'rop_products';
    // protected $fillabel = [
    // 	'prod_id',
    // 	'prod_name',
    // 	'prod_cat_id',
    // 	'prod_image',
    // 	'prod_rent',
    // 	'prod_rent_currency_id',
    // 	'prod_rent_category',
    // 	'prod_varient',
    // 	'created',
    // 	'register_by',
    // 	'modified',
    // 	'modified_by',
    // 	'record_deleted',
    // ];

   // model function get all products with custom query
    public function getAllProductsData(){
    	$products = \DB::select("SELECT rop_products.prod_id AS product_id, rop_products.prod_name ASproduct_name, rop_prod_categories.cat_name AS product_category, rop_products.prod_image AS product_image, rop_products.prod_cat_id AS product_category, CONCAT (rop_products.prod_rent, ' ', rop_currencies.curr_name) AS product_rent, rop_products.prod_rent_category AS rent_category, rop_products.prod_varient AS varients, rop_products.created, rop_products.modified, rop_products.record_deleted
    		FROM rop_products
			INNER JOIN rop_currencies ON rop_products.prod_rent_currency_id = rop_currencies.id
			INNER JOIN rop_prod_categories ON rop_products.prod_cat_id = rop_prod_categories.cat_id;");

    // getting product review and rating count
    	$review_count = '';
    	foreach ($products as $product) {
    	// calculating product review
    		$review_count = \DB::select("SELECT COUNT(rop_prod_review.review_id) AS product_review_count FROM rop_prod_review INNER JOIN rop_products ON rop_prod_review.prod_id = rop_products.prod_id WHERE  rop_prod_review.prod_id = '".$product->product_id."';");
    		$product->product_review = $review_count[0]->product_review_count;

    	// getting product rating count
    		$rating_count = '';
    		$rating_count = \DB::select("SELECT AVG(rop_prod_ratings.rating_star) AS avg_rating, COUNT(rop_prod_ratings.rating_id) AS product_rating FROM rop_prod_ratings INNER JOIN rop_products ON rop_prod_ratings.prod_id = rop_products.prod_id WHERE rop_prod_ratings.prod_id = '".$product->product_id."';");
    		$product->product_rating = $rating_count[0]->product_rating;
    		$product->product_avg_rating = round($rating_count[0]->avg_rating, 1) ;
    	}

    	// check if products have found or not
    	if (count($products) == 0) {
    		return "Nor products found";
    	}
    	else{
    		return $products;
    	}
    }

   // model function get all categories
    public function getAllCategories(){
    	$categories = \DB::select("SELECT rop_prod_categories.cat_name AS category_name, rop_prod_categories.cat_id AS category_id FROM rop_prod_categories WHERE rop_prod_categories.record_deleted = 0;");

    	// check if categories have found or not
    	if (count($products) == 0) {
    		return "Nor categories found";
    	}
    	else{
    		return $products;
    	}
    }

    // get trending products
    public function getTrendingPRoducts(){
    	$trendingProducts = \DB::select("SELECT rop_products.prod_id AS product_id, rop_products.prod_name AS product_name, rop_prod_categories.cat_name AS product_category, rop_products.prod_image AS product_image, rop_products.prod_cat_id AS product_category, CONCAT (rop_products.prod_rent, ' ', rop_currencies.curr_name) AS product_rent, rop_products.prod_rent_category AS rent_category, rop_products.prod_varient AS varients, rop_products.created, rop_products.modified, rop_products.record_deleted
    		FROM rop_products
			INNER JOIN rop_currencies ON rop_products.prod_rent_currency_id = rop_currencies.id
			INNER JOIN rop_prod_categories ON rop_products.prod_cat_id = rop_prod_categories.cat_id
			WHERE rop_products.trending_product = 1;");

    // getting product review and rating count
    	$review_count = '';
    	foreach ($trendingProducts as $product) {
    	// calculating product review
    		$review_count = \DB::select("SELECT COUNT(rop_prod_review.review_id) AS product_review_count FROM rop_prod_review INNER JOIN rop_products ON rop_prod_review.prod_id = rop_products.prod_id WHERE  rop_prod_review.prod_id = '".$product->product_id."';");
    		$product->product_review = $review_count[0]->product_review_count;

    	// getting product rating count
    		$rating_count = '';
    		$rating_count = \DB::select("SELECT AVG(rop_prod_ratings.rating_star) AS avg_rating, COUNT(rop_prod_ratings.rating_id) AS product_rating FROM rop_prod_ratings INNER JOIN rop_products ON rop_prod_ratings.prod_id = rop_products.prod_id WHERE rop_prod_ratings.prod_id = '".$product->product_id."';");
    		$product->product_rating = $rating_count[0]->product_rating;
    		$product->product_avg_rating = round($rating_count[0]->avg_rating, 1) ;
    	}

    	// check if products have found or not
    	if (count($trendingProducts) == 0) {
    		return "Nor trending products found";
    	}
    	else{
    		return $trendingProducts;
    	}
    }
}

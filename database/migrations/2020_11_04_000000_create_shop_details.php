<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $date = new DateTime();
        $unixTimeStamp = $date->getTimestamp();

        /*
        |--------------------------------------------------------------------------
        | Marital Status
        |--------------------------------------------------------------------------
        */
        Schema::connection('mysql')->create('rop_user', function (Blueprint $table) {
            $table->increments('user_id', true)->unsigned();
            $table->string('user_name', 99);
            $table->string('user_full_name');
            $table->text('user_email');
            $table->string('user_country');
            $table->string('user_role');
            $table->string('user_status');
            $table->integer('created')->unsigned();
            $table->integer('register_by')->unsigned();
            $table->integer('modified')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->boolean('record_deleted')->default(0);

            $table->engine = 'InnoDB';
        });
        DB::connection('mysql')->table('rop_user')->insert([
            [
                'user_name' => 'R.gurg',
                'user_full_name' => 'Rentickle',
                'user_email' => 'r.gurgaon@domain.com',
                'user_country' => 'AUS',
                'user_role' => 'user',
                'user_status' => 'active',
                'created' => $unixTimeStamp,
                'register_by' => 1,
                'modified' => $unixTimeStamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ],
            [
                'user_name' => 'f.hector',
                'user_full_name' => 'Frank Hector',
                'user_email' => 'f.hector@domain.com',
                'user_country' => 'USA',
                'user_role' => 'user',
                'user_status' => 'active',
                'created' => $unixTimeStamp,
                'register_by' => 1,
                'modified' => $unixTimeStamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ]
        ]);
        /*
        |--------------------------------------------------------------------------
        | Family Relationship
        |--------------------------------------------------------------------------
        */
        Schema::connection('mysql')->create('rop_prod_categories', function (Blueprint $table) {
            $table->increments('cat_id', true)->unsigned();
            $table->string('cat_name', 99);
            $table->string('cat_description')->default('');
            $table->integer('created')->unsigned();
            $table->integer('register_by')->unsigned();
            $table->integer('modified')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->boolean('record_deleted')->default(0);

            $table->engine = 'InnoDB';
        });
        DB::connection('mysql')->table('rop_prod_categories')->insert([
            [
                'cat_name' => 'Bed Room',
                'cat_description' => '',
                'created' => $unixTimeStamp,
                'register_by' => 1,
                'modified' => $unixTimeStamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ],
            [
                'cat_name' => 'Living Room',
                'cat_description' => '',
                'created' => $unixTimeStamp,
                'register_by' => 1,
                'modified' => $unixTimeStamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ],
            [
                'cat_name' => 'DSLR Camera',
                'cat_description' => '',
                'created' => $unixTimeStamp,
                'register_by' => 1,
                'modified' => $unixTimeStamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ],
            [
                'cat_name' => 'Applications',
                'cat_description' => '',
                'created' => $unixTimeStamp,
                'register_by' => 1,
                'modified' => $unixTimeStamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ],
            [
                'cat_name' => 'Stroage',
                'cat_description' => '',
                'created' => $unixTimeStamp,
                'register_by' => 1,
                'modified' => $unixTimeStamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ],
            [
                'cat_name' => 'Packages',
                'cat_description' => '',
                'created' => $unixTimeStamp,
                'register_by' => 1,
                'modified' => $unixTimeStamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ]
        ]);

        /*
        |--------------------------------------------------------------------------
        | Data Single Type
        |--------------------------------------------------------------------------
        */
        Schema::connection('mysql')->create('rop_currencies', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('curr_name', 99);
            $table->integer('created')->unsigned();
            $table->integer('register_by')->unsigned();
            $table->integer('modified')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->boolean('record_deleted')->default(0);

            $table->engine = 'InnoDB';
        });
        DB::connection('mysql')->table('rop_currencies')->insert([
            [
                'curr_name' => 'AUS',
                'created' => $unixTimeStamp,
                'register_by' => 1,
                'modified' => $unixTimeStamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ],
            [
                'curr_name' => 'INR',
                'created' => $unixTimeStamp,
                'register_by' => 1,
                'modified' => $unixTimeStamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ],
            [
                'curr_name' => 'PKR',
                'created' => $unixTimeStamp,
                'register_by' => 1,
                'modified' => $unixTimeStamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ],
            [
                'curr_name' => 'USD',
                'created' => $unixTimeStamp,
                'register_by' => 1,
                'modified' => $unixTimeStamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ]
        ]);
        Schema::connection('mysql')->create('rop_products', function (Blueprint $table) {
            $table->increments('prod_id', true)->unsigned();
            $table->string('prod_name', 155);
            $table->integer('prod_cat_id');
            $table->string('prod_image');
            $table->string('prod_rent');
            $table->string('prod_rent_currency_id');
            $table->string('prod_rent_category');
            $table->string('prod_varient');
            $table->boolean('trending_product')->default(0);
            $table->integer('created')->unsigned();
            $table->integer('register_by')->unsigned();
            $table->integer('modified')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->boolean('record_deleted')->default(0);

            $table->engine = 'InnoDB';
        });
        DB::connection('mysql')->table('rop_products')->insert([
            [
                'prod_name' => 'Sofa Baleria',
                'prod_cat_id' => 1,
                'prod_image' => '',
                'prod_rent' => '799',
                'prod_rent_currency_id' => 2,
                'prod_rent_category' => 'Month',
                'prod_varient' => '6x3,6x4,6x5,6x5,6x6',
                'trending_product' => 0,
                'created' => $unixTimeStamp,
                'register_by' => 1,
                'modified' => $unixTimeStamp,
                'modified_by' => 1,
                'record_deleted' => 0
            ]
        ]);

        // product ratings
        Schema::connection('mysql')->create('rop_prod_ratings', function (Blueprint $table) {
            $table->increments('rating_id', true)->unsigned();
            $table->integer('prod_id');
            $table->integer('rating_star');
            $table->integer('rated_by');
            $table->integer('created')->unsigned();

            $table->engine = 'InnoDB';
        });
        DB::connection('mysql')->table('rop_prod_ratings')->insert([
            [
                'prod_id' => 1,
                'rating_star' => 4,
                'rated_by' => 1,
                'created' => $unixTimeStamp
            ],
            [
                'prod_id' => 1,
                'rating_star' => 5,
                'rated_by' => 2,
                'created' => $unixTimeStamp
            ],
            [
                'prod_id' => 1,
                'rating_star' => 3,
                'rated_by' => 3,
                'created' => $unixTimeStamp
            ],
            [
                'prod_id' => 1,
                'rating_star' => 5,
                'rated_by' => 4,
                'created' => $unixTimeStamp
            ],
            [
                'prod_id' => 2,
                'rating_star' => 5,
                'rated_by' => 1,
                'created' => $unixTimeStamp
            ]
        ]);

        // product reviews
        Schema::connection('mysql')->create('rop_prod_review', function (Blueprint $table) {
            $table->increments('review_id', true)->unsigned();
            $table->integer('prod_id');
            $table->text('review_text');
            $table->integer('review_by');
            $table->integer('created')->unsigned();

            $table->engine = 'InnoDB';
        });
        DB::connection('mysql')->table('rop_prod_review')->insert([
            [
                'prod_id' => 1,
                'review_text' => 'Very good product',
                'review_by' => 1,
                'created' => $unixTimeStamp
            ],
            [
                'prod_id' => 1,
                'review_text' => 'Nice Customer care',
                'review_by' => 2,
                'created' => $unixTimeStamp
            ],
            [
                'prod_id' => 1,
                'review_text' => 'Bad product, not recomended',
                'review_by' => 3,
                'created' => $unixTimeStamp
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->drop('rop_user');
        Schema::connection('mysql')->drop('rop_prod_categories');
        Schema::connection('mysql')->drop('rop_currencies');
        Schema::connection('mysql')->drop('rop_products');
        Schema::connection('mysql')->drop('rop_prod_ratings');
        Schema::connection('mysql')->drop('rop_prod_review');
    }
}
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingPackageView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE VIEW listing_package_view AS
                SELECT
                    listing_package.listing_id AS listing_id,
                    listing_package.package_id AS package_user_id,
                    package_user.package_id AS package_id
                    
                FROM listing_package
                INNER JOIN package_user
                ON listing_package.package_id = package_user.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement("DROP VIEW IF EXISTS listing_package_view");
    }
}

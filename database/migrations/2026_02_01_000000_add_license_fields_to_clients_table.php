<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLicenseFieldsToClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            if (!Schema::hasColumn('clients', 'drug_license_number')) {
                $table->string('drug_license_number', 100)->nullable()->after('credit_limit');
            }
            if (!Schema::hasColumn('clients', 'fssai_license_number')) {
                $table->string('fssai_license_number', 100)->nullable()->after('drug_license_number');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            if (Schema::hasColumn('clients', 'fssai_license_number')) {
                $table->dropColumn('fssai_license_number');
            }
            if (Schema::hasColumn('clients', 'drug_license_number')) {
                $table->dropColumn('drug_license_number');
            }
        });
    }
}

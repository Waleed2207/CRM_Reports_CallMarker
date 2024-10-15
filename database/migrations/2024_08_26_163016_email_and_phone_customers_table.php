<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmailAndPhoneCustomersTable extends Migration
{
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            if (!Schema::hasColumn('customers', 'email')) {
                $table->string('email')->unique()->after('name');
            }
            if (!Schema::hasColumn('customers', 'phone_number')) {
                $table->string('phone_number')->after('email');
            }
        });
    }

    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            if (Schema::hasColumn('customers', 'email')) {
                $table->dropColumn('email');
            }
            if (Schema::hasColumn('customers', 'phone_number')) {
                $table->dropColumn('phone_number');
            }
        });
    }
}

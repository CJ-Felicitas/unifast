<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwdaVersionsTable extends Migration
{
    public function up()
    {
        Schema::create('swda_versions', function (Blueprint $table) {
            $table->id();
            $table->string('Type', 254)->nullable();
            $table->string('Sector', 254)->nullable();
            $table->string('Cluster', 254)->nullable();
            $table->string('Agency', 254)->nullable();
            $table->string('Address', 254)->nullable();
            $table->string('Former_Name', 254)->nullable();
            $table->string('Contact_Number', 254)->nullable();
            $table->string('Fax', 254)->nullable();
            $table->string('Email', 254)->nullable();
            $table->string('Website', 254)->nullable();
            $table->string('Contact_Person', 254)->nullable();
            $table->string('Position', 254)->nullable();
            $table->string('Mobile_Number', 254)->nullable();
            $table->string('Registered', 254)->nullable();
            $table->string('Licensed', 254)->nullable();
            $table->string('Accredited', 254)->nullable();
            $table->string('Services_Offered', 254)->nullable();
            $table->string('Simplified_Services', 254)->nullable();
            $table->string('Area_of_Operation', 254)->nullable();
            $table->string('Regional_Operation', 254)->nullable();
            $table->string('Specified_Areas_of_Operation', 254)->nullable();
            $table->string('Mode_of_Delivery', 254)->nullable();
            $table->string('Clientele', 254)->nullable();
            $table->string('Registration_ID', 254)->nullable();
            $table->string('Registration_Date', 254)->nullable();
            $table->string('Registration_Expiration', 254)->nullable();
            $table->string('Registration_Status', 254)->nullable();
            $table->string('Licensed_ID', 254)->nullable();
            $table->string('License_Date_Issued', 254)->nullable();
            $table->string('License_Expiration', 254)->nullable();
            $table->string('License_Status', 254)->nullable();
            $table->string('Accreditation_ID', 254)->nullable();
            $table->string('Accreditation_Date_Issued', 254)->nullable();
            $table->string('Accreditation_Expiration', 254)->nullable();
            $table->string('Accreditation_Status', 254)->nullable();
            $table->string('Remarks', 254)->nullable();
            $table->integer('License_Days_Left')->nullable();
            $table->integer('Licensure_Overdue')->nullable();
            $table->integer('Accreditation_Days_Left')->nullable();
            $table->integer('Accreditation_Overdue')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('swda_versions');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('graduation_id')->constrained()->onDelete('cascade'); // Assuming this relates to a graduations table
            $table->string('name'); // Skill name
            $table->string('degree')->nullable(); // Skill degree (e.g., percentage)
            $table->timestamps(); // Created and updated timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('skills');
    }
}

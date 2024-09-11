<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            // Job table primary key
            $table->id();
            
            // Foreign keys
            $table->unsignedBigInteger('field_id'); // Field associated with the job
            $table->unsignedBigInteger('company_id'); // Company associated with the job
            
            // Job details
            $table->string('name'); // Job name/title
            $table->string('location'); // Work location
            $table->integer('number'); // Number of vacancies
            $table->date('announcement_date'); // Date when the job was announced
            $table->integer('years_of_experience'); // Years of experience required
            $table->string('required_qualification'); // Qualification required for the job
            $table->enum('type', ['Full time', 'Part time', 'Remotely'])->default('Full time'); // Job type (full-time, part-time, remotely)
            $table->enum('required_gender', ['Male', 'Female', 'Not Specified'])->default('Not Specified'); // Gender preference for the job
            $table->decimal('salary', 8, 2); // Salary offered
            $table->string('computer_type'); // Computer proficiency required
            $table->longText('description'); // Detailed job description
            
            // Timestamps for tracking creation and updates
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade'); // If a field is deleted, related jobs are also deleted
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade'); // If a company is deleted, related jobs are also deleted
        });
    }

    public function down()
    {
        // Drop the jobs table if the migration is rolled back
        Schema::dropIfExists('jobs');
    }
}

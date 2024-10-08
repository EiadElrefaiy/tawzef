<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Company;
use App\Models\Field;
use App\Models\Faculty;
use App\Models\Degree;
use App\Models\Graduation;
use App\Models\Job;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Certification;
use App\Models\JobApplication;
use App\Models\Visit;

trait ModelHelperTrait
{
    /**
     * Get the model class based on the table name
     *
     * @param string $table
     * @return string|null
     */
    private function getModelClass($table)
    {
        $models = [
            'users' => User::class,
            'companies' => Company::class,
            'fields' => Field::class,
            'faculty' => Faculty::class,
            'degree' => Degree::class,
            'graduations' => Graduation::class,
            'jobs' => Job::class,
            'educations' => Education::class,
            'experiences' => Experience::class,
            'job_applications' => JobApplication::class,
            'skills' => Skill::class,
            'visits' => Visit::class,
        ];

        return $models[$table] ?? null;
    }

    /**
     * Get the relationships to be eager loaded based on the model class
     *
     * @param string $modelClass
     * @return array
     */
    private function getRelationships($modelClass)
    {
        $relationships = [
            Company::class => ['jobs'],
            Field::class => ['jobs'],
            Faculty::class => ['graduations','educations'],
            Degree::class => ['educations'],
            Graduation::class =>  ['faculty', 'educations', 'experiences' , 'jobs', 'skills'],
            Job::class => ['company' , 'field' , 'applications' , 'graduations'],
            Education::class => ['faculty', 'degree'],
            Experience::class => ['graduation'],
            Skill::class => ['graduation'],
            JobApplication::class => [],
            // Add other relationships here
        ];

        return $relationships[$modelClass] ?? [];
    }
}

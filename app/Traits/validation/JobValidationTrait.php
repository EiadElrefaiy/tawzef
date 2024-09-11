<?php

namespace App\Traits\validation;

trait JobValidationTrait
{
    /**
     * Get the validation rules for the job form.
     *
     * @return array
     */
    public function jobValidationRules()
    {
        return [
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'number' => 'required|integer|min:1',
            'announcement_date' => 'required|date',
            'salary' => 'required|numeric|min:0',
            'field_id' => 'required|exists:fields,id',
            'type' => 'required|in:Full time,Part time,Remotely',
            'years_of_experience' => 'required|integer|min:0',
            'required_gender' => 'required|in:Male,Female,Not Specified',
            'required_qualification' => 'required|in:مؤهل عالي,مؤهل متوسط,لا يشترط',
            'computer_type' => 'required|in:ممتاز,جيد,مقبول',
            'description' => 'required|string',
        ];
    }

    /**
     * Get the custom validation messages for the job form.
     *
     * @return array
     */
    public function jobValidationMessages()
    {
        return [
            'name.required' => 'اسم الوظيفة مطلوب',
            'name.string' => 'اسم الوظيفة يجب أن يكون نصًا',
            'name.max' => 'اسم الوظيفة يجب ألا يزيد عن 255 حرفًا',
            'location.required' => 'مقر العمل مطلوب',
            'number.required' => 'عدد الوظائف المطلوبة مطلوب',
            'number.integer' => 'عدد الوظائف يجب أن يكون عددًا صحيحًا',
            'announcement_date.required' => 'تاريخ الإعلان مطلوب',
            'announcement_date.date' => 'تاريخ الإعلان غير صحيح',
            'salary.required' => 'الراتب مطلوب',
            'salary.numeric' => 'الراتب يجب أن يكون رقمًا',
            'field_id.required' => 'مجال العمل مطلوب',
            'field_id.exists' => 'المجال المختار غير موجود',
            'type.required' => 'نوع الوظيفة مطلوب',
            'type.in' => 'نوع الوظيفة غير صحيح',
            'years_of_experience.required' => 'سنوات الخبرة مطلوبة',
            'years_of_experience.integer' => 'سنوات الخبرة يجب أن تكون عددًا صحيحًا',
            'required_gender.required' => 'الجنس المطلوب مطلوب',
            'required_gender.in' => 'الجنس المطلوب غير صحيح',
            'required_qualification.required' => 'المؤهل المطلوب مطلوب',
            'required_qualification.in' => 'المؤهل المطلوب غير صحيح',
            'computer_type.required' => 'مستوى الحاسب الآلي مطلوب',
            'computer_type.in' => 'مستوى الحاسب الآلي غير صحيح',
            'description.required' => 'وصف الوظيفة مطلوب',
        ];
    }
}

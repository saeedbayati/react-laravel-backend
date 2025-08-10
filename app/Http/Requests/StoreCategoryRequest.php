<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        // اگر فقط ادمین باید اجازه داشته باشد می‌توانی چک بزنی.
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'وارد کردن نام دسته‌بندی الزامی است.',
            'name.string'   => 'نام دسته‌بندی باید رشته باشد.',
            'name.max'      => 'نام دسته‌بندی نباید بیشتر از ۲۵۵ کاراکتر باشد.',
            'name.unique'   => 'این نام دسته‌بندی قبلاً ثبت شده است.',
        ];
    }
}

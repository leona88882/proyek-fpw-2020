<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class cek_sup implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        if ($value=="0"){
            // dd($value);
            return 1===2;
        }else{
            return 1===1;
        }
        return 1===1;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Tolong Pilih salah satu Supplier! Jika tidak ada silahkan tambahkan terlebih dahulu.';
    }
}

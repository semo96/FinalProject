<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class VaildPhone implements Rule

//class VaildPhone extends \Illuminate\Validation\Validator
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
         preg_match("/^[77|73|71]+[0-9]{7}$/",$value,$matches) ;
         return $matches;
  

    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'هناك خطأ';
      // return  preg_match("/^77|73|71\d{7}$/", $value);
    }
}

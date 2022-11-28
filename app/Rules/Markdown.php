<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Markdown implements Rule
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
        if (!empty($value))
        {
          $ext = $value->getClientOriginalExtension();
          if ($ext == 'md')
          {
            return true;
          }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a file of type: md';
    }
}

<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PurposeCheck implements Rule
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
    

    public function passes($attribute, $purpose)
    {
        // Check if the purpose text input contains one of the following words
        $requiredWords = array('puhkus', 'remont', 'koduelektroonika', 'pulmad', 'rent', 'auto', 'kool', 'investeering');

        foreach($requiredWords as $word) {
            if (stripos($purpose,$word) !== false) return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Kasutuseesmärk peab sisaldama ühte järgnevaist sõnadest:
            puhkus, remont, koduelektroonika, pulmad, rent, auto, kool või investeering';
    }
}

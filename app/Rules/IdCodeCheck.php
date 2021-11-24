<?php

namespace App\Rules;

use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Validation\Rule;
use Barryvdh\Debugbar\Facade as DebugBar;


class IdCodeCheck implements Rule
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
    public function passes($attribute, $id_code)
    {
        // Check if the ID code starts with 3-6. Also get the century for birthday validation
        switch($id_code[0]){
            case 3:
            case 4:
                $century = 19;
                break;
            case 5:
            case 6:
                $century = 20;
                break;
            default:
                return false;
        }
        // Get the year, month and day of birth
        $birthyear = intval($century.$id_code[1].$id_code[2]);
        $birthmonth = intval($id_code[3].$id_code[4]);
        $birthday = intval($id_code[5].$id_code[6]);

        // Get birthdate in the format that is used in Estonia
        $birthdate = date($birthday.".".$birthmonth.".".$birthyear);

        // Check if birthdate is valid (also includes leap year calculations)
        if(checkdate($birthmonth, $birthday, $birthyear) == false ){
            return false;
        }

        // Check that birthdate is not in the future
        $today = date('d.m.Y');

        if(strtotime($birthdate) > strtotime($today)){
            return false;
        }

        return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Palun sisestage korrektne isikukood';
    }
}

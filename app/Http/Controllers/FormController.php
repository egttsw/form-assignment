<?php

namespace App\Http\Controllers;

use App\Rules\IdCodeCheck;
use App\Rules\PurposeCheck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;



class FormController extends Controller
{
    public function getData(Request $req){
    // --- Validation ---

        // Error messages in Estonian
        $messages = [
            'name.required'             => 'Nimi on vajalik',
            'name.regex'                => 'Sisesta vähemalt 2 nime (ees- ja perekonnanimi)',
            'personal-id-code.required' => 'Isikukood on vajalik',
            'personal-id-code.digits'   => 'Isikukood peab olema 11 numbrit pikk',
            'loan-amount.required'      => 'Laenu summa on vajalik!',
            'loan-amount.numeric'       => 'Sisesta laenu summa numbrites',
            'loan-amount.min'           => 'Laenu summa peab olema vähemalt 1000 eurot',
            'loan-amount.max'           => 'Laenu summa ei tohi ületada 10000 eurot',
            'period.required'           => 'Laenu periood on vajalik',
            'period.min'                => 'Laenu periood peab olema vähemalt 6 kuud',
            'period.max'                => 'Laenu periood ei tohi ületada 24 kuud',
            'purpose.min'               => 'Laenu periood peab olema vähemalt 6 kuud',
            'purpose.required'          => 'Laenu kasutuseesmärk on vajalik',
        ];
            

        // Validation rules
        $req->validate([
            'name'             =>  ['required', 'regex:/ /'],
            'personal-id-code' =>  ['required', 'digits:11', new IdCodeCheck],
            'loan-amount'      =>  ['required', 'numeric', 'min: 1000', 'max: 10000'],
            'period'           =>  ['required', 'numeric', 'min: 6', 'max: 24'],
            'purpose'          =>  ['required', new PurposeCheck]
        ], $messages);

    // Store output to file
        writeToFile($req);

      return view('success');
    }
}

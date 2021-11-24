<?php

use Illuminate\Http\Request;

function writeToFile(Request $req){

    // Use name input for file name
    $filename = strval($req->input('name'));
    $filename = $filename."1";

    // Increment filename for multiple loans from the same name
    while(Storage::disk('local')->exists($filename.'.json')){
        $filename++;
    }
    $filename = $filename.".json";
    
    // Get data from request and remove token and the empty slot
    $data = $req->except('_token');
    
    $output = [
        'Name' => $req->input('name'),
        'Id-code' => $req->input('personal-id-code'),
        'Loan-amount' => $req->input('loan-amount'),
        'Period' => $req->input('period'),
        'Purpose' => $req->input('purpose'),
    ];

    // Write the posted data to the file
    // foreach ($data as $key => $value) {
    //     if ($value != ''){
    //         Storage::disk('local')->append($filename, $value);
    //     }
    // }
    
    // Store the file to storage/app
    Storage::disk('local')->put($filename, json_encode($output));
}
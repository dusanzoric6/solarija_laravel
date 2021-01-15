<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SabiranjeController extends Controller
{
    public function sabiranje()
    {

//        dd(eval('return ' . $string . ';'));

        $first_number = \request('first-number');
        $second_number = \request('second-number');
        $operacion = \request('operation');


        $result = eval('return ' . $first_number.$operacion.$second_number . ';');

        return view('window.sabiranje', [
            'result' => $result,
        ]);

    }
}

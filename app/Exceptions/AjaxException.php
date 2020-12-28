<?php

namespace App\Exceptions;

use TimeoutException;

class AjaxException extends Exception
{
    public function citySelect(Request $request)
    {
        try{
            report($request);
            return true;
        }catch (Exception $exception){
            report($exception);
            return false;
        }
    }
}

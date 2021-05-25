<?php

namespace App\Exceptions;

use App\Facades\APIResponse;
use Exception;

class AuthenticationException extends Exception
{
    protected $message,
    $redirect,
    $data;

    public function __construct($message,$data,$redirect=""){
        $this->message = $message;
        $this->redirect = $redirect;
        $this->data = $data;
    }
    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        if($request->is('api/*')){
            return APIResponse::sendResponse($this->message,$this->data,403);
        }
        else{
            toastr()->error($this->message, $this->data);
            return redirect($this->redirect);
        }
    }
}

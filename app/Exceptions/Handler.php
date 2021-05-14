<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Laravel\Passport\Exceptions\MissingScopeException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (MissingScopeException $e, $request) {
            return response()->json([
                'message' => 'Unauthenticated',
            ], 401);
        });

        $this->renderable(function (ValidationException $e, $request) {
            $first_element=array_key_first($e->errors());
            $error = $e->errors()[$first_element][0];
            if($request->expectsJson()){
                return response()->json([
                    'message' => __('base.error.validation'),
                    'errors' => $error
                ],$e->status
                );
            }
            else{
                toastr()->error($error, __('base.error.validation'));
                return $this->invalid($request, $e);
            }
            
        });

        $this->renderable(function (NotFoundHttpException $e, $request) {
            if($request->expectsJson()){
                return response()->json([
                    'message' => __('base.error.notfound')
                    ]
                    ,404
                );
            }
            else{
                toastr()->error(__('base.error.notfound_desc'), __('base.error.notfound'));
                return response()->view('admin::errors.notfound', [], 404);
            }
            
        });
    }
}

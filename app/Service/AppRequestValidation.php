<?php

namespace App\Service;
use App\Traits\ResourceContainerTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\ImageFile;
use Illuminate\Validation\Rules\File as ValidateImageFile;
use Illuminate\Validation\Rule;
class AppRequestValidation
{
    use ResourceContainerTrait;


    public static function FeeTitleAddValidation(){
        return [
            'title'=>'required|string',
            'class_id'=>'required|array',
            'title_bn'=>'sometimes|string',
            'year'=>'required|string',
            'amount'=>'required|string',
            'month'=>'required|string',
            'fee'=>'required|string',
            'details'=>'sometimes|string',
            'feeType'=>'sometimes|string',
            'fee_category'=>'sometimes|string'
        ];
    }


    public static function validateData($inputs,$rules,$messages=[])
    {
        $status_code = $status_message = $errors_message ='';
        $data = [];
        $validator = Validator::make($inputs,$rules,$messages);

        if ($validator->fails()) {
            $status_code = ApiService::API_SERVICE_DEFAULT_VALIDATION_ERROR;
            $status_message = $validator->errors()->first();
            $errors_message = $validator->errors();
        }

        $data =[
            'status_code'=>$status_code,
            'status_message'=>$status_message,
            'errors_message'=>$errors_message
        ];

        return $data;
    }

}

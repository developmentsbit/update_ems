<?php


namespace App\Service;
use App\Models\add_fee_title;

class FeeService
{
    public static function storeFeeTitle($request){
        $status_code = '';
        $prepared_data = self::prepareData($request);
        $addFeeTitleObj = new add_fee_title();
        $insert = $addFeeTitleObj->store($prepared_data);

        if($insert){
            $status_code = 100;
        }

        return $status_code;
    }

    public static function prepareData($request){
        $input = [];
        $final_data = [];
        // dd()
        if(isset($request->class_id) && is_array($request->class_id) && count($request->class_id)>0){
            foreach ($request->class_id as $key => $value) {
                if(isset($request->title)){
                    $input['title'] = $request->title??'';
                }

                if(isset($request->title_bn)){
                    $input['title_bn'] = $request->title_bn??'';
                }

                if(isset($request->year)){
                    $input['year'] = $request->year??'';
                }

                if(isset($request->amount)){
                    $input['amount'] = $request->amount??'';
                }

                if(isset($request->month)){
                    $input['month'] = $request->month??'';
                }

                if(isset($request->fee)){
                    $input['fee'] = $request->fee??'';
                }

                if(isset($request->details)){
                    $input['details'] = $request->details??'';
                }

                if(isset($request->feeType)){
                    $input['feeType'] = $request->feeType??'';
                }

                if(isset($request->fee_category)){
                    $input['fee_category'] = $request->fee_category??'';
                }

                if(!empty($value)){
                    $input['class_id'] = $value??'';
                }

                $final_data[] = $input;


            }
        }
        // dd($final_data);

        return $final_data;
    }
}

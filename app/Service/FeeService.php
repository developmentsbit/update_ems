<?php


namespace App\Service;
use App\Models\class_info;
use App\Models\add_fee_title;
use DB;
class FeeService
{
    public static function storeFeeTitle($request,$id=null){
        $status = [];
        $rules = AppRequestValidation::FeeTitleAddValidation();
        $status = AppRequestValidation::validateData($request->all(), $rules);
        if (empty($status['status_code'])) {
            try {
            DB::beginTransaction();
            $prepared_data = self::prepareData($request);
            $addFeeTitleObj = new add_fee_title();
            if(empty($id)){
                $res = $addFeeTitleObj->store($prepared_data);
            }else{
                $res = $addFeeTitleObj->updateData($prepared_data,$id);
            }

            if($res){
                $status['status_code'] = ApiService::API_SERVICE_SUCCESS_CODE;
                $status['status_message'] = ApiService::API_SERVICE_STATUS_MESSAGE[ApiService::API_SERVICE_SUCCESS_CODE];
            }
            DB::commit();

            } catch (\Exception $ex) {
                DB::rollBack();
                $status['status_code'] = ApiService::API_SERVICE_FAILED_CODE;
                $status['status_message'] = ApiService::API_SERVICE_STATUS_MESSAGE[ApiService::API_SERVICE_FAILED_CODE];
            }
        }

        return $status;
    }

    public static function prepareData($request){
        $input = [];
        $final_data = [];

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

    public static function edit($id){
        $data = [];
        $data['class'] = (new class_info())->getData();
        $data['data'] = (new add_fee_title())->findById($id);
        return $data;
    }
}

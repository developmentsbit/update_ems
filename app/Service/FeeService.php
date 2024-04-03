<?php


namespace App\Service;

use App\Models\class_info;
use App\Models\add_fee_title;
use App\Models\ColumnWiseFeeSetups;
use App\Models\student_fee_column;
use App\Models\student_information;
use App\Models\student_reg_info;
use App\Models\StudentAccountInfo;
use App\Models\studentAttendanceInfo;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FeeService
{
    public static function storeFeeTitle($request, $id = null)
    {
        $status = [];
        $rules = AppRequestValidation::feeTitleAddValidation();
        $status = AppRequestValidation::validateData($request->all(), $rules);
        if (empty($status['status_code'])) {
            try {
                DB::beginTransaction();
                $prepared_data = self::prepareData($request);
                $addFeeTitleObj = new add_fee_title();
                if (empty($id)) {
                    $res = $addFeeTitleObj->store($prepared_data);
                } else {
                    $res = $addFeeTitleObj->updateData($prepared_data, $id);
                }

                if ($res) {
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

    public static function prepareData($request)
    {
        $input = [];
        $final_data = [];

        if (isset($request->class_id) && is_array($request->class_id) && count($request->class_id) > 0) {
            foreach ($request->class_id as $key => $value) {
                if (isset($request->title)) {
                    $input['title'] = $request->title ?? '';
                }

                if (isset($request->title_bn)) {
                    $input['title_bn'] = $request->title_bn ?? '';
                }

                if (isset($request->year)) {
                    $input['year'] = $request->year ?? '';
                }

                if (isset($request->amount)) {
                    $input['amount'] = $request->amount ?? '';
                }

                if (isset($request->month)) {
                    $input['month'] = $request->month ?? '';
                }

                if (isset($request->fee)) {
                    $input['fee'] = $request->fee ?? '';
                }

                if (isset($request->details)) {
                    $input['details'] = $request->details ?? '';
                }

                if (isset($request->feeType)) {
                    $input['feeType'] = $request->feeType ?? '';
                }

                if (isset($request->fee_category)) {
                    $input['fee_category'] = $request->fee_category ?? '';
                }

                if (!empty($value)) {
                    $input['class_id'] = $value ?? '';
                }

                $final_data[] = $input;


            }
        }

        return $final_data;
    }

    public static function edit($id)
    {
        $data = [];
        $data['class'] = (new class_info())->getData();
        $data['data'] = (new add_fee_title())->findById($id);
        return $data;
    }

    public static function columnWiseSetupIndex()
    {
        $response['lang'] = session()->get('lang');
        $response['data'] = (new ColumnWiseFeeSetups())->getData();
        $response['columns'] = (new student_fee_column())->getData();
        $response['classes'] = (new class_info())->getData();
        $response['months'] = ApiService::MONTHS;
        $response['years'] = ConstantService::CurrentYearToPreviousYear();
        return $response;
    }

    public static function columnWiseSetupStore($request)
    {

        $status = [];
        $status['status_code'] = $status['status_message'] = '';
        $rules = AppRequestValidation::columnWiseFeeAddValidation();
        $status = AppRequestValidation::validateData($request->all(), $rules);
        if (!empty($status['status_code'])) {
            $status['status_code'] = ApiService::API_SERVICE_DEFAULT_VALIDATION_ERROR;
            $status['status_message'] = $status['status_message'];
        }
        if (empty($status['status_code'])) {
            try {
                DB::beginTransaction();
                $prepared_data = self::columnWiseFeeprepareRequest($request);
                $columnWiseFeeSetups = new ColumnWiseFeeSetups();
                $addFeeTitleObj = new add_fee_title();
                $CommonFee = $request->fee_id ?? [];
                $res = $columnWiseFeeSetups->storeData($prepared_data, $CommonFee);
                if ($res) {
                    $status['status_code'] = ApiService::API_SERVICE_SUCCESS_CODE;
                    $status['status_message'] = ApiService::API_SERVICE_STATUS_MESSAGE[ApiService::API_SERVICE_SUCCESS_CODE];
                }
                DB::commit();

            } catch (\Exception $ex) {
                DB::rollBack();
                $status['status_code'] = ApiService::API_SERVICE_FAILED_CODE;
                $status['status_message'] = $ex->getMessage();
            }
        }

        return $status;
    }

    public static function columnFeeClassWise($request)
    {
        $response = [];
        $addFeeTitleObj = new add_fee_title();
        $columnWiseFeeSetups = new ColumnWiseFeeSetups();
        $response['type'] = $request->type ?? 1;
        $response['commonFee'] = $addFeeTitleObj->findByData($request->class_id ?? '', $request->year ?? '',true,$addFeeTitleObj::CommonFee);
        $columnWiseFeeSetupsData = $columnWiseFeeSetups->findByData($request->class_id ?? '', $request->year ?? '', true) ?? '';
        $response['columnWiseFeeSetupsData'] = $columnWiseFeeSetupsData;
        if (count($columnWiseFeeSetupsData) > 0) {
            $fee_id = [];
            foreach ($columnWiseFeeSetupsData as $data) {
                $fee_id[] = $data->fee_id;
            }
            $response['commonFee'] = $addFeeTitleObj->findByWhereNotIn($fee_id ?? [], $request->class_id ?? '', $request->year ?? '');
        }

        return $response;

    }

    public static function columnFeeClassWiseDestroy($id)
    {
        $columnWiseFeeSetups = new ColumnWiseFeeSetups();
        $response = $columnWiseFeeSetups->destroyData($id);
        if ($response) {
            $status['status_code'] = ApiService::API_SERVICE_SUCCESS_CODE;
            $status['status_message'] = ApiService::API_SERVICE_STATUS_MESSAGE[ApiService::API_SERVICE_SUCCESS_CODE];
        } else {
            $status['status_code'] = ApiService::API_SERVICE_FAILED_CODE;
            $status['status_message'] = ApiService::API_SERVICE_STATUS_MESSAGE[ApiService::API_SERVICE_FAILED_CODE];
        }
        return $status;

    }

    public static function columnWiseFeeprepareRequest($request)
    {
        $input['class_id'] = isset($request->class_id) ? $request->class_id : '';
        $input['column_id'] = isset($request->column_id) ? $request->column_id : '';
        $input['student_id'] = isset($request->student_id) ? $request->student_id : '';
        $input['year'] = isset($request->year) ? $request->year : '';
        $input['student_roll'] = isset($request->student_roll) ? $request->student_roll : '';

        return $input;
    }


    public static function addStudentFeeIndex()
    {
        $response['lang'] = session()->get('lang');
        $response['data'] = (new StudentAccountInfo())->getData();
        $response['columns'] = (new student_fee_column())->getData();
        $response['classes'] = (new class_info())->getData();
        $response['months'] = ApiService::MONTHS;
        $response['years'] = ConstantService::CurrentYearToPreviousYear();
        return $response;
    }

    public static function storeStudentFee($request, $id = null)
    {
        $status['action'] = "Student Fee AC";
        $status = [];
        $rules = AppRequestValidation::StudentAccountInfoValidation();
        $status = AppRequestValidation::validateData($request->all(), $rules);
        $res = false;
        if (empty($status['status_code'])) {
            try {
                DB::beginTransaction();
                $prepared_data = self::columnWiseFeeprepareRequest($request);
                $student = (new student_reg_info())->getByData($request, true);
                $studentAccountFee = new StudentAccountInfo();
                $addFeeTitleObj = new add_fee_title();
                $commonFee = $addFeeTitleObj->findByData($request->class_id ?? '', $request->year ?? '',false,$addFeeTitleObj::CommonFee);
                $auth_id = Auth::user()->id;
                if(count($student)>0 && count($commonFee)>0){
                $res = $studentAccountFee->createOrUpdateData($prepared_data, $auth_id, $student, $commonFee);
                    if ($res) {
                        $status['status_code'] = ApiService::API_SERVICE_SUCCESS_CODE;
                        $status['status_message'] = ApiService::API_SERVICE_STATUS_MESSAGE[ApiService::API_SERVICE_SUCCESS_CODE];
                    }
                }else{
                    $status['status_code'] = ApiService::API_SERVICE_FAILED_CODE;
                    $status['status_message'] = 'Student or Fee not found';
                }


                DB::commit();

            } catch (\Exception $ex) {
                DB::rollBack();
                $status['status_code'] = ApiService::API_SERVICE_FAILED_CODE;
                $status['status_message'] = ApiService::API_SERVICE_STATUS_MESSAGE[ApiService::API_SERVICE_FAILED_CODE];
                $status['error'] = $ex->getMessage();
                $status['error_full'] = $ex;
            }
        }
                log::info($status);

        return $status;
    }
}

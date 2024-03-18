<?php


namespace App\Service;

class ApiService{

    const API_SERVICE_SUCCESS_CODE = 100;
    const API_SERVICE_FAILED_CODE = 422;
    const API_SERVICE_UNAUTHENTICATED = 401;
    const API_SERVICE_DB_COMMIT_ROLLBACK = 150;
    const API_SERVICE_DEFAULT_VALIDATION_ERROR = 1001;
    const API_SERVICE_NO_DATA_FOUND = 1022; // No data found
    const API_SERVICE_UNKNOWN_ERROR = 9000;

    // Status description message
    const API_SERVICE_STATUS_MESSAGE = [

        self::API_SERVICE_SUCCESS_CODE => "Successful",
        self::API_SERVICE_FAILED_CODE => "Failed",
        self::API_SERVICE_NO_DATA_FOUND => "No data found",
        self::API_SERVICE_UNKNOWN_ERROR => "Unknown error",

    ];

    const API_SERVICE_HTTP_CODE_VALID_REQUEST = 200;
    const API_SERVICE_HTTP_CODE_BAD_REQUEST = 400;
    const January = "01";
    const February = "02";
    const March = "03";
    const April = "04";
    const May = "05";
    const June = "06";
    const July = "07";
    const August = "08";
    const September = "09";
    const October = "10";
    const November = "11";
    const December = "12";

    const MONTHS =[
        self::January=> "january",
        self::February=> "february",
        self::March=> "march",
        self::April=> "april",
        self::May=> "may",
        self::June=> "june",
        self::July=> "july",
        self::August=> "august",
        self::September=> "september",
        self::October=> "october",
        self::November=> "november",
        self::December=> "december"
    ];

}

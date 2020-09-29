<?php

namespace app;

/**
 * Class NBU
 * Class get actually course from NBU api
 */
class NBU
{
    /**
     * @return array
     */
    public static function getNBUCourse()
    {
        $url = "https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $url);
        $response = curl_exec($curl);
        curl_close($curl);

        if ($response) {
            $content = json_decode($response, true);
            $result = [];
            foreach ($content as $value) {
                if ($value['r030'] == 840) {
                    $result['course'] = $value['rate'];
                }
            }
            return $result;
        }
    }
}
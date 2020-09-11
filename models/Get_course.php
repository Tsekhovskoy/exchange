<?php

/**
 * Class Get_course
 * Class get actually course from NBU api
 */

class Get_course
{
    /**
     * @return array
     * Metod get valid course from NBU api
     */
    public function getNBUCourse()
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
        else {
            http_response_code(404);
        }
    }

    /**
     * @return array
     * The execute method
     */
    public function execute() {
        $course = $this->getNBUCourse();
        return $course;
    }
}
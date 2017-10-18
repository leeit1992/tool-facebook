<?php

namespace app\Http\Components;

class ApiGetToken
{
    /**
     * $getInstance - Support singleton module.
     *
     * @var null
     */
    private static $getInstance = null;

    private function __wakeup()
    {
    }

    private function __clone()
    {
    }

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!(self::$getInstance instanceof self)) {
            self::$getInstance = new self();
        }

        return self::$getInstance;
    }

    public function getToken($email, $pass)
    {
        header('Origin: https://facebook.com');
        $data = array(
            "api_key" => "3e7c78e35a76a9299309885393b02d97",
            //"credentials_type" => "password",
            "email" => $email,
            "format" => "JSON",
            //  "generate_machine_id" => "1",
            //  "generate_session_cookies" => "1",
            "locale" => "vi_vn",
            "method" => "auth.login",
            "password" => $pass,
            "return_ssl_resources" => "0",
            "v" => "1.0"
        );

        $this->signCreator($data);
        $response = $this->CURL('GET', false, $data);
        $responseJSON = json_decode($response, true);
        return $responseJSON;
    }

    public function signCreator(&$data)
    {
        $sig = '';
        foreach ($data as $key => $value) {
            $sig .= "$key=$value";
        }
        $sig .= 'c1e620fa708a1d5696fb991c1bde5662';
        $sig = md5($sig);

        return $data['sig'] = $sig;
    }

    public function CURL($method = 'GET', $url = false, $data)
    {
        $c = curl_init();
        $user_agents = array(
            "Mozilla/5.0 (iPhone; CPU iPhone OS 9_2_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Mobile/13D15 Safari Line/5.9.5",
            "Mozilla/5.0 (iPhone; CPU iPhone OS 9_0_2 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Mobile/13A452 Safari/601.1.46 Sleipnir/4.2.2m", "Mozilla/5.0 (iPhone; CPU iPhone OS 9_3 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13E199 Safari/601.1", "Mozilla/5.0 (iPod; CPU iPhone OS 9_2_1 like Mac OS X) AppleWebKit/600.1.4 (KHTML, like Gecko) CriOS/45.0.2454.89 Mobile/13D15 Safari/600.1.4", "Mozilla/5.0 (iPhone; CPU iPhone OS 9_3 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13E198 Safari/601.1"
        );
        $useragent = $user_agents[array_rand($user_agents)];
        $opts = array(
            CURLOPT_URL => ($url ? $url : 'https://api.facebook.com/restserver.php') . ($method == 'GET' ? '?' . http_build_query($data) : ''),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT => $useragent
        );
        if ($method == 'POST') {
            $opts[CURLOPT_POST] = true;
            $opts[CURLOPT_POSTFIELDS] = $data;
        }
        curl_setopt_array($c, $opts);
        $d = curl_exec($c);
        curl_close($c);
        return $d;
    }

    public function checkToken($token){
        $url = 'https://graph.facebook.com/me?access_token='. $token;

        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,$url);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $data = curl_exec($curl_handle);
        curl_close($curl_handle);

        return json_decode($data, true);
    }
}

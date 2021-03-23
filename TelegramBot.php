<?php
    // У всех классов, кроме TelegramBot, удалены:
    //     - namespace;
    //     - use;
    //     - require_once.
    // Нужно переписать тесты в связи недоступностью переменных variables.php
    // из функции sendMessage().
	namespace mustakrakishe\TelegramBot;

    include('include_list.php');
	
    class TelegramBot{
        public function __construct(
            protected $token = null,
            protected $api_url = 'https://api.telegram.org'
        ) {}

        protected function prop($name, $value = null){
            if($value){
                $this->$name = $value;
                return $this;
            }
            return $this->$name;
        }

        public function token($token = null){
            return prop('token', $token);
        }

        public function api_url($api_url = null){
            return prop('api_url', $api_url);
        }

        protected function sendRequest($options){
            $ch = curl_init();
            curl_setopt_array($ch, $options);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $res = curl_exec($ch);
            curl_close($ch);

            return json_decode($res);
        }

        protected function makeMethodReqUrl($method){
            return implode('/', [
                $this->api_url,
                'bot' . $this->token,
                $method
            ]);
        }

        public function sendMessage($chat_id, Message $message){
            $options[CURLOPT_URL] = $this->makeMethodReqUrl('sendMessage');

            $options[CURLOPT_POSTFIELDS] = $message->get_parameters();
            $options[CURLOPT_POSTFIELDS]['chat_id'] = $chat_id;
    
            return $this->sendRequest($options);
        }

    }
?>
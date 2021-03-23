<?php
    class Photo extends Package{
        public function __construct($chat_id = null, $photo = null, $caption = null){
            $this->method = 'sendPhoto';

            if(isset($chat_id)){
                $this->chat_id($chat_id);
            }

            if(isset($photo)){
                $this->photo($photo);
            }

            if(isset($caption)){
                $this->caption($caption);
            }
        }
        public function chat_id($chat_id = null){
            return $this->postFields('chat_id', $chat_id);
        }

        public function photo($photo = null){
            return $this->postFields('photo', $photo);
        }

        public function caption($caption = null){
            return $this->postFields('caption', $caption);
        }
    }
    }
?>
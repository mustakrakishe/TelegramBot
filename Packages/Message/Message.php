<?php
    class Message extends Package{
        public function text($text = null){
            return $this->parameter('text', $text);
        }

        public function parse_mode($mode = null){
            $result = null;

            $parameter_name = 'parse_mode';
            $value = $mode;
            $del_command = 'none';
            
            $result = $this->parameter($parameter_name, $value, $del_command);

            return $result;
        }

        public function disable_preview(bool $enabled = null){
            $result = null;

            $parameter_name = 'disable_web_page_preview';
            $value = $enabled;
            $del_command = false;
            
            $result = $this->parameter($parameter_name, $value, $del_command);

            if(gettype($result) != 'object'){
                $result = (bool) $result;
            }

            return $result;
        }

        public function disable_notification(bool $enabled = null){
            $result = null;

            $parameter_name = 'disable_notification';
            $value = $enabled;
            $del_command = false;
            
            $result = $this->parameter($parameter_name, $value, $del_command);

            if(gettype($result) != 'object'){
                $result = (bool) $result;
            }

            return $result;
        }

        public function reply_to($message_id = null){
            $result = null;

            $parameter_name = 'reply_to_message_id';
            $value = $enabled;
            $del_command = 'none';
            
            $result = $this->parameter($parameter_name, $value, $del_command);

            return $result;
        }
        
        public function without_reply(bool $enabled = null){
            $result = null;

            $parameter_name = 'allow_sending_without_reply';
            $value = $enabled;
            $del_command = true;
            
            $result = $this->parameter($parameter_name, $value, $del_command);

            if(gettype($result) != 'object'){
                $result = (bool) $result;
            }

            return $result;
        }
        
        // Сущности не устанавливают форматирование сообщения.
        // Написал сообщение в поддержку, жду ответа.
        // public function entitie($offset, $length, $type){
        //     $newEntitie = new MessageEntity($offset, $length, $type);
        //     $this->parameters['entities'] = [$newEntitie];

        //     return $this;
        // }
    }
?>
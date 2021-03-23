<?php
    abstract class Package{
        public function __construct(
            protected $parameters = []
        ){}

        protected function get_parameter($name){
            $result = null;
            if(isset($this->parameters[$name])){
                $result = $this->parameters[$name];
            }
            return $result;
        }

        protected function parameter($name, $value = null, $del_command = null){
            $result = null;
            
            if(is_null($value)){
                $result = $this->get_parameter($name);
            }
            else{
                if(isset($del_command) && strcasecmp($value, $del_command) == 0){
                    unset($this->parameters[$name]);
                }
                else{
                    $this->parameters[$name] = $value;
                }
                $result = $this;
            }

            return $result;
        }

        public function get_parameters(){
            return $this->parameters;
        }
    }
?>
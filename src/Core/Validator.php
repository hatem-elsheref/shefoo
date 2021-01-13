<?php


namespace App\Core;


trait Validator
{

    public array $errors=[];

    abstract public function rules() :array;

    public function messages(){
        return [
            self::REQUIRED =>'the {:attribute} field is required',
            self::EMAIL    =>'the {:attribute} field must be a valid email address',
            self::MIN      =>'the {:attribute} field must be at least {:min} length',
            self::MAX      =>'the {:attribute} field must be at less than or equal {:max} characters',
            self::MATCH    =>'the {:attribute} field must be match with {:match} field',
            self::UNIQUE   =>'the {:attribute} field must be unique it\' already exist before',
        ];
    }

    public function validate(){
        foreach ($this->rules() as $attributeName => $rules){
            foreach ($rules as $rule){
                $ruleName = $rule;
                $value = $this->{$attributeName} ?? '';
                if (is_array($ruleName))
                    $ruleName= $ruleName[0];


                switch ($ruleName){
                    case self::REQUIRED:
                        if (empty($value))
                            $this->addError($attributeName,$this->messages()[$ruleName]);
                        break;
                    case self::EMAIL:
                        if (!filter_var($value,FILTER_VALIDATE_EMAIL))
                            $this->addError($attributeName,$this->messages()[$ruleName]);
                        break;
                    case self::MAX:
                        if (strlen($value) > $rule['max']){
                            $this->addError($attributeName,$this->messages()[$ruleName],$rule);
                        }
//                        if (is_numeric($value)){
//                            if ($value > $rule['max']){
//                                $this->addError($attributeName,$this->messages()[$ruleName],$rule);
//                            }
//                        }elseif (is_array($value)){
//                            if (count($value) > $rule['max']){
//                                $this->addError($attributeName,$this->messages()[$ruleName],$rule);
//                            }
//                        }else{
//                            if (strlen($value) > $rule['max']){
//                                $this->addError($attributeName,$this->messages()[$ruleName],$rule);
//                            }
//                        }
                        break;
                    case self::MIN:
                        if (strlen($value) < $rule['min']){
                            $this->addError($attributeName,$this->messages()[$ruleName],$rule);
                        }
//                        if (is_numeric($value)){
//                            if ($value < $rule['min']){
//                                $this->addError($attributeName,$this->messages()[$ruleName],$rule);
//                            }
//                        }elseif (is_array($value)){
//                            if (count($value) < $rule['min']){
//                                $this->addError($attributeName,$this->messages()[$ruleName],$rule);
//                            }
//                        }else{
//                            if (strlen($value) < $rule['min']){
//                                $this->addError($attributeName,$this->messages()[$ruleName],$rule);
//                            }
//                        }
                        break;
                    case self::MATCH:
                        $matchedWith = $this->{$rule['match']};
                       if ($value !== $matchedWith)
                           $this->addError($attributeName,$this->messages()[$ruleName],$rule);
                        break;
                }
            }

        }

        Application::$app->errors = $this->errors;

        return empty($this->errors);
    }

    private function addError($attribute,$message,$options=null){

      $message = str_replace('{:attribute}',$attribute,$message);

        if ($options)
            foreach ($options as $key => $value)
                $message = str_replace("{:{$key}}",$value,$message);
        $this->errors[$attribute][] = $message;
    }

    public function getFirstError($attribute){
        return $this->errors[$attribute][0] ?? false;
    }
}
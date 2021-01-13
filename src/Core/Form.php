<?php


namespace App\Core;

use App\Models\Model;

class Form
{
    private  $model;
    public static function Begin($options,$model){
        foreach ($options as $optionName => $optionValue)
            $form.=$optionName.'="'.$optionValue.'" ';

        echo '<form '.$form.' >';
        $newFormObject = new Form();
        $newFormObject->model = $model;
        return $newFormObject;
    }
    public function input($options,$required=false,$autofocus=false){
        echo $this->prepareInput($options,$required,$autofocus);
    }


    private function prepareInput($options,$required=false,$autofocus=false){
        $value=$this->model->{$options['name']}??'';
        $input = '<input  value="'.$value.'" ';
        foreach ($options as $optionName => $optionValue)
            $input.=$optionName.'="'.$optionValue.'" ';
        if ($required)
            $input.=' required ';
        if ($autofocus)
            $input.=' autofocus ';

        $input.=' >';

        if (isset($this->model) && !is_null($this->model)){
            if ($this->hasError($options['name']) !==  false){
                $input = str_replace('class="'.$options['class'].'"','class="is-invalid '.$options['class'].'"',$input);
                $input.='<div class="invalid-feedback">* '. $this->hasError($options['name']).'</div>';
            }
        }

        return $input;
    }
    public function label($for,$class='sr-only',$content=''){
        echo sprintf('<label for="%s" class="%s">%s</label>',$for,$class,$content);
    }
    public function checkbox($name,$class='',$value='on'){
        echo sprintf('<input type="checkbox" name="%s" class="%s" value="%s">',$name,$class,$value);
    }
    public function submit($text,$class=''){
        echo sprintf(' <button class="%s" type="submit">%s</button>',$class,$text);
    }
    public function link($href,$text,$class=''){
        echo sprintf(' <a href="%s" class="%s">%s</a>',$href,$class,$text);
    }
    private function hasError($name){
        return $this->model->getFirstError($name);
    }


    public static function end(){
        echo '</form>';
    }
}
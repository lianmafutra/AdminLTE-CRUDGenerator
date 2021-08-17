<?php
namespace App\Classes;

class ControllerCrud {

    protected $model_name='';
    protected $form_input='';

    public function __construct() {
       $this->model_name = session('model');
       $this->form_input = session('form_input');
    }

    public function generate(){



        $file_template = file_get_contents(
            app_path('Services/Template/controller-template.txt')
        );

        $filepond_store='';
        $filepond_move='';
        $name_array='';
        $name_array_validate='';

        foreach ($this->form_input as $key => $value) {
            if($value['form_input']=='upload_image'){
                $name_array .= "'".$value['name']."',";
                $name_array_validate .= "'".$value['name']."',";
                $filepond_store  = file_get_contents(app_path('Services/Template/filepond-store-template.txt'));
                $filepond_move   = file_get_contents(app_path('Services/Template/filepond-move-template.txt'));
            }
        }

        $replace_filepond = [
            '{{ $name_array }}' => $name_array,
        ];

        $filepond_store = strtr($filepond_store, $replace_filepond);
        $filepond_move = strtr($filepond_move, $replace_filepond);

        $replace_var = array(
            '#MODEL_NAME#'     => $this->model_name,
            '#MODEL_NAME_VAR#' => strtolower($this->model_name),
            '{{ $filepond_move }}' => $filepond_move,
            '{{ $filepond_store }}' => $filepond_store,
        );

        $file_template = strtr($file_template, $replace_var);
        $file = fopen(app_path("Http/Controllers/".$this->model_name."Controller.php"), "w");
        fwrite($file, $file_template);
        fclose($file);

        return response()->json("create Controllers Success");

    }


}
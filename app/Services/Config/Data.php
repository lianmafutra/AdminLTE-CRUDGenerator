<?php
namespace App\Services\Config;

trait Data {

  //text field
 public function text_field($name){
   $text_field = file_get_contents(app_path('Services/Input/text_field.txt'));
    $replace = [
        '{{ $name }}'       => $name,
    ];
    $data = strtr($text_field, $replace);
    return $data;
 }

     //text area
 public function text_area($name){
    $text_area = file_get_contents(app_path('Services/Input/text_area.txt'));
     $replace = [
         '{{ $model_var }}'  => strtolower(session('model')),
         '{{ $name }}'       => $name,
     ];
     $data = strtr($text_area, $replace);
     return $data;
  }


    //upload image with filepond
  public function upload_image($name){
    $text_area = file_get_contents(app_path('Services/Input/upload_image.txt'));
 
    $replace_text_area = [
         '{{ $model_var }}'  => strtolower(session('model')),
         '{{ $name }}'       => $name,
     ];
   
    $data = strtr($text_area, $replace_text_area);

    return $data;
    
  }

  public function addCss(){
      $add_css='';
      $array=[];
      foreach (session('form_input') as $key => $value) {
          array_push($array, $value['form_input']);
      }

      if(in_array('upload_image', $array)){
          $add_css .=  file_get_contents(app_path('Services/Input/upload_image_css.txt'));  
      }

      if(in_array('text_field', $array)){
        $add_css .= '<link href="testing_add_css" rel="stylesheet"/>'; 
      }

      return $add_css;
  }

  public function addJs(){
    $add_js='';

    $array=[];
    foreach (session('form_input') as $key => $value) {
        array_push($array, $value['form_input']);
    }

    if(in_array('upload_image', $array)){

      $add_js = file_get_contents(app_path('Services/Template/filepond-js-create-template.txt'));
      
      $replace_add_js = [
              '{{ $model_var }}'  => strtolower(session('model')),
        ];
      $add_js =  strtr($add_js, $replace_add_js);
    }

    return $add_js;
}

public function addJsEdit(){
  $add_js='';
  $js='';
  $array=[];

  foreach (session('form_input') as $key => $value) {
      array_push($array, $value['form_input']);
  }


  if(in_array('upload_image', $array)){

    $add_js = file_get_contents(app_path('Services/Template/filepond-js-edit-template.txt'));
    
    foreach (session('form_input') as $key => $value) {
      if($value['form_input']=='upload_image'){
        $coro = file_get_contents(app_path('Services/Template/filepond-js-edit-script-template.txt'));
     
        $replace = [
          '{{ $model_var }}'  => strtolower(session('model')),
          '{{ $name }}'       => $value['name'],
        ];

       $js .= strtr($coro, $replace);

      }
    }

    $replace2 = [
      '{{ $init_filepond }}'  => $js,
    ];
  
    $add_js = strtr($add_js, $replace2);
    
  }

  return $add_js;
}

}


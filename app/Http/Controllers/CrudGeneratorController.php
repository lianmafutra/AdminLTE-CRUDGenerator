<?php

namespace App\Http\Controllers;

use App\Classes\ControllerCrud;
use App\Classes\MigrationCrud;
use App\Classes\ModelCrud;
use App\Classes\RouteCrud;
use App\Classes\ViewCrud;
use App\Classes\ActionCrud;
use App\Classes\CreateCrud;
use App\Classes\EditCrud;
use App\Classes\ValidationCrud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class CrudGeneratorController extends Controller
{
    public function  index(){
        return view('admin.crudgen.index');
    }

     public function generate(Request  $request){

        session(['model' => $request->model_name]);
        session(['form_input' => $request->addmore]);
     
            if($request->tipe=='model'){
                $model = new ModelCrud();
                $model = $model->generate();
                return response()->json($model);
            }

            if($request->tipe=='controller'){
                $controller = new ControllerCrud();
                $controller = $controller->generate();
                return response()->json($controller);
            }

            if($request->tipe=='view'){
                $view = new ViewCrud();
                $view = $view->generate();
                return response()->json($view);
            }

            if($request->tipe=='migration'){
                $migration = new MigrationCrud();
                $migration = $migration->generate();
                return response()->json($migration);
            }

            if($request->tipe=='route'){
                $route = new RouteCrud();
                $route = $route->generate();
                return response()->json($route);
             }

            if($request->tipe=='action'){
                $action = new ActionCrud();
                $action = $action->generate();
                return response()->json($action);
            }

            if($request->tipe=='create'){
                $create = new CreateCrud();
                $create = $create->generate();
                return response()->json($create);
            }
        

            if($request->tipe=='edit'){
                $edit = new EditCrud();
                $edit = $edit->generate();
                return response()->json($edit);
            }

            if($request->tipe=='validation'){
                $validation = new ValidationCrud();
                $validation = $validation->generate();
                return response()->json($validation);
            }
        
}
}

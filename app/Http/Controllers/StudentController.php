<?php

    namespace App\Http\Controllers;
        
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Student;
    use Illuminate\Support\Facades\File;
    use App\Http\Requests\StudentStoreRequest;
    use App\Http\Requests\StudentUpdateRequest;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\URL;
       
        
    class StudentController extends Controller
    {
        
            public function index()
            {
                $student = Student::latest();
                
                if (request()->ajax()) {
                    return datatables()->of($student)
                        ->addIndexColumn()
                        ->addColumn('action', function($student){
                            return view('admin.student.action', compact('student'));
                         })
                        ->rawColumns(["action"])
                        ->make(true);
                }
              
                return view("admin.student.index");
            }
        
            /**
             * Show the form for creating a new resource.
             *
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
                 return view("admin.student.create");
            }
        
            /**
             * Store a newly created resource in storage.
             *
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
            public function store(StudentStoreRequest $request)
            {
                 $input = $request->all();
                $validated = $request->validated();
                if($validated){  
                   $array=['photo',];
                 
                    foreach ($array as $key => $value) {
                        if($request->has($value)){
                                $files = $request->file($value);  
                                $name_uniqe =  uniqid().'-'.now()->timestamp.'.'.$files->getClientOriginalExtension();
                                $files->move('uploads', $name_uniqe);
                                $input[$value] = $name_uniqe;
                        }
                }
                                
                    Student::create($input);
                    toastr()->success('Data has been saved successfully!');
                    return redirect()->route('student.index')->with('success','Post created successfully.');
                }
             
               
            }
        
            /**
             * Display the specified resource.
             *
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                //
            }
        
            /**
             * Show the form for editing the specified resource.
             *
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function edit(Student $student)
            {
                 return view("admin.student.edit", compact('student'));
            }
        
            /**
             * Update the specified resource in storage.
             *
             * @param  \Illuminate\Http\Request  $request
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function update(StudentUpdateRequest $request, Student $student)
            {
                $student->update($request->all());
                toastr()->info('Data has been update successfully!');
                return redirect()->route('student.index')->with('success','Post update successfully.');
            }
        
            /**
             * Remove the specified resource from storage.
             *
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               try {
                Student::destroy($id);
                return $this->successResponse("Success Deleted Data");
                } catch (\Throwable $th) {
                    return $this->errorResponse("Error Deleted Data" . $th, 400);
                }
            }

                public function filepondUpload(Request $request){

        $array=['photo',];
      
        $validator = \Validator::make($request->all(), [
            'gambar' => 'mimes:png,jpg,jpeg',
          
        ]);
        
        if ($validator->fails())
        {
            return $this->errorResponse('Ektensi File tidak di izinkan', 402);
        }
        else{
           
            foreach ($array as $key => $value) {
                if($request->has($value)){
                    $files = $request->file($value);  
                    $name_uniqe = uniqid().'-'.now()->timestamp.'.'.$files->getClientOriginalExtension();
                    $files->move(public_path() . '/uploads_tmp/', $name_uniqe);
                    return  $name_uniqe;
                }
               
            }
        }
    }

    public function filepondCancel(Request $request){
        $filepath = public_path("/uploads_tmp/".$request->getContent());
        
         if (File::exists($filepath)) {
            $delete =  File::delete(  $filepath);
            return response()->json(  $delete);
        }
    } 

        }



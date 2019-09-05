<?php

namespace App\Http\Controllers;

use Redirect;
use Validator;
use App\ClassList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassController extends Controller
{
    protected $request;
    protected $response;
    protected $limit = 10;

    public function __construct(Request $request, Response $response){
        $this->request      = $request;
        $this->response     = $response;
    }

    public function index()
    {
        $class = ClassList::orderBy('created_at', 'DESC')->paginate($this->limit);
        return view('dataMaster.class.index', [
            'class' => $class
        ]);
    }

    public function create()
    {
        return view('dataMaster.class.create');
    }

    public function store()
    {
        $validate = Validator::make($this->request->all(), [
            'name'=>'required|min:5|max:255',
        ]);

        if (!$validate->fails()) {
             $class         =  new ClassList;
             $class->name   =  $this->request->name;
             $class->save();
             return redirect()->route('class.index');
        }  else {
            $errors = $validate->messages();

            return redirect()->route('class.create')
                ->withErrors($validate)
                ->withInput($this->request->input());
        }
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $class       = ClassList::findOrFail($id);
        return view('dataMaster.class.edit', [
            'class'  => $class
        ]);
    }

    public function update($id)
    {
        $validate = Validator::make($this->request->all(), [
            'name'=>'required|min:5|max:255',
        ]);
        if (!$validate->fails()) {
             $class          = ClassList::findOrFail($id);
             $class->name    =  $this->request->name;
             $class->save();
             return redirect()->route('class.index');
        }  else {
            $errors = $validate->messages();
            return redirect()->route('class.edit',['id'=>$id])
                ->withErrors($validate)
                ->withInput($this->request->input());
        }
    }

    public function destroy($id)
    {
        $class      = ClassList::where('id', $id)->firstOrFail();
        if($class->delete()){
            return redirect()->route('class.index');
        }
    }
}

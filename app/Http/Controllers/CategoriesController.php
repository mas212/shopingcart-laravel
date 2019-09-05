<?php

namespace App\Http\Controllers;

use Redirect;
use Validator;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoriesController extends Controller
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
        $categories = Categories::orderBy('created_at', 'DESC')->paginate($this->limit);
        return view('dataMaster.categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('dataMaster.categories.create');
    }

    public function store()
    {
        $validate = Validator::make($this->request->all(), [
            'name'=>'required|min:5|max:255',
        ]);

        if (!$validate->fails()) {
             $categories         =  new Categories;
             $categories->name   =  $this->request->name;
             $categories->save();
             return redirect()->route('category.index');
        }  else {
            $errors = $validate->messages();

            return redirect()->route('category.create')
                ->withErrors($validate)
                ->withInput($this->request->input());
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category       = Categories::findOrFail($id);
        return view('dataMaster.categories.edit', [
            'category' => $category
        ]);
    }

    public function update($id)
    {
        $validate = Validator::make($this->request->all(), [
            'name'=>'required|min:5|max:255',
        ]);
        if (!$validate->fails()) {
             $category          = Categories::findOrFail($id);
             $category->name    =  $this->request->name;
             $category->save();
             return redirect()->route('category.index');
        }  else {
            $errors = $validate->messages();
            return redirect()->route('category.edit',['id'=>$id])
                ->withErrors($validate)
                ->withInput($this->request->input());
        }
    }

    public function destroy($id)
    {
        $category      = Categories::where('id', $id)->firstOrFail();
        if($category->delete()){
            return redirect()->route('category.index');
        }
    }
}

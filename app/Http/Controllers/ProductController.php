<?php

namespace App\Http\Controllers;

use Image;
use Redirect;
use Validator;
use App\Product;
use App\ClassList;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
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
        $products       = Product::orderBy('created_at', 'DESC')->paginate($this->limit);
        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories     = Categories::all();
        $classLists      = ClassList::all();
        return view('admin.product.create', [
            'categories'    => $categories,
            'classLists'    => $classLists
        ]);
    }

    public function store()
    {
        $validate           = Validator::make($this->request->all(), [
            'name'          => 'required|min:5|max:255',
            'code'          => 'required',
            'price'         => 'required',
            'description'   => 'required'
        ]);

        if(!$validate->fails()){
            $product                    = new Product;
            $product->name              = $this->request->name;
            $product->category_id       = $this->request->category_id;
            $product->class_id          = $this->request->class_id;
            $product->code              = $this->request->code;
            $product->price             = $this->request->price;
            //setup photo
            $file                       = $this->request->file('photo');
            $fileName                   = $file->getClientOriginalName();
            $path = public_path('products/' . $fileName);
            Image::make($file->getRealPath())->resize(480, 280)->save($path);
            $product->photo             = $fileName;
            $product->description       = $this->request->description;
            $product->save();
            return redirect()->route('product.index');

        }else{
            $errors         = $validate->messages();
            return redirect()->route('product.create')
                ->withErrors($validate)
                ->withInput($this->request->all());
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $product        = Product::findOrFail($id);
        $categories     = Categories::all();
        $classLists     = ClassList::all();

        return view('admin.product.edit', [
            'product'       => $product,
            'categories'    => $categories,
            'classLists'    => $classLists
        ]);
    }

    public function update($id)
    {
        $validate           = Validator::make($this->request->all(), [
            'name'          => 'required|min:5|max:255',
            'code'          => 'required',
            'price'         => 'required',
            'description'   => 'required'
        ]);
        if(!$validate->fails()){
            $product                    = Product::findOrFail($id);
            $product->name              = $this->request->name;
            $product->category_id       = $this->request->category_id;
            $product->class_id          = $this->request->class_id;
            $product->code              = $this->request->code;
            $product->price             = $this->request->price;
            //update photo
            if($this->request->hasFile('photo') == ""){
                $product->product       = $product->photo;
            }else{
                $file                   = $this->request->file('photo');
                $fileName               = $file->getClientOriginalName();
                $path = public_path('products/' . $fileName);
                Image::make($file->getRealPath())->resize(480, 240)->save($path);
                $product->photo         = $fileName;
            }
            $product->description       = $this->request->description;
            $product->save();
            return redirect()->route('product.index');

        }else{
            $errors         = $validate->messages();
            return redirect()->route('product.edit',['id'=>$id])
                ->withErrors($validate)
                ->withInput($this->request->all());
        }
    }

    public function destroy($id)
    {
        $product                    = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index');

    }
}

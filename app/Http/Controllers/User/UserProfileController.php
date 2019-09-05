<?php

namespace App\Http\Controllers\User;

use Auth;
use Image;
use Redirect;
use Validator;
use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    protected $request;
    protected $response;

    public function __construct(Request$request, Response $response){
    	$this->request 		= $request;
    	$this->response 	= $response;
    }
    public function index(){
    	return view('profile.index');
    }

    public function create(){
        $user_id        = Auth::user()->id;
        $user           = User::findOrFail($user_id);
    	return view('profile.create', [
            'user'      => $user
        ]);
    }

    public function update(){
        $validate           = Validator::make($this->request->all(), [
            'phone'         => 'required|numeric',
            'wa'            => 'numeric',
            'birthday'      => 'required',
            'photo'         => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if(!$validate->fails()){
            $user_id                = Auth::user()->id;
            $user                   = User::findOrFail($user_id);
            $user->name             = $this->request->name;
            $user->email            = ($user->email == "") ? $this->request->email : $user->email;
            $userProfile            = $user->userProfile;
            $userProfile->gender    = $this->request->gender;
            $userProfile->phone     = $this->request->phone;
            $userProfile->wa        = $this->request->wa;
            $userProfile->birthday  = $this->request->birthday;
            //setup photo
            $file                       = $this->request->file('photo');
            $fileName                   = $file->getClientOriginalName();
            $path = public_path('user/' . $fileName);
            Image::make($file->getRealPath())->resize(280, 280)->save($path);
            $userProfile->photo         = $fileName;
            $user->save();
            $user->userProfile()->save($userProfile);
            return redirect()->route('dashbord.index');
        }else{
            $errors         = $validate->messages();
            return redirect()->route('user.profile.create')
                ->withErrors($validate)
                ->withInput($this->request->all());
        }
    }
}

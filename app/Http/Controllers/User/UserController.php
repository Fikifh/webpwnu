<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\models\scholarship\DocumentModel;
use App\User;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
        if(!Session::get('login')){
            return redirect()->to('login')->with('alert','Anda harus login terlebih dahulu !');
        }else {
            return view('home');
        }
    }

    public function login(){
        return view('login');
    }

    public function loginPost(Request $request){
        $email = $request->email;
        $password = $request->password;
        $data = User::where('email', $email)->first();
        if($data){
            if(Hash::check($password, $data->password)){
                Session::put('id', $data->id);
                Session::put('name', $data->name);
                Session::put('email', $data->email);
                Session::put('login', true);
                $credentials = $request->only('email', 'password');
                Auth::guard('web')->attempt($credentials, $request->has('remember'));
                $roleId = $data->roles_id;
                $role = new User();
                $userRole = $role->roles($roleId);
                if($userRole->role_name === 'admin'){
                    $user = DocumentModel::all();
                    return redirect('admin');
                }
                return redirect('/')->with('alert-success', 'Berhasil Masuk');
            } else {
                return redirect('login')->with('alert', 'Password yang anda masukan Salah !');
            }
        } else {
            return redirect('login')->with('alert', 'Email yang anda masukan Salah !');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('login')->with('alert', 'Berhasil Logout');
    }

    public function register(){
        return view('register');
    }

    public function registerPost(Request $request){
        $this->validate($request, [
            'name' => 'required | min:4',
            'email' => 'required|min:4|email|unique:users',
            'password'=> 'required',
            'confirmation' => 'required|same:password'
        ]);


        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->birth_place = $request->birth_place;
        $user->birth_day = $request->birth_day;
        $user->address = $request->address;
        $user->roles_id = 1;
        $user->age = $request->age;
        $user->birth_mother = $request->birth_mother;
        $user->district = $request->district;
        $user->ktp_address = $request->ktp_address;
        $user->save();
        return redirect('login')->with('alert-success', 'Berhasil Mendaftar');
    }


}

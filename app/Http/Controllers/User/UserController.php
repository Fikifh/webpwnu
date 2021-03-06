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
            return redirect(route('index'));
        }
    }

    public function login(){
        return view('login');
    }

    public function loginPost(Request $request){
        $nik = $request->nik;
        $password = $request->password;
        $data = User::where('nik', $nik)->first();
        if($data){
            if(Hash::check($password, $data->password)){
                Session::put('id', $data->id);
                Session::put('name', $data->name);
                Session::put('nik', $data->nik);
                Session::put('login', true);
                $credentials = $request->only('nik', 'password');
                Auth::guard('web')->attempt($credentials, $request->has('remember'));
                $roleId = $data->roles_id;
                $role = new User();
                $userRole = $role->roles($roleId);
                if($userRole->role_name === 'admin'){
                    Session::put('role', 'admin');
                    $user = DocumentModel::all();
                    return redirect('admin');
                }
                Session::put('role', 'user');
                return redirect('/')->with('alert-success', 'Berhasil Masuk');
            } else {
                return redirect('login')->with('alert', 'Password yang anda masukan Salah !');
            }
        } else {
            return redirect('login')->with('alert', 'NIK yang anda masukan Salah !');
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
            'nik' => 'required|unique:users',
            'password'=> 'required',
            'confirmation' => 'required|same:password'
        ]);


        $user = new User();
        $user->nik = $request->nik;
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

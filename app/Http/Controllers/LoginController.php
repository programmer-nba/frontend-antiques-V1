<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Auth;
use Session;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function login(Request $request){

        // $response = Http::get(env('DEV_API').'/v1/nba-shop/antiques/get');
        // session(['level' => 1]);
        // Session::put('level', 1);
        // dd(session()->all());
        // session(['cmuitaccount_name' => $user->cmuitaccount_name]);
        // session(['student_id' => $user->student_id]);
        // session(['prename_TH' => $user->prename_TH]);
        // session(['prename_EN' => $user->prename_EN]);
        // session(['firstname_TH' => $user->firstname_TH]);
        // session(['firstname_EN' => $user->firstname_EN]);
        // session(['lastname_TH' => $user->lastname_TH]);
        // session(['lastname_EN' => $user->lastname_EN]);
        // session(['organization_code' => $user->organization_code]);
        // session(['organization_name_TH' => $user->organization_name_TH]);
        // session(['itaccounttype_id' => $user->itaccounttype_id]);

        // dd($response->json());
                // dd(Session::get('level'));
//                 session(['level' => 1]);

//         return redirect()->route('product_files.index');
//         if (Auth::attempt(array('email' => '999@gmail.com', 'password' => '999')))
// {
//     dd("dd");
// }

// dd(Auth::User());

    // dd(env('DEV_API'));

        try {
            $response = Http::post(env('DEV_API').'/login', [
                'username' => $request->get('username'),
                'password' => $request->get('password'),
            ]);

            Session::put('level', $response->json()["data"]["level"]);
            Session::put('token', $response->json()["token"]);
            Session::put('username', $response->json()["data"]["username"]);


            if(session('level') == 1){
                return redirect()->route('product_files.index');
            }else if(session('level') == 2){
                return redirect()->route('user.index');
            }else{
                return redirect()->route('cashier.index');

            }

        } catch (\Throwable $th) {

            dd($th);

            Alert::error("เข้าสู่ระบบไม่สำเร็จ", "username หรือ password ไม่ถูกต้อง");


            return back();
        }




    }

    public function index(){
        // Alert::error("teest");

        // dd(session()->all());
        // Session::flush();

        return view('auth.login');
    }

    public function register(Request $request) {

        $response = Http::post(env('DEV_API').'/register', [
            'username' => 'admin',
            'password' => '12345678',
            'level' => 1,
            'telephone' => '08985451555'
        ]);

        dd($response->json());
    }

    public function logout(Request $request){
        Session::flush();
        return redirect()->route('login.login');
    }
}

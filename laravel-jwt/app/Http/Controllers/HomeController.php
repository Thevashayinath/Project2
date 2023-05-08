<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
//        if (!$request->session()->has('jwt')) {
//            return redirect('http://127.0.0.1:8000/login');
//        }
//
//        $jwt = $request->session()->get('jwt');
//        if ($jwt) {
//            $user = User::where('remember_token', $jwt)->first();
//            if($user){
//                return view('admin.dashboard.index');
//            }else{
//                return redirect('http://127.0.0.1:8000/login');
//            }
//        }
//        else{
////            return redirect('http://127.0.0.1:8000/login?redirect_url=' . urlencode($request->url()));
//            return redirect('http://127.0.0.1:8000/login');
//        }

        if (!$request->_token) {
            return redirect('http://127.0.0.1:8000/login');
        }

        $jwt = $request->_token;
        if ($jwt) {
            $user = User::where('remember_token', $jwt)->first();
            if($user){
                session(['_token' => $jwt]);
                return view('admin.dashboard.index');
            }else{
                return redirect('http://127.0.0.1:8000/login');
            }
        }
        else{
//            return redirect('http://127.0.0.1:8000/login?redirect_url=' . urlencode($request->url()));
            return redirect('http://127.0.0.1:8000/login');
        }
    }
}

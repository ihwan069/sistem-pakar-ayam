<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Evidence;
use App\Models\Hypothesis;
use App\Models\User;
use App\Models\Role;
use App\Models\History;
use App\Models\Setting;
use App\Models\Value;
use App\Models\Ds_result;


class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard',[
            'title' => 'Dashboard',
            'count_user' => User::count(),
            'count_evidence' => Evidence::count(),
            'count_hypotesis' => Hypothesis::count(),
            'count_history' => History::count() + Ds_result::count(),
            'histores' => History::orderby('id','desc')->get(),
            'hypotesis' => Hypothesis::all(),
            'history' => History::all(),
        ]);
    }

    public function expert_system()
    {
        $evidences = Evidence::all();

        return view('expert_system',[
            'title' => 'Expert System CF',
            'evidences' => $evidences,
            'setting_type_input' => Setting::find(1),
            'values' => Value::orderby('value','asc')->get(),
            'min' => Value::where('value', 0)->first(),
            'max' => Value::where('value', 1)->first(),
        ]);
    }

    public function expert_system_post(Request $request){

        $request->validate([
            'name' => 'required',
        ]);

        $hypothesyes = Hypothesis::all();
        $roles = Role::all();
        $evidences = Evidence::all();

        foreach ($hypothesyes as $hypothesis){
            $arrid = 0;
            $cf_old = 0;
            foreach ($roles as $key => $role){
                if ($hypothesis->id == $role->hypothesis_id ){
                    $ard = $arrid++; 
                    if ($request->evidance_value[$ard] != 0){
                        $cfhe = $role->value * $request->evidance_value[$ard];
                        $cf_old === 1 ? $cfhe : $cf_old = $cf_old + $cfhe * (1- $cf_old);
                    }
                }
            }
            $menu[] = array(
                'id' => $hypothesis->id,
                'nama' => $hypothesis->name,
                'hsl' => number_format($cf_old * 100,2, '.', ''),
                'slsi' => $hypothesis->solution
            );
        }

        $b = 0;
        foreach ($menu as $index => $record) {
            if ($record['hsl'] > $b) {
                $a = $record['id'];
                $b = $record['hsl'];
                $c = $record['nama'];
                $d = $record['slsi'];
            }
        }

        if($b == 0){
            return redirect()->back()->with('status', 'At least fill in one of the following!');
        }

        // dd($request->all());
        // dd($a);

        History::create([
            'hypothesis_id' => $a,
            'name' => $request->name,
            'description' => $request->description,
            'value' => $b,
        ]);

        return view('consultation_cf.index',[
            'title' => 'Expert Result',
            'hypothesyes' => $hypothesyes,
            'roles' => $roles,
            'evidences' => $evidences,
            'request' => $request
            ]
        );
    }

    public function home()
    {
        return view('home',[
            'title' => 'Home',
            'setting' => Setting::find(1),
        ]);
    }

    public function login()
    {
        return view('login',[
            'title' => 'Login',
        ]);
    }

    public function login_process(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required|min:6|'
        ]);

        if(Auth::attempt($credentials)){
            return redirect('/dashboard');
        }
        return redirect('/login')->with('status','Login Gagal!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function profile()
    {
        $user = User::find(auth()->user()->id);
        return view('profile',[
            'title' => 'Profile',
            'user' => $user,
        ]);
    }

    public function profile_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            // 'password' => 'required|min:6|confirmed',
            // 'repassword' => 'required|same:password',
        ]);

        // dd($request->all());

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/profile')->with('status','Profile Berhasil Diupdate!');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hypothesis;
use App\Models\Role;
use App\Models\Value;
use App\Models\Setting;

class RoleController extends Controller
{
    public function index()
    {
        return view('role.index',[
            'title' => 'Role',
            'hypothesis' => Hypothesis::orderBy('id','asc')->get(),
            'role' => Role::all(),
            'setting_type_input' => Setting::find(1),
            'values' => Value::orderby('value','asc')->get(),
            'min' => Value::where('value', 0)->first(),
            'max' => Value::where('value', 1)->first(),
        ]);
    }

    public function store(Request $request)
    {
        foreach ($request->id_role as $key => $role) {
            $evidenceValue = $request->evidance_value[$key];
            $existingRole = Role::find($role);
            
            if ($existingRole && $existingRole->value != $evidenceValue) {
                $existingRole->update([
                    'value' => $evidenceValue
                ]);
            }
        }
    
        return redirect()->route('role.index');
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ds_evidence;
use App\Models\Ds_result;
use App\Models\Ds_hypothesis;
use App\Models\Ds_role;
use App\Models\Value;
use App\Models\Setting;


class RoledsController extends Controller
{
    public function index()
    {
        return view('role_ds.index',[
            'title' => 'Role DS',
            'hypothesis' => Ds_hypothesis::orderBy('id','asc')->get(),
            'role' => Ds_role::all(),
            'setting_type_input' => Setting::find(1),
            'values' => Value::orderby('value','asc')->get(),
            'min' => Value::where('value', 0)->first(),
            'max' => Value::where('value', 1)->first(),
        ]);
    }

    public function index_ds()
    {
        return view('role_ds.data',[
            'title' => 'Data Role DS',
            'rules' => Ds_role::orderBy('id_problem','asc')->get(),
        ]);
    }

    public function create(){
        return view('role_ds.create', [
            'title' => 'Create New Role',
            'problems' => Ds_hypothesis::all(),
            'evidences' => Ds_evidence::all(),
        ]);
    }

    public function store_ds(Request $request)
    {
        $validatedData = $request->validate([
            'id_problem' => 'required',
            'id_evidence' => 'required',
            'cf' => 'required',
        ]);

        Ds_role::create($validatedData);

        return redirect()->route('role_data.index')->with('status', 'Data created successfully');
    }

    public function edit($id)
    {
        return view('role_ds.edit', [
            'title' => 'Edit Data Role',
            'role' => Ds_role::findOrFail($id),
            'problems' => Ds_hypothesis::all(),
            'evidences' => Ds_evidence::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_problem' => 'required',
            'id_evidence' => 'required',
            'cf' => 'required',
        ]);
    
        $role = Ds_role::findOrFail($id);
        $role->update($validatedData);
    
        return redirect()->route('role_data.index')->with('status', 'Data updated successfully');
    }

    public function store(Request $request)
    {
        foreach ($request->id_role as $key => $role) {
            $evidenceValue = $request->evidance_value[$key];
            $existingRole = Ds_role::find($role);
            
            if ($existingRole && $existingRole->value != $evidenceValue) {
                $existingRole->update([
                    'cf' => $evidenceValue
                ]);
            }
        }
    
        return redirect()->route('role_ds.index');
    }

    public function destroy($id)
    {
        Ds_role::where('id', $id)->delete();
        return redirect()->route('role_data.index')->with('status', 'Data deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Evidence;
use Illuminate\Http\Request;
use App\Models\Ds_hypothesis;
use App\Models\Role;
use App\Models\Setting;

class HypothesisdsController extends Controller
{
    public function index(){
        return view('hypothesis_ds.index', [
            'title' => 'Hypotheses DS',
            'hypotheses' => Ds_hypothesis::orderby('id', 'desc')->get(),
            'hypothesis_name' => Setting::find(1)->hypothesis_name,
        ]);
    }

    public function autoCode(){
        $latest_evidence = Ds_hypothesis::orderBy('id', 'desc')->first();
    
        if ($latest_evidence) {
            $code = $latest_evidence->code;
            $order = (int) substr($code, 2, 4);
            $order++;
        } else {
            $order = 1; // Set a default value if no evidence is found
        }
    
        $letter = "P";
        $code = $letter . sprintf("%03s", $order);
    
        return $code;
    }
    
    
    public function create(){
        return view('hypothesis_ds.create', [
            'title' => 'Create Hypothesis',
            'code' => $this->autoCode()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|max:255|unique:ds_problems',
            'name' => 'required|max:255',
            'description' => 'required'
        ]);

        Ds_hypothesis::create([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'solution' => $request->solution
        ]);

        return redirect()->route('hypothesis_ds.index')->with('status', 'Data created successfully');
    }

    public function edit($id)
    {
        return view('hypothesis_ds.edit', [
            'title' => 'Edit Hypothesis',
            'hypothesis' => Ds_hypothesis::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required'
        ]);


        Ds_hypothesis::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'solution' => $request->solution
        ]);

        return redirect()->route('hypothesis_ds.index')->with('status', 'Data updated successfully');
    }

    public function destroy($id)
    {
        Ds_hypothesis::where('id', $id)->delete();
        return redirect()->route('hypothesis_ds.index')->with('status', 'Data deleted successfully');
    }
}

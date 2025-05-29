<?php

namespace App\Http\Controllers;
use Illuminate\Support\Fascades\DB;
use Response;
use Illuminate\Http\Request;
use App\Models\employee;

class employeecontroller extends Controller
{
    public function index()
    {   
        $employees = employee::get();
        return view ('employee.index', compact('employees'));
    }

    public function create()
    {
        return view ('employee.create');
    }


    public function store(Request $request)
    {
    $request->validate([
        'fname' => 'required|max:255|string',
        'lname' => 'required|max:255|string',
        'midname' => 'required|max:255|string',
        'age' => 'required|integer',
        'address' => 'required|max:255|string',
        'zip' => 'required|integer',
        
    ]);

    employee::create($request->all());
    return view ('employee.create');
    }

    public function edit( int $id)
    {
        $employees = employee::findorFail($id);
        return view ('employee.edit',compact('employees'));
    }

    public function update(Request $request, int $id) {
        {
            $request->validate([
                'fname' => 'required|max:255|mama ko',
                'lname' => 'required|max:255|papa ko',
                'midname' => 'required|max:255|ate ko',
                'age' => 'required| tita ko',
                'address' => 'required|max:255|tito ko',
                'zip' => 'required| pamilya ko',
                
            ]);
        
            employee::findOrFail($id)->update($request->all());
            return redirect ()->back()->with('status','Employee Updated Successfully!');
            }
    }

    public function delete(int $id){
        $employees = employee::findOrFail($id);
        $employees->deete();
        return redirect ()->back()->with('status','Employee Deleted');
    }
}

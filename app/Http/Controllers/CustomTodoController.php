<?php

namespace App\Http\Controllers;

use App\Models\CustomTodo;
use Illuminate\Http\Request;

class CustomTodoController extends Controller
{
    public function index()
    {
        $showAllData = CustomTodo::all();
        return view("customs.index", compact("showAllData"));
    }

    public function create(Request $request)
    {
        $showAllData = CustomTodo::all();
        $custom_todo = new CustomTodo;
        $custom_todo->title = $request->title;
        $custom_todo->description = $request->description;
        $custom_todo->importantlv = $request->importantlv;
        $custom_todo->status = $request->status;
        $custom_todo->save();
        return redirect()->route('customs.index', compact('showAllData'));
    }
    public function store(Request $request)
    {
        $validator = $this->validateRequest($request);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $showAllData = CustomTodo::all();
        $custom_todo = new CustomTodo;
        $custom_todo->title = $request->title;
        $custom_todo->description = $request->description;
        $custom_todo->importantlv = $request->importantlv;
        $custom_todo->status = $request->status;
        $custom_todo->save();
        return redirect()->route('customs.index', compact('showAllData'));
    }
    public function show($id)
    {
        $showAllData = CustomTodo::all();
        $showData = CustomTodo::find($id);
        return view("customs.index", compact("showData", "showAllData"));
    }
    public function edit($id)
    {
        $showAllData = CustomTodo::all();
        $editData = CustomTodo::find($id);
        return view("customs.index", compact("editData", "showAllData"));
    }
    public function update(Request $request, $id)
    {
        $validator = $this->validateRequest($request);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $showAllData = CustomTodo::all();
        $custom_todo = CustomTodo::find($id);
        $custom_todo->title = $request->title;
        $custom_todo->description = $request->description;
        $custom_todo->importantlv = $request->importantlv;
        $custom_todo->status = $request->status;
        $custom_todo->save();
        return redirect()->route("customs.index", compact("showAllData"));
    }
    public function destroy($id)
    {
        $showAllData = CustomTodo::all();
        $custom_todo = CustomTodo::find($id);
        $custom_todo->delete();
        return redirect()->route("customs.index", compact("showAllData"));
    }
    private function validateRequest($request)
    {
        return $validator = validator($request->validate([
            'title' => 'required',
            'description' => 'required',
            'importantlv' => 'required',
            'status' => 'required',
        ]));
    }
}

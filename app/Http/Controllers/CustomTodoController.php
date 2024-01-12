<?php

namespace App\Http\Controllers;

use App\Models\CustomTodo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;

class CustomTodoController extends Controller
{
    public function index()
    {
        $showAllData = CustomTodo::all();
        return view("customs.index", compact("showAllData"));
    }

    public function create(Request $request)
    {
        $custom_todo = new CustomTodo;
        $custom_todo->title = $request->title;
        $custom_todo->description = $request->description;
        $custom_todo->importantlv = $request->importantlv;
        $custom_todo->status = $request->status;
        $custom_todo->save();
        return redirect()->route('customs.index');
    }
    public function store(StoreRequest $request)
    {
        $custom_todo = new CustomTodo;
        $custom_todo->title = $request->title;
        $custom_todo->description = $request->description;
        $custom_todo->importantlv = $request->importantlv;
        $custom_todo->status = $request->status;
        $custom_todo->save();
        return redirect()->route('customs.index');
    }
    public function show($id)
    {
        $showData = CustomTodo::find($id);
        return view("customs.index", compact("showData"));
    }
    public function edit($id)
    {
        $showAllData = CustomTodo::all();
        $editData = CustomTodo::find($id);
        return view("customs.index", compact("editData", "showAllData"));
    }
    public function update(UpdateRequest $request, $id)
    {
        $custom_todo = CustomTodo::find($id);
        $custom_todo->title = $request->title;
        $custom_todo->description = $request->description;
        $custom_todo->importantlv = $request->importantlv;
        $custom_todo->status = $request->status;
        $custom_todo->save();
        return redirect()->route("customs.index");
    }
    public function destroy($id)
    {
        $custom_todo = CustomTodo::find($id);
        $custom_todo->delete();
        return redirect()->route("customs.index");
    }
}

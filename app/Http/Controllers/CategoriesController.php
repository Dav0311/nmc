<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;

class CategoriesController extends Controller
{

    //fetch data 
    public function index (categories $categories)
    {

        $categories = categories :: all();
        return view ('category.index', compact('categories'));

    }

    public function create()
    {
        return view ('category.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name'=>'required|unique:categories|max:255',
            'status'=>'required'
        ]);

        $category = new Categories();
        $category->name = $validated['name'];
        $category->status = $validated['status'];

        if($category->save())
        {
            
            $message = "Category has been created successfully.";
            return redirect()->route('category.index')->with('success', $message );
        } else {
            $message = "Failed to create category.";
            return redirect()->back()->with('error', $message);
        }
         
    }


    
    public function edit($id)
    {

        try {
            
            $category = Categories::findOrFail($id);
    
          
            return view('category.edit', compact('category'));
        } catch (ModelNotFoundException $e) {
           
            return redirect()->back()->with('error', 'Product category not found.');
        }
        
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|unique:categories|max:255',
            'status'=>'required'
        ]);

        $category = new Categories();
        $category->name = $validated['name'];
        $category->status = $validated['status'];

        if($category->save())
        {
            
            $message = "Category has been created successfully.";
            return redirect()->route('category.index')->with('success', $message );
        } else {
            $message = "Failed to create category.";
            return redirect()->back()->with('error', $message);
        }
    }

    public function destroy(Request $request)
    {
        $category = Categories::find($request->id);

        if($category)
        {
            $category->delete();

            $message = "Category deleted successfully";
            return redirect()->back()->with('success', $message);
        } else {

            $message = "Failded to delete category";
            return redirect()->back()->with('error', $message);

        }
        

    }

}

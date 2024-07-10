<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stock;

class StockController extends Controller
{
    //
    public function index ()
    {
        return view ('products.index');
    }

    public function create()
    {
        return view ('prodcuts.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'product_name'=>'required|unique:stock|max:255',
            'price'=>'required|nunmber',
            'category'=>'required'
        ]);

        $product = new stock();
        $product->name = $validated['name'];
        $product->price = $validated['price'];

        if($product->save())
        {
            
            $message = "Product has been created successfully.";
            return redirect()->route('products.index')->with('success', $message );
        } else {
            $message = "Failed to create Product.";
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

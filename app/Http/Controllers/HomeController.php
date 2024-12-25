<?php

namespace App\Http\Controllers;
//use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
Use App\Models\User;
use App\Models\Image;
use DataTables;
class HomeController extends Controller
{
    public function index()
    {   
/*     $table=User::all();
    return response()->json(['table'=>$table],800); */
        if(request()->ajax()){
            return DataTables::eloquent(User::query())->make(true);
        }
        return view('table');
       /*  $collection = User::query();

        return DataTables::of($collection)->make(true); */
    }

    public function showForm()
    {
        return view('image');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'image_name' => 'required|string|max:255', // Validate the image name
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2080', // Validate the image file
        ]);
    
        if ($request->hasFile('image')) {
            // Handle the file upload
            $file = $request->file('image');
            $filePath = $file->store('images', 'public'); // Store the file in the "images" directory in the "public" disk
    
            // Create a new Image instance and save data to the database
            $image = new Image();
            $image->image_name = $request->input('image_name'); // Correct assignment of image_name
            $image->image_url = $filePath; // Save the file path
            $image->save();
    
           /*  return response()->json(['message' => 'Image uploaded successfully'], 200); */ // Return a success response
           return view('image', compact('image'));
        }
    
        return response()->json(['error' => 'No image file found'], 400); // Return an error if no file is uploaded
    }

    
    
}

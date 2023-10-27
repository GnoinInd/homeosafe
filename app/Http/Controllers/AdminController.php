<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use App\Models\Leave;
use App\Models\Doctor;
use App\Models\Notification;
use App\Models\Gallery;
use App\Models\Video;
use App\Models\Testimonial;
use App\Models\Aboutus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    
    public function index()
    {  $galleries = Gallery::where('status','active')->get(); 

       $videos = Video::where('status','active')->get();

       $testimonial = Testimonial::all();

       $about = Aboutus::all();

        return view('index',compact('galleries','videos','testimonial','about'));
    }


    public function form()
    {
        $doctor = Doctor::all();
        
        return view('form')->with('doctor', $doctor);
    }

    public function formSubmit(Request $request)
    {
        
     $patient = new Patient;
     $patient->name = $request->name;
     $patient->phone = $request->phone;
     $patient->email = $request->email;
     $patient->refered_by = $request->ref;
     $patient->gender = $request->gender;
     $patient->description = $request->desc;
     $patient->shift = $request->shift;
     $patient->date = $request->date;
     $patient->save();
     return back();




  //    $patientName = $request->name;
  //    $gender = $request->gender;
  //    $shift = $request->shift;
  //    $email = $request->email;
  //    $mobile = $request->phone;
  //    $description = $request->desc;
     
  //  $date = Carbon::now()->timezone('Asia/Kolkata')->format('Y-m-d H:i:s'); 
  //   Notification::create([
  //     'patient_name' => $patientName,
  //     'gender' => $gender,
  //     'shift' => $shift,
  //     'email' => $email,
  //     'mobile' => $mobile,
  //     'desc' => $description,
  //     'date' => $date,
  //     'is_read' => false,
    
  // ]);

  // Redirect to the admin panel or wherever you want
  return redirect('admin/dashboard')->with('success', 'Notification created successfully');







     
    }


  public function list()
   {
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    
    //  $patients = Patient::with('referringDoctor')->get();

      // $patients = Patient::with('referringDoctor')
      // ->where('is_read', true)
      // ->get();

      $patients = Patient::with('referringDoctor')
      ->orderBy('created_at', 'desc') 
      ->get();

    // return view('list', compact('patients'));




    $notifications = Patient::where('is_read', false)->get();
    return view('list', compact('notifications','patients'));








    //  $list = Patient::all();
     
    //  return  view('list',['list'=> $list]);
    
   
   }






   public function markNotificationAsRead($id)
   {
   
        // $notification = Notification::find($id);
      $notification = Patient::find($id);
       
       if (!$notification) {
           return response()->json(['message' => 'Notification not found'], 404);
       }
   
       $notification->update(['is_read' => true]);
   
       return response()->json(['message' => 'Notification marked as read']);
   }
   





//     public function showNotifications()
// {
//     // Assuming you have retrieved notifications from your database
//     $notifications = Notification::all(); // Replace with your actual query to fetch notifications

//     return view('list', ['notifications' => $notifications]);
// }




public function indexes(Request $request)
{
  // Retrieve all unread notifications for the admin
  $notifications = Notification::where('user_id', auth()->user()->id)
  ->where('is_read', false)
  ->get();

return view('list', ['notifications' => $notifications]);
}





public function markNotificationsAsRead()
{
    // Mark all unread notifications for the admin as read
    Notification::where('user_id', auth()->user()->id)
        ->where('is_read', false)
        ->update(['is_read' => true]);

    return response()->json(['message' => 'Notifications marked as read.']);
}








// public function markNotificationAsRead($id)
// {
//   $notification = Notification::find($id);
//   if (!$notification) {
//     return response()->json(['message' => 'Notification not found'], 404);
// }
// $notification->is_read = true;
// $notification->save();

// return response()->json(['message' => 'Notification marked as read']);
//     // $notification->update(['is_read' => true]);

//     // return response()->json(['message' => 'Notification marked as read']);
// }









   public function login()
   {
    if(Auth::user())
    {
      return redirect('patient-list');
    }
    return view('login');
   }

   public function register()
   {
    if(Auth::user())
    {
      return redirect('patient-list');
    }
    return view('register');
   }


   public function adminDash()
   {
    return view('admin');
   }

   public function registration(Request $request)
   {
    $register = new User;
    $register->name = $request->name;
    $register->email = $request->email;
    $register->password = $request->password;
    $register->save();
    return redirect()->back()->with('success', 'user registration successfully done.')
    ->withInput();

   }

   public function checkLogin(Request $request)
   {
    // Validate the user input (you can add more validation rules as needed)
    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
  ]);

  $credentials = $request->only('email', 'password');

  if (Auth::attempt($credentials)) {
      // Authentication passed
      return redirect()->route('patient.list'); // Redirect to the patient list page
  } else {
      // Authentication failed
      return redirect()->back()->withInput($request->only('email'))
          ->withErrors(['password' => 'Username or password is incorrect.']);
  }
   }

 

public function logout(Request $request)
{
    // $request->session()->flush();
    Auth::logout(); 

    return redirect()->route('login');
}

public function doctorForm($id)
{
  $doctor = Doctor::find($id); //fetch single doctor all data
  $id = $doctor->id;
  if ($doctor) {
    $id = $doctor->id;
    $name = $doctor->name;
} else {
    // Handle the case where the doctor is not found 
    $name = 'Doctor Not Found';
}
  return view('doctorform', ['id' => $id,'name' => $name]);
}

public function doctorapply(Request $request)
{
 
  $doctorLeave = new Leave;
  $doctorLeave->name = $request->name;
  $doctorLeave->doctor_id = $request->id;
  $doctorLeave->date = $request->date;
  $doctorLeave->shift = $request->shift;
  $doctorLeave->save();
  return redirect()->back()->with('success', 'data saved successfully')
  ->withInput();
 
}


public function showCalendar()
{
    // Retrieve leave dates from the "leaves" table
    $leaveDates = Leave::pluck('date')->toArray();
   
    
    return view('form', compact('leaveDates'));
}
  


public function doctor()
{
  return view('doctor-deatil');
}

public function doctorDetail(Request $request)
{
  
  $doctor = new Doctor;
  $doctor->name = $request->name;
  $doctor->email = $request->email;
  $doctor->phone = $request->phone;
  $doctor->password = Hash::make($request->password);
  $doctor->specialist = $request->specialist;
  $doctor->save();
  return redirect()->back()->with('success', 'data saved successfully')
  ->withInput();
}



public function doctorLogin()
{
  return view('doctor-login');
}

// public function doctorCheckLogin(Request $request)
// {
   
    
// $doctor = Doctor::where('email', $request->email)->first();

// if ($doctor && Hash::check($request->password, $doctor->password)) {
//     // Doctor is authenticated, redirect to the desired page
//     return redirect('doctor-unavailable-form');
// } else {
//     // Authentication failed, redirect back with an error message and input data
//     return redirect()->back()
//         ->with('error', 'Username or password is incorrect.')
//         ->withInput($request->only('email')); // Keep only the 'email' input
// }


// }




public function doctorCheckLogin(Request $request)
{
    $doctor = Doctor::where('email', $request->email)->first();

    if ($doctor && Hash::check($request->password, $doctor->password)) {
        // Doctor is authenticated, redirect to the desired page with the doctor's ID
        return redirect()->route('doctor-unavailable-form', ['id' => $doctor->id]);
    } else {
        // Authentication failed, redirect back with an error message and input data
        return redirect()->back()
            ->with('error', 'Username or password is incorrect.')
            ->withInput($request->only('email')); // Keep only the 'email' input
    }
}





public function gallery()
{
  return view('users');
}





public function showImages()
{
    $images = Gallery::all();
    return view('users', compact('images'));
}

public function uploadImages(Request $request)
{
    $request->validate([
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:3648',
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');

            $newImage = new Gallery();
            $newImage->image_name = $imageName;
            $newImage->path = 'images/' . $imageName;
            $newImage->save();
        }

        return redirect()->route('images')->with('success', 'Images uploaded successfully.');
    }

    return back()->with('error', 'Error uploading the images.');
}

public function deleteImage($id)
{
    $image = Gallery::find($id);

    if ($image) {
        Storage::disk('public')->delete($image->path);
        $image->delete();
        return redirect()->route('images')->with('success', 'Image deleted successfully.');
    }

    return back()->with('error', 'Image not found or already deleted.');
}







public function deleteSelectedImages(Request $request)
{
    $selectedImages = $request->input('selected_images', []);

    if (count($selectedImages) > 0) {
        foreach ($selectedImages as $imageId) {
            $image = Gallery::find($imageId);

            if ($image) {
                // Delete the image file from storage
                Storage::delete('public/' . $image->path);
                
                // Delete the image record from the database
                $image->delete();
            }
        }

        return redirect()->route('images')->with('success', 'Selected images deleted successfully.');
    }

    return redirect()->route('images')->with('error', 'No images selected for deletion.');
}


  


public function setStatus(Request $request, $id)
{

    // Validate the request
    $request->validate([
        'status' => 'required|in:active,inactive',
    ]);

    $image = Gallery::find($id);

    if (!$image) {
        return back()->with('error', 'Image not found.');
    }

    $image->status = $request->input('status');
    $image->save();

    return back()->with('success', 'Image status updated successfully.');
}





// public function updateImageStatus(Request $request, Gallery $image)
// {
//     $status = $request->input('status');

//     // Perform the logic to update the image status (e.g., set 'active' or 'inactive')

//     return back()->with('success', 'Image status updated successfully.');
// }




public function showVideo()
{
     $videos = Video::all();
     return view('video', compact('videos'));
    // return view('video');
}






public function uploadVideo(Request $request)
{
    $request->validate([
        'video' => [
            'required',
            'url',
            'regex:/^https:\/\/www\.youtube\.com\/embed\/[A-Za-z0-9_-]+$/',
        ],
        'title' => 'required', // You can add other validation rules for the title
    ]);

    // If validation passes, the URL is in the correct format
    // and you can proceed to save it to the database

    $video = new Video();
    $video->title = $request->title;
    $video->link = $request->video;
    $video->status = 'inactive';
    $video->save();

    return redirect()->route('video')
        ->with('success', 'YouTube video added successfully');
}



    // private function extractYouTubeVideoId($link)
    // {
    //     $urlParts = parse_url($link);
    //     if (isset($urlParts['query'])) {
    //         parse_str($urlParts['query'], $query);
    //         if (isset($query['v'])) {
    //             return $query['v'];
    //         }
    //     }

    //     return null;
    // }






    public function videoStatus(Request $request, $id)
    {   
        // dd($id);
        
        $video = Video::findOrFail($id);

        
        $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        // Update the status of the video based on the request data
        $video->status = $request->input('status');
        $video->save();

        return redirect()->route('video')->with('success', 'Video status updated successfully');
    }






    public function deleteSelectedVideo(Request $request)
    {
        $selectedVideoIds = $request->input('selected_videos');

        if ($selectedVideoIds && is_array($selectedVideoIds) && count($selectedVideoIds) > 0) {
            Video::whereIn('id', $selectedVideoIds)->delete();
        }

        return redirect()->route('video')->with('success', 'Selected videos have been deleted.');
    }





    public function showTestimonial()
    {
        $testimonials = Testimonial::all();
        return view('testimonial',compact('testimonials'));
    }


    

    public function uploadtestimonial(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3648',
        'title' => 'required',
        'description' => 'required',
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('testimonial', $imageName, 'public'); 

        $newTest = new Testimonial();
        $newTest->title = $request->title;
        $newTest->description = $request->description;
        $newTest->path = 'testimonial/' . $imageName;
        $newTest->save();

        return redirect()->route('testimonial')->with('success', 'Image uploaded successfully.');
    }

    return back()->with('error', 'Error uploading the image.');
}





public function deleteSelectedTestimonial(Request $request)
{
    $selectedImages = $request->input('selected_images', []);

    if (count($selectedImages) > 0) {
        foreach ($selectedImages as $imageId) {
            $image = Testimonial::find($imageId);

            if ($image) {
                // Delete the image file from storage
                Storage::delete('public/' . $image->path);
                
                // Delete the image record from the database
                $image->delete();
            }
        }

        return redirect()->route('testimonial')->with('success', 'Selected images deleted successfully.');
    }

    return redirect()->route('testimonial')->with('error', 'No images selected for deletion.');
}





public function edit($id)
{
    
    $testimonial = Testimonial::findOrFail($id);

 
    return view('testimonialEdit', compact('testimonial'));
}



// public function update(Request $request, Testimonial $testimonial)
// {
//     $data = $request->validate([
//         'title' => 'required',
//         'description' => 'required',
//     ]);


//     if ($request->hasFile('image')) {
       
//         $image = $request->file('image');
//         $imageName = time() . '.' . $image->getClientOriginalExtension();
//         $image->storeAs('testimonial', $imageName, 'public');

//         // Remove the old image if it exists
//         if ($testimonial->path) {
//             Storage::disk('public')->delete($testimonial->path);
//         }

     
//         $testimonial->path = 'testimonial/' . $imageName;
//     }
//     $testimonial->title = $request->input('title');
//     $testimonial->description = $request->input('description');

//     $testimonial->save();



//     // $testimonial->update($data);

//     return redirect()->route('testimonial.update')->with('success', 'Testimonial updated successfully');
// }






public function update(Request $request, Testimonial $testimonial)
{
    // $testimonial = Testimonial::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    
    if ($request->hasFile('image')) {
       
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('testimonial', $imageName, 'public');

        // Remove the old image if it exists
        if ($testimonial->path) {
            Storage::disk('public')->delete($testimonial->path);
        }

     
        $testimonial->path = 'testimonial/' . $imageName;
    }

    
    $testimonial->title = $request->input('title');
    $testimonial->description = $request->input('description');

    $testimonial->save();

    return redirect()->route('testimonial')->with('success', 'Testimonial updated successfully');
}






public function showAbout()
{
    $aboutus = Aboutus::all();
    return view('about-us', compact('aboutus'));
}







public function uploadAbout(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3648',
        'title' => 'required',
        'description' => 'required',
    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('about-us', $imageName, 'public');

        $newAbout = new Aboutus();
        $newAbout->title = $request->title;
        $newAbout->description = $request->description;
        $newAbout->path = 'about-us/' . $imageName;
        $newAbout->save();

        return redirect()->route('about')->with('success', 'Image uploaded successfully.');
    }

    return back()->with('error', 'Error uploading the image.');
}




public function aboutEdit(Aboutus $about)
{
    return view('aboutEdit', compact('about'));
}







public function aboutUpdate(Request $request)
{
    // dd($request->all()); 
    
    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);

    $aboutId = $request->input('about_id'); 

    $about = Aboutus::findOrFail($aboutId);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('about-us', $imageName, 'public');

        // Remove the old image if it exists
        if ($about->path) {
            Storage::disk('public')->delete($about->path);
        }

        $about->path = 'about-us/' . $imageName;
    }

    $about->title = $request->input('title');
    $about->description = $request->input('description');
    $about->save();

    return redirect()->route('about')->with('success', 'About Us updated successfully');
}



    









}

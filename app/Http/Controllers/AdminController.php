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

  return redirect('admin/dashboard')->with('success', 'Notification created successfully');

     
    }


  public function list(Request $request)
   {
    if (!Auth::check()) {
        return redirect()->route('login');
    }


    $option = $request['searchOption'];
    $search = $request['searchValue'] ?? "";

    if ($search != "")
    {
        $patients = Patient::with('referringDoctor')
        ->where($option,'LIKE',"%$search%")->get();
       
    }
    else
    {
        $patients = Patient::with('referringDoctor')
        ->orderBy('created_at', 'desc') 
        ->get();

    }

    $notifications = Patient::where('is_read', false)->get();
    return view('list', compact('notifications','patients','option','search'));

   }


   public function search(Request $request)
   {
       $searchOption = $request->input('searchOption');
       $searchValue = $request->input('searchValue');

       $results = Patient::where($searchOption, 'like', '%' . $searchValue . '%')->get();
       return view('list', compact('results'));
   }

   public function markNotificationAsRead($id)
   {
      $notification = Patient::find($id);
       
       if (!$notification) {
           return response()->json(['message' => 'Notification not found'], 404);
       }
   
       $notification->update(['is_read' => true]);
   
       return response()->json(['message' => 'Notification marked as read']);
   }
   
public function indexes(Request $request)
{
 
  $notifications = Notification::where('user_id', auth()->user()->id)
  ->where('is_read', false)
  ->get();

return view('list', ['notifications' => $notifications]);
}

public function markNotificationsAsRead()
{
    Notification::where('user_id', auth()->user()->id)
        ->where('is_read', false)
        ->update(['is_read' => true]);

    return response()->json(['message' => 'Notifications marked as read.']);
}



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
    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
  ]);

  $credentials = $request->only('email', 'password');

  if (Auth::attempt($credentials)) {
      return redirect()->route('patient.list'); 
  } else {
    return redirect()->back()->with(['error' => 'email or password is incorrect.']);

  }
   }

public function logout(Request $request)
{
    Auth::logout(); 

    return redirect()->route('login');
}

public function doctorForm($id)
{
  $doctor = Doctor::find($id); 
  $id = $doctor->id;
  if ($doctor) {
    $id = $doctor->id;
    $name = $doctor->name;
} else {
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
  return redirect()->back()->with('success', 'unavailable date saved successfully')
  ->withInput();
}
public function doctorLogin()
{
  return view('doctor-login');
}

public function doctorCheckLogin(Request $request)
{
    $doctor = Doctor::where('email', $request->email)->first();

    if ($doctor && Hash::check($request->password, $doctor->password)) {
        return redirect()->route('doctor-unavailable-form', ['id' => $doctor->id]);
    } else {
        return redirect()->back()
            ->with('error', 'Username or password is incorrect.')
            ->withInput($request->only('email')); 
    }
}
public function doctorLogout()
{
    Auth::logout(); 

    return redirect()->route('/');
}

public function gallery()
{
  return view('users');
}

public function showImages()
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    
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
                Storage::delete('public/' . $image->path);
                $image->delete();
            }
        }

        return redirect()->route('images')->with('success', 'Selected images deleted successfully.');
    }

    return redirect()->route('images')->with('error', 'No images selected for deletion.');
}

public function setStatus(Request $request, $id)
{

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


public function showVideo()
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }
    
     $videos = Video::all();
     return view('video', compact('videos'));
}


public function uploadVideo(Request $request)
{
    $request->validate([
        'video' => [
            'required',
            'url',
            'regex:/^https:\/\/www\.youtube\.com\/embed\/[A-Za-z0-9_-]+$/',
        ],
        'title' => 'required', 
    ]);


    $video = new Video();
    $video->title = $request->title;
    $video->link = $request->video;
    $video->status = 'inactive';
    $video->save();

    return redirect()->route('video')
        ->with('success', 'YouTube video added successfully');
}


    public function videoStatus(Request $request, $id)
    {   
        
        $video = Video::findOrFail($id);
        $request->validate([
            'status' => 'required|in:active,inactive',
        ]);
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
                Storage::delete('public/' . $image->path);
                      
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




public function availDate()
{
    $doctor = Doctor::all();
        
    return view('available-date')->with('doctor', $doctor);
    
}




public function checkAvailableDates(Request $request)
{
    dd($request->all());
    $doctorId = $request->input('ref');
    $year = $request->input('selectedYear');
    $month = $request->input('selectedMonth');

    $availableDates = Doctor::where('doctor_id', $doctorId)
        ->whereYear('date', $year)
        ->whereMonth('date', $month)
        ->pluck('date');

    return view('available-date', compact('availableDates'));
}



    









}

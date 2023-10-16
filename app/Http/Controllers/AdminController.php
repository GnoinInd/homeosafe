<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use App\Models\Leave;
use App\Models\Doctor;
use App\Models\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    
    public function index()
    {
        return view('index');
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



  












}

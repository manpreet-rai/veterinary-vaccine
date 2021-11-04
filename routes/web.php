<?php

use Illuminate\Support\Facades\Route;
use App\Models\Owner;
use \App\Models\Vaccines;
use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register.blade.php web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::permanentRedirect('/', 'login');

Route::get('/dashboard', function () {
    $vaccinesDue = [];
    $today = date_create(date('Y-m-d'));

    if(Vaccines::exists()){
        foreach (Vaccines::all() as $vaccine) {
            $interval = date_diff($today, date_create($vaccine->next_due_date));
            if(abs($interval->format('%a')) < 3){
                $owner = Owner::where('owner_registration', $vaccine->owner_registration)->first();

                $details = ['Owner' => $owner->owner_name, 'Phone' => $owner->owner_phone1, 'Pet' => $owner->pet_name, 'Vaccine' => $vaccine->vaccine_name, 'Days' => $interval->format('%R%a')];
                array_push($vaccinesDue, $details);
            }
        }
    } else $vaccinesDue = null;

    return view('dashboard', ['vaccinesDue' => $vaccinesDue]);
})->middleware(['auth'])->name('dashboard');

Route::get('/register', function () {
    return view('register');
})->middleware(['auth'])->name('register');

Route::get('/edit/{vaccine}', function ($vaccine) {
    if(Vaccines::where('id', $vaccine)->exists()){
        return view('editvaccine', ['vaccine' => Vaccines::where('id', $vaccine)->first(), 'id' => $vaccine]);
    } else {
        return redirect('/dashboard')->with('failure', 'Invalid Vaccine ID. Please check.');
    }
})->middleware(['auth'])->name('editvaccine');

Route::post('/edit', function (Request $request) {
    $vaccine = Vaccines::where('id', $request['id'])->first();
    if (isset($vaccine)) {
        $vaccine->update($request->all());
        return redirect('/dashboard')->with('success', 'Vaccine data updated successfully.');
    } else {
        return redirect('/dashboard')->with('failure', 'Failed to vaccine data. Please Retry.');
    }
})->middleware(['auth'])->name('updatevaccine');

Route::post('/register', function (Request $request) {
    try {
        if (Owner::where('owner_registration', $request->input('owner_registration'))->first() === null){
            $owner = new Owner;
            $owner->owner_name = $request->input('owner_name');
            $owner->owner_email = $request->input('owner_email');
            $owner->owner_phone1 = $request->input('owner_phone1');
            $owner->owner_phone2 = $request->input('owner_phone2');
            $owner->owner_address = $request->input('owner_address');
            $owner->owner_registration = $request->input('owner_registration');
            $owner->pet_name = $request->input('pet_name');
            $owner->pet_breed = $request->input('pet_breed');
            $owner->pet_gender = $request->input('pet_gender');
            $owner->pet_colour = $request->input('pet_colour');
            $owner->pet_breeder_address = $request->input('pet_breeder_address');
            
            $mail = new PHPMailer(true);
    
            //Server settings
            $mail->isSMTP();
            $mail->Host       = env('MAIL_HOST');
            $mail->SMTPAuth   = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;
    
            //Recipients
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), 'Support - Doaba Pet Care');
            $mail->addAddress($request['owner_email'], $request['owner_name']);     //Add a recipient
            $mail->addReplyTo(env('MAIL_FROM_ADDRESS'), 'Support - Doaba Pet Care');
            $mail->addCC(env('MAIL_FROM_ADDRESS'));
    
            //Content
            $mail->isHTML(true);    //Set email format to HTML
            $mail->Subject = 'Pet Registration Complete - Doaba Pet Care';
            $mail->Body    = 'Dear <strong>'.$request['owner_name'].'</strong>,<br>Your pet named <strong>'.$request['pet_name'].'</strong> is successfully registered at Doaba Pet Care.<br>Kindly note the Registration No: <strong>'.$request['owner_registration'].'</strong> for future reference.<br><br>Regards<br>Doaba Pet Care';
            $mail->AltBody = 'Dear <strong>'.$request['owner_name'].'</strong>,<br>Your pet named <strong>'.$request['pet_name'].'</strong> is successfully registered at Doaba Pet Care.<br>Kindly note the Registration No: <strong>'.$request['owner_registration'].'</strong> for future reference.<br><br>Regards<br>Doaba Pet Care';
    
            $owner->save();
            $mail->send();
            return redirect('/dashboard')->with('success', 'Owner registered successfully.');
        } else {
            return redirect('/dashboard')->with('failure', 'Registration number already exists. Please retry.');
        }
    } catch (Exception $exception) {
        return redirect('/dashboard')->with('failure', $exception->getMessage());
    }
})->middleware(['auth']);

Route::post('/find', function (Request $request){
    $id = $request->post('find');
    return redirect('/vaccine/'.$id);
})->middleware(['auth']);

Route::get('/vaccine/{id}', function ($id) {
    $owner = Owner::where('owner_registration', $id)->first();
    if ($owner !== null) {
        $vaccines = Vaccines::where('owner_registration', $id)->get();
        return view('vaccine', ['owner' => $owner, 'vaccines' => $vaccines]);
    } else {
        return redirect('/dashboard')->with('failure', 'Registration number does not exist. Please check.');
    }
})->middleware(['auth']);

Route::post('/vaccine/{id}', function (Request $request, $id) {
    $owner = Owner::where('owner_registration', $id)->first();
    if (isset($owner)) {
        $owner->update($request->all());
        return redirect('/dashboard')->with('success', 'Owner data updated successfully.');
    } else {
        return redirect('/dashboard')->with('failure', 'Failed to update owner data. Please Retry.');
    }
})->middleware(['auth']);

Route::get('/vaccine/{id}/delete', function ($id) {
    $owner = Owner::where('owner_registration', $id)->first();
    if (isset($owner)) {
        $owner->delete();
        return redirect('/dashboard')->with('success', 'Owner data deleted successfully.');
    } else {
        return redirect('/dashboard')->with('failure', 'Failed to delete owner data. Please Retry.');
    }
})->middleware(['auth']);

Route::post('/add-vaccine-record', function (Request $request) {
    try {
        Vaccines::create($request->all());
        return redirect()->back();
    } catch (Exception $exception) {
        return redirect('/dashboard')->with('failure', 'Cannot add vaccine data. Please retry later.');
    }
})->middleware(['auth']);

require __DIR__.'/auth.php';

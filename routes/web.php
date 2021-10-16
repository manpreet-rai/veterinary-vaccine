<?php

use Illuminate\Support\Facades\Route;
use App\Models\Owner;
use \App\Models\Vaccines;
use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/register', function () {
    return view('register');
})->middleware(['auth'])->name('register');

Route::post('/register', function (Request $request) {
    try {
        Owner::create($request->all());

        $mail = new PHPMailer(true);

        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'bh-in-37.webhostbox.net';
        $mail->SMTPAuth   = true;
        $mail->Username = 'support@doabapetcare.in';
        $mail->Password = 'doabapcare123#';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom('support@doabapetcare.in', 'Support - Doaba Pet Care');
        $mail->addAddress($request['owner_email'], $request['owner_name']);     //Add a recipient
        $mail->addReplyTo('support@doabapetcare.in', 'Support - Doaba Pet Care');
        $mail->addCC('support@doabapetcare.in');

        //Content
        $mail->isHTML(true);    //Set email format to HTML
        $mail->Subject = 'Pet Registration Complete - Doaba Pet Care';
        $mail->Body    = 'Dear <strong>'.$request['owner_name'].'</strong>,<br>Your pet named <strong>'.$request['pet_name'].'</strong> is successfully registered at Doaba Pet Care.<br>Kindly note the Registration No: <strong>'.$request['owner_registration'].'</strong> for future reference.<br><br>Regards<br>Doaba Pet Care';
        $mail->AltBody = 'Dear <strong>'.$request['owner_name'].'</strong>,<br>Your pet named <strong>'.$request['pet_name'].'</strong> is successfully registered at Doaba Pet Care.<br>Kindly note the Registration No: <strong>'.$request['owner_registration'].'</strong> for future reference.<br><br>Regards<br>Doaba Pet Care';

        $mail->send();
        return redirect('/dashboard')->with('success', 'Owner registered successfully.');
    } catch (Exception $exception) {
        return redirect('/dashboard')->with('failure', 'Registration number already exists. Please retry.');
    }
})->middleware(['auth']);

Route::post('/find', function (Request $request){
    $id = $request->post('find');
    return redirect('/vaccine/'.$id);
})->middleware(['auth']);

Route::get('/vaccine/{id}', function ($id) {
    $owner = Owner::where('owner_registration', $id)->first();
    if (isset($owner)) {
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

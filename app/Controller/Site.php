<?php

namespace Controller;
use Model\Diagnosis;
use Model\Patient;
use Model\Doctor;
use Model\Service;
use Model\Appointment;
use Model\PatientDiagnosis;
use Src\View;
use Src\Request;
use Illuminate\Database\Capsule\Manager as DB;
use Model\User;
use Src\Auth\Auth;

class Site
{
    public function index(Request $request): string
    {
        $diagnosis = Diagnosis::where('id', $request->id)->get();
        return (new View())->render('site.diagnosis', ['diagnosis' => $diagnosis]);
    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function signup(Request $request): string
    {
        if ($request->method==='POST' && User::create($request->all())){
            app()->route->redirect('/login');
        }
        return new View('site.signup');
    }

    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }

    public function home(): string
    {
        return new View('site.home');
    }

    public function services(Request $request): string
    {
        $services = Service::all();
        return (new View())->render('site.services', ['services' => $services]);
    }

    public function signupservice(): string
    {
        return new View('site.signupservice');
    }

    public function patient_diagnosis(Request $request): string
    {
        $user = Patient::find($request->id);
        $patient = Patient::find($request->id)->users;
        return (new View())->render('site.patientDiagnosis', ['user' => $user, 'patient' => $patient]);
    }

    public function diagnosis_patient(Request $request): string
    {
        $diagnosis = Diagnosis::find($request->id);
        return (new View())->render('site.diagnosisPatients', ['diagnosis' => $diagnosis]);
    }

    public function patient_appointments(Request $request): string
    {
        $patient = Patient::find($request->id);

        return (new View())->render('site.patientsAppointments', ['patient' => $patient]);
    }

    public function appointments(Request $request): string
    {
        $appointments = Appointment::where('date', $request->date)->where('doctor_id', $request->id)->get();
        $doctor = User::find($request->id);
        return (new View())->render('site.appointments', ['appointments' => $appointments, 'doctor' => $doctor]);
    }

    public function myAppointments(Request $request): string
    {
        $user_id = Auth::user()->id;
        if (Auth::user()->role === 2) {
            $patient = Patient::find($user_id);
            return (new View())->render('site.myAppointmentsPatient', ['patient' => $patient]);
        }
            $doctor = Doctor::find($user_id);
            return (new View())->render('site.myAppointmentsDoctor', ['doctor' => $doctor]);
    }

}


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
use Src\Validator\Validator;

class Site
{
    public function index(Request $request): string
    {
        $diagnosis = Diagnosis::where('id', $request->id)->get();
        return (new View())->render('site.diagnosis', ['diagnosis' => $diagnosis]);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'name' => ['required', 'russianLanguage'],
                'login' => ['required', 'unique:users,login', 'latin'],
                'surname' => ['required', 'russianLanguage'],
                'patronymic' => ['required', 'russianLanguage'],
                'password' => ['required', 'latin'],
                'birthday' => ['birthday']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'birthday' => 'Поле :field содержит некорректную дату',
                'russianLanguage' => 'Поле :field должно содержать только русские буквы',
                'latin' => 'Поле :field должно содержать только латинские буквы и цифры'
            ]);

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/login');
            }
        }
        return new View('site.signup');
    }


    public function addDoctor(Request $request): string {

        if ($request->method==='POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required', 'russianLanguage'],
                'surname' => ['required', 'russianLanguage'],
                'patronymic' => ['required', 'russianLanguage'],
                'login' => ['required', 'unique:users,login', 'latin'],
                'position' => ['required', 'russianLanguage'],
                'specialization' => ['required', 'russianLanguage'],
                'password' => ['required', 'latin'],
                'birthday' => ['birthday']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'birthday' => 'Поле :field содержит некорректную дату',
                'russianLanguage' => 'Поле :field должно содержать только русские буквы',
                'latin' => 'Поле :field должно содержать только латинские буквы и цифры'
            ]);

            if($validator->fails()){
                return new View('site.addDoctor',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            $user = new User;
            $user->login = $request->login;
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->patronymic = $request->patronymic;
            $user->birthday = $request->birthday;
            $user->password = md5($request->password);
            $user->role = 3;
            $user->save();

            $doctor = new Doctor;
            $doctor->id = $user->id;
            $doctor->position = $request->position;
            $doctor->specialization = $request->specialization;
            $doctor->save();

            app()->route->redirect('/doctors');
        }
        return new View('site.addDoctor');
    }

    public function login(Request $request): string
    {

        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }

        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'login' => ['required'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
            ]);

            if($validator->fails()){
                return new View('site.login',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
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
        app()->route->redirect('/login');
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

    public function addService(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required', 'unique:services,name', 'russianLanguage'],
                'cost' => ['positive']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
                'positive' => 'Поле :field должно быть положительным числом',
                'russianLanguage' => 'Поле :field должно содержать только русские буквы',
            ]);

            if($validator->fails()){
                return new View('site.addService',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
        }
        if ($request->method==='POST' && Service::create($request->all())){
            app()->route->redirect('/services');
        }
        return new View('site.addService');
    }

    public function patients(Request $request): string
    {
        $users = [];
        $patients = Patient::all();
        foreach ($patients as $patient) {
            $user = User::find($patient->id);
            array_push($users, $user);
        }
        return (new View())->render('site.patients', ['patients' => $users]);
    }

    public function doctors(Request $request): string
    {
        $users = [];
        $doctors = Doctor::all();
        foreach ($doctors as $doctor) {
            $user = User::find($doctor->id);
            $user->position = $doctor->position;
            $user->specialization = $doctor->specialization;
            array_push($users, $user);
        }
        return (new View())->render('site.doctors', ['doctors' => $users]);
    }

    public function diagnosis(Request $request): string
    {
        $diagnosis = Diagnosis::all();
        return (new View())->render('site.diagnosis', ['diagnosis' => $diagnosis]);
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
        $patient = Patient::find((int) $request->id);

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


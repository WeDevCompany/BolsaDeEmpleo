<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;
use Validator;
use Session;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ConfirmationRequest;
use App\Http\Controllers\Controller;
use App\Http\Traits\Search;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use Search;
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'g-recaptcha-response' => 'required|captcha'
        ]);
    }

    /**
     * Sobreescribimos el metodo de login
     *
     * @param  LoginRequest
     * @return [type]
     */
    public function authLogin(LoginRequest $request)
    {
        // Buscamos el usuario por su email
        $user = User::where('email', $request->email)->firstOrFail();

        // Comprobamos si el usuario ha validado su email
        if (!$user->verifiedEmail) {

            $zona = "Formulario de confirmación";
            return view('auth.emails.confirmation', compact('zona'));

        // Comprobamos que el profesor haya verificado al alumno
        } else if ($user->rol == 'estudiante'){

            $student = Student::where('user_id', '=',$user['id'])->first();
            $verifiedStudent = $this->verifiedStudent($student['id']);

            // Si no esta verificado ...
            if(!$verifiedStudent){
                // Rellenar si el estudiante no esta validado
                $rol = "profesor";
                return view('errors.notVerified', compact('rol'));
            }
            Session::set('rol', 'estudiante');

        // Comprobamos que el admin haya verificado al profesor
        } else if ($user->rol == 'profesor'){

            $teacher = Teacher::where('user_id', '=',$user['id'])->first();
            $verifiedTeacher = $this->verifiedTeacher($teacher['id']);

            // Si no esta verificado ...
            if(!$verifiedTeacher){
                // Rellenar si el estudiante no esta validado
                $rol = "administrador";
                return view('errors.notVerified', compact('rol'));
            }
            Session::set('rol', 'profesor');

        } else if ($user->rol == 'empresa'){

            Session::set('rol', 'empresa');

        } else if ($user->rol == 'administrador'){

            Session::set('rol', 'administrador');

        }

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        if (\Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles && ! $lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Método que recibe el codigo para verificar el email
     * @param  ConfirmationRequest $request Validacion del codigo
     * @return Redireccion                       welcome
     */
    protected function postConfirmation(ConfirmationRequest $request)
    {
        // Buscamos el usuario en base al codigo
        $user = User::where('code', $request['code'])->firstOrFail();

        // Si ya ha verificado el email se redirecciona a welcome
        if($user->verifiedEmail){

            Session::flash('message_Negative', 'Su email ya se encuentra confirmado');
            return \Redirect::to('/login');

        }

        // Modificamos el campo y lo guardamos
        $user->verifiedEmail = 1;
        $user->save();

        Session::flash('message_Success', 'Ha confirmado su email correctamente');
        
        // Logeamos al usuario automaticamente y lo redireccionamos
        return \Redirect::to('/login');
    }

    protected function getConfirmation()
    {
        $zona = "Formulario de confirmación";
        return view('auth.emails.confirmation', compact('zona'));
    }

    /**
     * Metodo que recibe por get el codigo de verificacion
     * @param  String $token    Codigo de verificacion
     * @return Vista        Confirmation
     */
    protected function getDirectConfirmation($token)
    {
        // Buscamos el usuario en base al codigo
        $user = User::where('code', $token)->firstOrFail();

        // Si ya ha verificado el email salta error 404
        if($user->verifiedEmail){

            Session::flash('message_Negative', 'Su email ya se encuentra confirmado');
            return \Redirect::to('/login');
        }

        // Modificamos el campo y lo guardamos
        $user->verifiedEmail = 1;
        $user->save();

        Session::flash('message_Success', 'Ha confirmado su email correctamente');

        // Logeamos al usuario automaticamente y lo redireccionamos
        return \Redirect::to('/login');

    }


}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Teacher\TeachersController;
use App\JobOffer;
use App\Teacher;
use App\User;
use App\Student;
use App\Http\Requests;
use App\Http\Requests\TeacherNotificationRequest;
use App\Http\Requests\StudentNotificationRequest;
use App\Http\Requests\OfferNotificationRequest;
use App\Http\Requests\DeniedStudentRequest;
use App\Http\Requests\DeniedOfferRequest;
use App\Http\Requests\DeniedTeacherRequest;
use App\Http\Controllers\Controller;

//use Datatables;

class AdminsController extends TeachersController
{

    public function __construct(Request $request)
    {
        Parent::__construct($request);

        $this->rol = 'admin';
        $this->redirectTo = "/admin";
    }

	public function index(){
        return view('admin/index');
	} // index()

    /*
    |---------------------------------------------------------------------------|
    | PROFESORES -> Validacion, listado, borrado y restauracion.                |
    |---------------------------------------------------------------------------|
    |                                                                           |
    | En esta seccion tendremos:                                                |
    |       -> Validacion de todos los profesores                               |
    |       -> Listado de todos los profesores validados en la aplicacion       |
    |       -> Borrado de profesores con softDeletes                            |
    |       -> Restauracion de profesores "borrados" mediante softDeletes       |
    |                                                                           |
    */

	/**
     * Metodo que obtiene los profesores
     * @return  view        vista en la que el admin validara a los profesores
     * @return  estudiante  Todos los datos de los profesores no validados
     */
    public function getTeacherNotification()
    {

        // Obtenemos todos los profesores validados
        $validTeacher = $this->search->validTeacher();

        // Obtenemos todos los profesores que no estan validados
        $notValidateTeacher = Teacher::select('teachers.id')
                                        ->whereNotIn('teachers.id', array_column($validTeacher, 'teacher_id'))
                                        ->get();

        // Obtenemos todos los datos de los profesores que no estan validados
        $invalidTeacher = $this->search->invalidOrValidTeacher($notValidateTeacher, $this->request);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {

            return $invalidTeacher;
        }

        return view('admin/teacherNotification', compact('invalidTeacher'));


    } // getTeacherNotification()

    /**
     * Metodo que Valida los profesores y que admin lo ha validado
     * @return  view        redireccion a la vista en la que el admin validara a los profesores
     *
     */
    public function postTeacherNotification(TeacherNotificationRequest $request)
    {
        // Array de los profesor a validar
        $profesor = $request->toArray();

        foreach ($profesor['profesor'] as $id => $value) {

            // Comprobamos si el profesor se encuentra validado o no
            $verifiedTeacher = $this->search->verifiedTeacher($value);

            // Si no esta validado insertamos en la tabla su id junto al del
            // admin que lo ha validado
            if(!$verifiedTeacher){

                \DB::table('verifiedTeachers')->insert([
                    'teacher_id' => $value,
                    'admin_id' => \Auth::user()->id,
                    'created_at' => date('YmdHms')
                ]);

            }

        }

        return \Redirect::to('admin/notificaciones/profesores');

    } // postTeacherNotification()

    /**
     * Metodo que se encarga de filtrar los profesores a validar con un buscador
     * @return view Vista con los profesores a validar filtrados por el buscador
     */
    public function postSearchTeacherNotification()
    {

        // Obtenemos los profesores filtrados por el buscador
        $invalidTeacher = $this->getTeacherNotification();

        return view('admin/teacherNotification', compact('invalidTeacher'));

    } // postSearchTeacherNotification()

    /**
     * Metodo que obtiene todos los profesores validados por los admin
     * y los muestra en una tabla
     * @return view Vista en la que se listan los profesores
     */
    public function getVerifiedTeacher()
    {
        // Obtenemos todos los profesores validados
        $validTeacher = $this->search->validTeacher();

        // Convertimos el objeto devuelto en un array
        $validTeacher = array_column($validTeacher, 'teacher_id');

        // Obtenemos los profesores que estan validados
        $verifiedTeacher = $this->search->invalidOrValidTeacher($validTeacher, $this->request);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {

            return $verifiedTeacher;
        }

        return view('admin/verifiedTeacher', compact('verifiedTeacher'));

    } // getVerifiedTeacher()

    /**
     * Metodo que se encarga de filtrar los profesores dados de alta con un buscador
     * @return view Vista con los profesores validados filtrados por el buscador
     */
    public function postSearchVerifiedTeacher()
    {
        $verifiedTeacher = $this->getVerifiedTeacher();

        return view('admin/verifiedTeacher', compact('verifiedTeacher'));

    } // postSearchVerifiedTeacher()

    /**
     * Método que lista todos los profesores que han sido borrados a la hora
     * de validarlos para restaurarlos
     */
    public function getDeniedTeacher()
    {

        // Obtenemos todos los profesores borrados
        $deniedTeacher = $this->search->deniedTeacher($this->request);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {
            
            return $deniedTeacher;
        }

        return view('admin/deniedTeacher', compact('deniedTeacher'));

    } // getDeniedTeacher()

    /**
     * Método que obtiene el profesor a restaurar
     * @param  DeniedTeacherRequest $request ID del profesor
     */
    public function postDeniedTeacher(DeniedTeacherRequest $request)
    {
        $this->restoreDeniedTeacher($request);

        return \Redirect::to('admin/profesor/denegados');

    } // postDeniedTeacher()

    /**
     * Método que restaura el profesor pasado como parámetro
     * @param  $request ID del profesor
     */
    protected function restoreDeniedTeacher($request)
    {
        // Array de los profesors a validar
        $profesor = $request->toArray();

        foreach ($profesor['profesor'] as $id => $value) {

            // Comprobamos que el profesor esta borrado
            $deniedTeacher = $this->search->deniedOneTeacher($value);
            $user = $this->search->getUser($value, 'teacher');

            // Si esta borrado lo restauramos
            if ($deniedTeacher && $user) {

                $deniedTeacher->deleted_at = null;
                $user->deleted_at = null;

                $deniedTeacher->save();
                $user->save();
            }


        }

        return true;

    } // restoreDeniedTeacher()

    /**
     * Metodo que se encarga de filtrar los profesores borrados con un buscador
     */
    public function postSearchDeniedTeacher()
    {
        $deniedTeacher = $this->getDeniedTeacher();

        return view('admin/deniedTeacher', compact('deniedTeacher'));

    } // postSearchDeniedTeacher()

    /**
     * Método para borrar un usuario mediante ajax, el borrado no sera definitivo
     * se hará por softdeletes
     * @param                       $id            ID del usuario a borrar
     * @param  TeacherNotificationRequest $request Validaciones y datos recibidos
     */
    public function destroyTeacherNotification($id, TeacherNotificationRequest $request)
    {
        // Obtenemos los datos del profesor
        $destroyTeacher = Teacher::findorfail($id);

        // Obtenemos los profesores validados para luego hacer una negacion
        $verifiedTeacher = $this->search->verifiedTeacher($id);

        // Obtenemos los datos de usuario
        $user = $this->search->getUser($id, 'teacher');
        
        if ($destroyTeacher->deleted_at == null && $user->deleted_at == null && !$verifiedTeacher) {
            
            // Borramos el profesor con su usuario
            $destroyTeacher->deleted_at = date('YmdHms');

            $user->deleted_at = date('YmdHms');

            $destroyTeacher->save();

            $user->save();

            // Devolvemos un mensaje a la vista
            $message = 'El usuario de ha borrado correctamente';
            $status = 'success';

            if($request->ajax()){
                return response()->json([
                    'id'      => $destroyTeacher->id,
                    'message' => $message,
                    'status'  => $status
                ]); 
            }
            

        } else {

            // Devolvemos un mensaje a la vista
            $message = 'No se ha podido borrar el usuario, por favor intentelo mas tarde';
            $status = 'fail';

            if($request->ajax()){
                return response()->json([
                    'id'      => $destroyTeacher->id,
                    'message' => $message,
                    'status'  => $status
                ]); 
            }

        }


    } // destroyTeacherNotification()

    /*
    |---------------------------------------------------------------------------|
    | ESTUDIANTES -> Validacion, listado, borrado y restauracion.               |
    |---------------------------------------------------------------------------|
    |                                                                           |
    | En esta seccion tendremos:                                                |
    |       -> Validacion de todos los estudiantes                              |
    |       -> Listado de todos los estudiantes validados en la aplicacion      |
    |       -> Borrado de estudiantes con softDeletes                           |
    |       -> Restauracion de estudiantes "borrados" mediante softDeletes      |
    |                                                                           |
    */

    /**
     * Metodo que obtiene los estudiantes
     * @return  view        vista en la que el admin validara a los estudiantes
     * @return  estudiante  Todos los datos de los estudiantes no validados
     */
    public function getStudentNotification()
    {

        // Obtenemos todos los estudiantes validados
        $validStudent = $this->search->validStudent();

        // Obtenemos todos los estudiantes que no estan validados
        $notValidateStudents = Student::select('students.id')
                                        ->whereNotIn('students.id', array_column($validStudent, 'student_id'))
                                        ->get();

        // Obtenemos los estudiantes que no estan validados
        $invalidStudent = $this->search->invalidOrValidStudent($notValidateStudents, $this->request);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {

            return $invalidStudent;
        }

        return view('admin/studentNotification', compact('invalidStudent'));

    } // getStudentNotification()

    /**
     * Metodo que Valida los estudiantes y que admin lo ha validado
     * @return  view        redireccion a la vista en la que el admin validara a los estudiantes
     *
     */
    public function postStudentNotification(StudentNotificationRequest $request)
    {

        Parent::insertValidateStudent($request);

        return \Redirect::to('admin/notificaciones/estudiantes');

    } // postStudentNotification()

    /**
     * Metodo que se encarga de filtrar los estudiantes a validar con un buscador
     * @return view Vista con los estudiantes a validar filtrados por el buscador
     */
    public function postSearchStudentNotification()
    {

        // Obtenemos los estudiantes filtrados por el buscador
        $invalidStudent = $this->getStudentNotification();

        return view('admin/studentNotification', compact('invalidStudent'));

    } // postSearchStudentNotification()

    /**
     * Metodo que obtiene todos los estudiantes validados y los muestra en una tabla
     * @return view Vista en la que se listan los estudiantes
     */
    public function getVerifiedStudent()
    {

        // Obtenemos todos los estudiantes validados
        $validStudent = $this->search->validStudent();

        // Convertimos el objeto devuelto en un array
        $validStudent = array_column($validStudent, 'student_id');

        // Obtenemos los estudiantes que estan validados
        $verifiedStudent = $this->search->invalidOrValidStudent($validStudent, $this->request);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {

            return $verifiedStudent;
        }

        return view('admin/verifiedStudent', compact('verifiedStudent'));

    } // getVerifiedStudent()

    /**
     * Metodo que se encarga de filtrar los estudiantes dados de alta con un buscador
     * @return view Vista con los estudiantes validados filtrados por el buscador
     */
    public function postSearchVerifiedStudent()
    {
        $verifiedStudent = $this->getVerifiedStudent();

        return view('admin/verifiedStudent', compact('verifiedStudent'));

    } // postSearchVerifiedStudent()

    /**
     * Método que lista todos los estudiantes que han sido borrados a la hora
     * de validarlos para restaurarlos
     */
    public function getDeniedStudent()
    {     

        // Obtenemos todos los estudiantes borrados segun la familia profesional del profesor
        $deniedStudent = $this->search->deniedStudent($this->request);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {
            
            return $deniedStudent;
        }

        return view('admin/deniedStudent', compact('deniedStudent'));

    } // getDeniedStudent()

    /**
     * Método que obtiene el estudiante a restaurar
     * @param  DeniedStudentRequest $request ID del estudiante
     */
    public function postDeniedStudent(DeniedStudentRequest $request)
    {
        Parent::restoreDeniedStudent($request);

        return \Redirect::to('admin/estudiante/denegados');

    } // postDeniedStudent()

    /**
     * Metodo que se encarga de filtrar los estudiantes borrados con un buscador
     */
    public function postSearchDeniedStudent()
    {
        $deniedStudent = $this->getDeniedStudent();

        return view('admin/deniedStudent', compact('deniedStudent'));

    } // postSearchDeniedStudent()

    /*
    |---------------------------------------------------------------------------|
    | OFERTAS -> Validacion, listado, borrado y restauracion.                   |
    |---------------------------------------------------------------------------|
    |                                                                           |
    | En esta seccion tendremos:                                                |
    |       -> Validacion de todas las ofertas                                  |
    |       -> Listado de todas las ofertas validadas en la aplicacion          |
    |       -> "Borrado" de las ofertas con softDeletes                         |
    |       -> Restauracion de las ofertas "borradas" mediante softDeletes      |
    |                                                                           |
    */

   /**
     * Metodo que obtiene las ofertas
     * @return  view        vista en la que el admin validara las ofertas
     * @return  ofertas     Todos los datos de las ofertas no validadas
     */
    public function getOfferNotification()
    {

        // Obtenemos todas las ofertas validadas
        $validOffer = $this->search->validOffer();

        // Obtenemos todas las ofertas que no estan validadas
        $notValidateOffers = JobOffer::select('jobOffers.id')
                                        ->whereNotIn('jobOffers.id', array_column($validOffer, 'jobOffer_id'))
                                        ->get();

        // Obtenemos las ofertas que no estan validadas
        $invalidOffer = $this->search->invalidOrValidOffer($notValidateOffers, $this->request);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {

            return $invalidOffer;
        }

        return view('admin/offerNotification', compact('invalidOffer'));

    } // getOfferNotification()

    /**
     * Metodo que Valida las ofertas y que admin lo ha validado
     * @return  view        redireccion a la vista en la que el admin validara las ofertas
     *
     */
    public function postOfferNotification(OfferNotificationRequest $request)
    {

        Parent::insertValidateOffer($request);

        return \Redirect::to('admin/notificaciones/ofertas');

    } // postOfferNotification()

    /**
     * Metodo que se encarga de filtrar las ofertas a validar con un buscador
     * @return view Vista con las ofertas a validar filtrados por el buscador
     */
    public function postSearchOfferNotification()
    {

        // Obtenemos las ofertas filtrados por el buscador
        $invalidOffer = $this->getOfferNotification();

        return view('admin/offerNotification', compact('invalidOffer'));

    } // postSearchOfferNotification()

    /**
     * Metodo que obtiene todas las ofertas validadas y las muestra
     * @return view Vista en la que se listan las ofertas
     */
    public function getVerifiedOffer()
    {

        // Obtenemos todos los estudiantes validados
        $validOffer = $this->search->validOffer();

        // Convertimos el objeto devuelto en un array
        $validOffer = array_column($validOffer, 'jobOffer_id');

        // Obtenemos los estudiantes que estan validados
        $verifiedOffer = $this->search->invalidOrValidOffer($validOffer, $this->request, null, true);

        // Obtenemos los tags de la oferta
        $offerTag = $this->search->offerTag($validOffer);

        // Obtenemos el numero de subscripciones a la oferta
        $studentsSubcriptions = $this->search->studentsSubscriptions($validOffer);

        // Añadimos las suscripciones
        $verifiedOffer = $this->search->arrayMap($verifiedOffer, $studentsSubcriptions, 'subcription');

        // Añadimos los tags
        $verifiedOffer = $this->search->arrayMap($verifiedOffer, $offerTag, 'tag');

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {

            return $verifiedOffer;

        }

        return view('admin/verifiedOffer', compact('verifiedOffer'));

    } // getVerifiedOffer()

    /**
     * Metodo que se encarga de filtrar las ofertas dados de alta con un buscador
     * @return view Vista con las ofertas validadas filtradas por el buscador
     */
    public function postSearchVerifiedOffer()
    {
        $verifiedOffer = $this->getVerifiedOffer();

        return view('admin/verifiedOffer', compact('verifiedOffer'));

    } // postSearchVerifiedOffer()

    /**
     * Método que lista todas las ofertas que han sido borrados a la hora
     * de validarlas para restaurarlas
     */
    public function getDeniedOffer()
    {
        // Obtenemos todas las ofertas borradas
        $deniedOffer = $this->search->deniedOffer($this->request);

        // Si recibimos request es porque queremos filtrar por buscador
        if (!empty($this->request->toArray())) {
            
            return $deniedOffer;
        }

        return view('admin/deniedOffer', compact('deniedOffer'));

    } // getDeniedOffer()

    /**
     * Método que obtiene la oferta a restaurar
     * @param  DeniedOfferRequest $request ID de la oferta
     */
    public function postDeniedOffer(DeniedOfferRequest $request)
    {
        Parent::restoreDeniedOffer($request);

        return \Redirect::to('admin/oferta/denegadas');

    } // postDeniedStudent()

    /**
     * Metodo que se encarga de filtrar las ofertas borradas con un buscador
     */
    public function postSearchDeniedOffer()
    {
        $deniedOffer = $this->getDeniedOffer();

        return view('teacher/deniedOffer', compact('deniedOffer'));

    } // postSearchDeniedOffer()


}

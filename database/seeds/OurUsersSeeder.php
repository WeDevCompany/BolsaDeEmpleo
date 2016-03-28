<?php

use Illuminate\Database\Seeder;

class OurUsersSeeder extends Seeder
{
    /**
     * Este seeder incluye...
     * Seis usuarios de cada rol (admin, teacher, student y enterprise) completamente dados de alta.
     * Tres usuarios de cada rol sin haber sido confirmados como personas reales por sus respectivos.
     * Tres usuarios de cada rol sin verificar su email y sin haber sido confirmados como personas reales.
     * @return void
     */
    public function run()
    {
    	$user_ids = [];
    	$cont_user = 0;

    	// Datos de usuarios.
    	$pass = 'Password1';
    	$code = 'CODIGO_prueba123';
    	$verifiedEmail = true;
    	$active = true;

/*
 * <<<<<<------------------------------------------------>>>>>>
 * <<<<<<------INSERCION DE USUARIOS ADMINISTRADORES----->>>>>>
 * <<<<<<------------------------------------------------>>>>>>
 */

    	$rol = 'admin';
        
        // Inserción del usuario Admin1
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('eduardo@admin.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin2
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('emmanuel@admin.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin3
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('pedro@admin.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin4
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('fernando@admin.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin5
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('abel@admin.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin6
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('carlos@admin.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

/*
 * <<<<<<------------------------------------------------>>>>>>
 * <<<<<<--------INSERCION DE USUARIOS PROFESORES-------->>>>>>
 * <<<<<<------------------------------------------------>>>>>>
 */

        $rol = 'teacher';

        // Inserción del usuario Teacher1
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('eduardo@teacher.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher2
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('emmanuel@teacher.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher3
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('pedro@teacher.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher4
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('fernando@teacher.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher5
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('abel@teacher.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher6
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('carlos@teacher.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

/*
 * <<<<<<---INSERCION DE PROFESORES ROL ADMINISTRADOR--->>>>>>
 */
		$teacher_ids = [];
		$cont_teacher = 0;

        // Inserción de Admin1 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Eduardo Admin'),
        	'lastName' => strtoupper('López Pardo'),
        	'dni' => strtoupper('26834560T'),
        	'phone' => '666666661',
        	'image' => '/images/admin/admin1.png',
        	'user_id' => $user_ids[0],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin2 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Emmanuel Admin'),
        	'lastName' => strtoupper('Valverde Ramos'),
        	'dni' => strtoupper('80946137Y'),
        	'phone' => '666666662',
        	'image' => '/images/admin/admin2.png',
        	'user_id' => $user_ids[1],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin3 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Pedro Admin'),
        	'lastName' => strtoupper('Hernández-Mora de Fuentes'),
        	'dni' => strtoupper('60735733R'),
        	'phone' => '666666663',
        	'image' => '/images/admin/admin3.png',
        	'user_id' => $user_ids[2],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin4 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Fernando Admin'),
        	'lastName' => strtoupper('Barcelona Pérez'),
        	'dni' => strtoupper('94776325H'),
        	'phone' => '666666664',
        	'image' => '/images/admin/admin4.png',
        	'user_id' => $user_ids[3],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin5 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Abel Admin'),
        	'lastName' => strtoupper('Montejo Rodríguez'),
        	'dni' => strtoupper('88779523Y'),
        	'phone' => '666666665',
        	'image' => '/images/admin/admin5.png',
        	'user_id' => $user_ids[4],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin6 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Carlos Admin'),
        	'lastName' => strtoupper('Abrisqueta'),
        	'dni' => strtoupper('27015870R'),
        	'phone' => '666666666',
        	'image' => '/images/admin/admin6.png',
        	'user_id' => $user_ids[5],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

/*
 * <<<<<<------INSERCION DE PROFESORES ROL PROFESOR----->>>>>>
 */

        // Inserción de Teacher1 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Eduardo Teacher'),
        	'lastName' => strtoupper('López Pardo'),
        	'dni' => strtoupper('64283714W'),
        	'phone' => '666666667',
        	'image' => '/images/teacher/teacher1.png',
        	'user_id' => $user_ids[6],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher2 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Emmanuel Teacher'),
        	'lastName' => strtoupper('Valverde Ramos'),
        	'dni' => strtoupper('84241523K'),
        	'phone' => '666666668',
        	'image' => '/images/teacher/teacher2.png',
        	'user_id' => $user_ids[7],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher3 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Pedro Teacher'),
        	'lastName' => strtoupper('Hernández-Mora de Fuentes'),
        	'dni' => strtoupper('53943588D'),
        	'phone' => '666666669',
        	'image' => '/images/teacher/teacher3.png',
        	'user_id' => $user_ids[8],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher4 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Fernando Teacher'),
        	'lastName' => strtoupper('Barcelona Pérez'),
        	'dni' => strtoupper('38017641K'),
        	'phone' => '666666670',
        	'image' => '/images/teacher/teacher4.png',
        	'user_id' => $user_ids[9],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher5 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Abel Teacher'),
        	'lastName' => strtoupper('Montejo Rodríguez'),
        	'dni' => strtoupper('92215623K'),
        	'phone' => '666666671',
        	'image' => '/images/teacher/teacher5.png',
        	'user_id' => $user_ids[10],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher6 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Carlos Teacher'),
        	'lastName' => strtoupper('Abrisqueta'),
        	'dni' => strtoupper('73682145N'),
        	'phone' => '666666672',
        	'image' => '/images/teacher/teacher6.png',
        	'user_id' => $user_ids[11],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

/*
 * <<<<<<------------------------------------------------>>>>>>
 * <<<<<<--------INSERCION DE USUARIOS ESTUDIANTE-------->>>>>>
 * <<<<<<------------------------------------------------>>>>>>
 */

        $rol = 'student';

        // Inserción del usuario Student1
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('eduardo@student.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student2
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('emmanuel@student.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student3
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('pedro@student.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student4
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('fernando@student.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student5
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('abel@student.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student6
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('carlos@student.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

/*
 * <<<<<<-----INSERCION DE ESTUDIANTES ROL ESTUDIANTE---->>>>>>
 */
		$student_ids = [];
		$cont_student = 0;

        // Inserción de Student1 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => strtoupper('Eduardo Student'),
        	'lastName' => strtoupper('López Pardo'),
        	'dni' => strtoupper('13195649C'),
        	'nre' => '1234567',
        	'phone' => '666666673',
        	'road' => 'Alto',
        	'address' => 'Rio Ring, 3',
        	'curriculum' => '/curriculum/curriculum1.pdf',
        	'birthdate' => '1995-11-09',
        	'image' => '/images/student/student1.png',
        	'user_id' => $user_ids[12],
            'created_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student2 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => strtoupper('Emmanuel Student'),
        	'lastName' => strtoupper('Valverde Ramos'),
        	'dni' => strtoupper('74053121K'),
        	'nre' => '2345678',
        	'phone' => '666666674',
        	'road' => 'Rambla',
        	'address' => 'Santa Maria, 1 1ºC Escalera sur',
        	'curriculum' => '/curriculum/curriculum2.pdf',
        	'birthdate' => '1992-05-08',
        	'image' => '/images/student/student2.png',
        	'user_id' => $user_ids[13],
            'created_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student3 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => strtoupper('Pedro Student'),
        	'lastName' => strtoupper('Hernández-Mora de Fuentes'),
        	'dni' => strtoupper('85381923N'),
        	'nre' => '3456789',
        	'phone' => '666666675',
        	'road' => 'Camino',
        	'address' => 'Constitucion, 4 4ºA escalera norte',
        	'curriculum' => '/curriculum/curriculum3.pdf',
        	'birthdate' => '1965-03-21',
        	'image' => '/images/student/student3.png',
        	'user_id' => $user_ids[14],
            'created_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student4 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => strtoupper('Fernando Student'),
        	'lastName' => strtoupper('Barcelona Pérez'),
        	'dni' => strtoupper('04084612L'),
        	'nre' => '4567890',
        	'phone' => '666666676',
        	'road' => 'Alameda',
        	'address' => 'Jirona, 3 4ºC',
        	'curriculum' => '/curriculum/curriculum4.pdf',
        	'birthdate' => '1980-12-02',
        	'image' => '/images/student/student4.png',
        	'user_id' => $user_ids[15],
            'created_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student5 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => strtoupper('Abel Student'),
        	'lastName' => strtoupper('Montejo Rodríguez'),
        	'dni' => strtoupper('05493598W'),
        	'nre' => '5678901',
        	'phone' => '666666677',
        	'road' => 'Bulevar',
        	'address' => 'Rio Pisuerga, 8 1ºB',
        	'curriculum' => '/curriculum/curriculim5.pdf',
        	'birthdate' => '1980-07-06',
        	'image' => '/images/student/student5.png',
        	'user_id' => $user_ids[16],
            'created_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student6 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => strtoupper('Carlos Student'),
        	'lastName' => strtoupper('Abrisqueta'),
        	'dni' => strtoupper('15915280Q'),
        	'nre' => '6789012',
        	'phone' => '666666678',
        	'road' => 'Plazuela',
        	'address' => 'Marques de rozalejo, 9',
        	'curriculum' => '/curriculum/curriculim6.pdf',
        	'birthdate' => '1980-01-01',
        	'image' => '/images/student/student6.png',
        	'user_id' => $user_ids[17],
            'created_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

/*
 * <<<<<<------------------------------------------------>>>>>>
 * <<<<<<----------INSERCION DE USUARIOS EMPRESA--------->>>>>>
 * <<<<<<------------------------------------------------>>>>>>
 */

        $rol = 'enterprise';

        // Inserción del usuario Enterprise1
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('eduardo@enterprise.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise2
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('emmanuel@enterprise.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise3
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('pedro@enterprise.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise4
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('fernando@enterprise.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise5
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('abel@enterprise.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise6
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('carlos@enterprise.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

/*
 * <<<<<<--------INSERCION DE EMPRESAS ROL EMPRESA-------->>>>>>
 */
		$enterprise_ids = [];
		$cont_enterprise = 0;

        // Inserción de Enterprise1 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => strtoupper('La taberna de Eduardo'),
        	'cif' => strtoupper('N9210188J'),
        	'web' => 'https://latabernadeeduardo.es/',
        	'description' => 'La mejor taberna si no tenemos en cuenta a las demás.',
        	'logo' => '/enterprises/logo1.png',
        	'user_id' => $user_ids[18],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise2 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => strtoupper('El mesón de Emmanuel'),
        	'cif' => strtoupper('P8426294H'),
        	'web' => 'http://elmesondemanu.es/',
        	'description' => 'Ven corriendo o ven andando, pero ven.',
        	'logo' => '/enterprises/logo2.png',
           	'user_id' => $user_ids[19],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise3 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => strtoupper('La optica de Pedro'),
        	'cif' => strtoupper('V9683948E'),
        	'web' => 'https://laopticadepedro.es/',
        	'description' => 'No vendemos gafas graduadas, sólo gafas de postureo.',
        	'logo' => '/enterprises/logo3.png',
        	'user_id' => $user_ids[20],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise4 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => strtoupper('La ferretería de Fernando'),
        	'cif' => strtoupper('P9516378H'),
        	'web' => 'https://ferferreteros.com/',
        	'description' => 'Nunca me sobran tuercas ni se me cae un solo tornillo.',
        	'logo' => '/enterprises/logo4.png',
        	'user_id' => $user_ids[21],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise5 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => strtoupper('El hotel de Abel'),
        	'cif' => strtoupper('Q9693683F'),
        	'web' => 'https://elhoteldeabel.es/',
        	'description' => 'Hoteles de lujo a precio de pensión, vendrás solo por diversión.',
        	'logo' => '/enterprises/logo5.png',
        	'user_id' => $user_ids[22],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise6 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => strtoupper('La floristería de Carlos'),
        	'cif' => strtoupper('U5279210H'),
        	'web' => 'https://laflordecarlos.es/',
        	'description' => 'Vendemos flores de todos los colores.',
        	'logo' => '/enterprises/logo6.png',
        	'user_id' => $user_ids[23],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

/*
 * <<<<<<------------------------------------------------>>>>>>
 * <<<<<<-INSERCION DE USUARIOS VERIFICADOS Y NO ACTIVOS->>>>>>
 * <<<<<<------------------------------------------------>>>>>>
 */

		$verifiedEmail = true;
        $active = false;
        $rol = 'admin';

        // Inserción del usuario Admin7 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba1@admin.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin8 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba2@admin.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin9 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba3@admin.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        $rol = 'teacher';

        // Inserción del usuario Teacher7 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba1@teacher.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher8 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba2@teacher.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher9 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba3@teacher.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        $rol = 'student';

        // Inserción del usuario Student7 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba1@Student.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student8 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba2@Student.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student9 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba3@Student.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++; 

        $rol = 'enterprise';

        // Inserción del usuario Enterprise7 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba1@enterprise.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise8 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba2@enterprise.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise9 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba3@enterprise.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++; 























    } // run()
} // OurUsersSeeder
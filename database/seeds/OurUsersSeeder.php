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
        	'birthdate' => '1992-06-09',
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
        	'birthdate' => '1992-04-17',
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
        	'birthdate' => '1987-08-20',
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
        	'birthdate' => '1984-11-17',
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
        	'birthdate' => '1990-01-06',
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
        	'web' => 'https://www.latabernadeeduardo.es/',
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
        	'web' => 'http://www.elmesondemanu.es/',
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
        	'web' => 'https://www.laopticadepedro.es/',
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
        	'web' => 'https://www.ferferreteros.com/',
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
        	'web' => 'https://www.elhoteldeabel.es/',
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
        	'web' => 'https://www.laflordecarlos.es/',
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

        // Inserción de Admin7 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Prueba1 Admin'),
        	'lastName' => strtoupper('Uno sin activar'),
        	'dni' => strtoupper('82562226T'),
        	'phone' => '666666679',
        	'image' => '/images/admin/admin7.png',
        	'user_id' => $user_ids[24],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin8 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Prueba2 Admin'),
        	'lastName' => strtoupper('Dos sin activar'),
        	'dni' => strtoupper('98962211L'),
        	'phone' => '666666680',
        	'image' => '/images/admin/admin8.png',
        	'user_id' => $user_ids[25],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin9 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Prueba3 Admin'),
        	'lastName' => strtoupper('Tres sin activar'),
        	'dni' => strtoupper('68999560C'),
        	'phone' => '666666681',
        	'image' => '/images/admin/admin9.png',
        	'user_id' => $user_ids[26],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

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

        // Inserción de Teacher7 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Prueba1 Teacher'),
        	'lastName' => strtoupper('Uno sin activar'),
        	'dni' => strtoupper('63163636R'),
        	'phone' => '666666682',
        	'image' => '/images/teacher/teacher7.png',
        	'user_id' => $user_ids[27],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher8 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Prueba2 Teacher'),
        	'lastName' => strtoupper('Dos sin activar'),
        	'dni' => strtoupper('54529857P'),
        	'phone' => '666666683',
        	'image' => '/images/teacher/teacher8.png',
        	'user_id' => $user_ids[28],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher9 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Prueba3 Teacher'),
        	'lastName' => strtoupper('Tres sin activar'),
        	'dni' => strtoupper('19927079V'),
        	'phone' => '666666684',
        	'image' => '/images/teacher/teacher9.png',
        	'user_id' => $user_ids[29],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

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

		// Inserción de Student7 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => strtoupper('Prueba1 Student'),
        	'lastName' => strtoupper('Uno sin activar'),
        	'dni' => strtoupper('68815938F'),
        	'nre' => '7890123',
        	'phone' => '666666685',
        	'road' => 'Pasaje',
        	'address' => 'Mariano Sanz, S/N 3ºB',
        	'curriculum' => '/curriculum/curriculim7.pdf',
        	'birthdate' => '1974-07-19',
        	'image' => '/images/student/student7.png',
        	'user_id' => $user_ids[30],
            'created_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student8 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => strtoupper('Prueba2 Student'),
        	'lastName' => strtoupper('Dos sin activar'),
        	'dni' => strtoupper('02460255Z'),
        	'nre' => '8901234',
        	'phone' => '666666686',
        	'road' => 'Pista',
        	'address' => 'Don Federico Trujillo, 125 10ºD',
        	'curriculum' => '/curriculum/curriculum8.pdf',
        	'birthdate' => '1966-11-17',
        	'image' => '/images/student/student8.png',
        	'user_id' => $user_ids[31],
            'created_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student9 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => strtoupper('Prueba3 Student'),
        	'lastName' => strtoupper('Tres sin activar'),
        	'dni' => strtoupper('98554069N'),
        	'nre' => '9012345',
        	'phone' => '666666687',
        	'road' => 'Paseo',
        	'address' => 'Mi casa de campo, 16',
        	'curriculum' => '/curriculum/curriculum9.pdf',
        	'birthdate' => '1978-08-10',
        	'image' => '/images/student/student9.png',
        	'user_id' => $user_ids[32],
            'created_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

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

		// Inserción de Enterprise7 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => strtoupper('La pensión de prueba1'),
        	'cif' => strtoupper('S6420524H'),
        	'web' => 'http://www.pensionprueba1.com/',
        	'description' => 'Pensión de pobre para los pobres.',
        	'logo' => '/enterprises/logo7.png',
        	'user_id' => $user_ids[33],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise8 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => strtoupper('La heladería de prueba2'),
        	'cif' => strtoupper('D81320566'),
        	'web' => 'http://www.heladosamontones.com/',
        	'description' => 'Todo tipo de helados ¡sólo en invierno!',
        	'logo' => '/enterprises/logo8.png',
           	'user_id' => $user_ids[34],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise9 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => strtoupper('El asador de prueba3'),
        	'cif' => strtoupper('J1260117E'),
        	'web' => 'https://www.elasador.es/',
        	'description' => 'Asamos todo tipo de carnes (oso, búfalo, spetec marca mercadona... ).',
        	'logo' => '/enterprises/logo9.png',
        	'user_id' => $user_ids[35],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

/*
 * <<<<<<------------------------------------------------>>>>>>
 * <<<<<<-INSERCION DE USUARIOS SIN VERIFICAR NI ACTIVAR->>>>>>
 * <<<<<<------------------------------------------------>>>>>>
 */

		$verifiedEmail = false;
        $active = false;
        $rol = 'admin';

        // Inserción del usuario Admin10 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba4@admin.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin11 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba5@admin.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin12 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba6@admin.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción de Admin10 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Prueba4 Admin'),
        	'lastName' => strtoupper('Cuatro sin verificar ni activar'),
        	'dni' => strtoupper('63721866K'),
        	'phone' => '666666688',
        	'image' => '/images/admin/admin10.png',
        	'user_id' => $user_ids[36],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin11 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Prueba5 Admin'),
        	'lastName' => strtoupper('Cinco sin verificar ni activar'),
        	'dni' => strtoupper('95373581X'),
        	'phone' => '666666689',
        	'image' => '/images/admin/admin11.png',
        	'user_id' => $user_ids[37],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin12 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Prueba6 Admin'),
        	'lastName' => strtoupper('Seis sin verificar ni activar'),
        	'dni' => strtoupper('73823872J'),
        	'phone' => '666666690',
        	'image' => '/images/admin/admin12.png',
        	'user_id' => $user_ids[38],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        $rol = 'teacher';

        // Inserción del usuario Teacher10 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba4@teacher.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher11 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba5@teacher.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher12 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba6@teacher.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción de Teacher10 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Prueba4 Teacher'),
        	'lastName' => strtoupper('Cuatro sin verificar ni activar'),
        	'dni' => strtoupper('41234333W'),
        	'phone' => '666666691',
        	'image' => '/images/teacher/teacher10.png',
        	'user_id' => $user_ids[39],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher11 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Prueba5 Teacher'),
        	'lastName' => strtoupper('Cinco sin verificar ni activar'),
        	'dni' => strtoupper('40779802C'),
        	'phone' => '666666692',
        	'image' => '/images/teacher/teacher11.png',
        	'user_id' => $user_ids[40],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher12 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => strtoupper('Prueba6 Teacher'),
        	'lastName' => strtoupper('Seis sin verificar ni activar'),
        	'dni' => strtoupper('21516193S'),
        	'phone' => '666666693',
        	'image' => '/images/teacher/teacher12.png',
        	'user_id' => $user_ids[41],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        $rol = 'student';

        // Inserción del usuario Student10 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba4@Student.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student11 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba5@Student.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student12 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba6@Student.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++; 

		// Inserción de Student10 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => strtoupper('Prueba4 Student'),
        	'lastName' => strtoupper('Cuatro sin verificar ni activar'),
        	'dni' => strtoupper('97020295Q'),
        	'nre' => '0123456',
        	'phone' => '666666694',
        	'road' => 'Senda',
        	'address' => 'Miguel Hernandez, 17 3ºF',
        	'curriculum' => '/curriculum/curriculim10.pdf',
        	'birthdate' => '1979-05-03',
        	'image' => '/images/student/student10.png',
        	'user_id' => $user_ids[42],
            'created_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student11 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => strtoupper('Prueba5 Student'),
        	'lastName' => strtoupper('Cinco sin verificar ni activar'),
        	'dni' => strtoupper('61342252X'),
        	'nre' => '0234567',
        	'phone' => '666666695',
        	'road' => 'Via',
        	'address' => 'Plaza Españolita, 10',
        	'curriculum' => '/curriculum/curriculum11.pdf',
        	'birthdate' => '1982-04-27',
        	'image' => '/images/student/student11.png',
        	'user_id' => $user_ids[43],
            'created_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student12 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => strtoupper('Prueba6 Student'),
        	'lastName' => strtoupper('Seis sin verificar ni activar'),
        	'dni' => strtoupper('49500203V'),
        	'nre' => '0345678',
        	'phone' => '666666696',
        	'road' => 'Travesia',
        	'address' => 'Condado de Rozas, 12 1ºC',
        	'curriculum' => '/curriculum/curriculum12.pdf',
        	'birthdate' => '1993-07-30',
        	'image' => '/images/student/student12.png',
        	'user_id' => $user_ids[44],
            'created_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        $rol = 'enterprise';

        // Inserción del usuario Enterprise10 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba4@enterprise.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise11 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba5@enterprise.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise12 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => strtoupper('Prueba6@enterprise.com'),
        	'pass' => \Hash::make($pass),
        	'code' => $code,
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++; 

		// Inserción de Enterprise10 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => strtoupper('La peluqueria de prueba4'),
        	'cif' => strtoupper('J3593030D'),
        	'web' => 'http://www.peluquerosdeprueba4.com/',
        	'description' => 'Cortamos el pelo a todo aquel que pague.',
        	'logo' => '/enterprises/logo10.png',
        	'user_id' => $user_ids[45],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise11 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => strtoupper('Clinica dental prueba5'),
        	'cif' => strtoupper('V1639094J'),
        	'web' => 'https://www.dientesprueba5.com/',
        	'description' => 'Clinica abierta desde 1703.',
        	'logo' => '/enterprises/logo11.png',
           	'user_id' => $user_ids[46],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise12 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => strtoupper('Panaderia de prueba6'),
        	'cif' => strtoupper('N2786048E'),
        	'web' => 'https://www.panespan.es/',
        	'description' => 'El pan nos sale muy rico, y lo sabes.',
        	'logo' => '/enterprises/logo12.png',
        	'user_id' => $user_ids[47],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

    } // run()
} // OurUsersSeeder
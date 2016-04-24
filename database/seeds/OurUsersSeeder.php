<?php

use Illuminate\Database\Seeder;
// Incluimos la librería faker
use Faker\Factory as Faker;

class OurUsersSeeder extends Seeder
{
    /**
     * Método que genera un código para las promociones
     * Por medidas de seguridad se admite que tengan "-"" y "_"
     * De forma que no sea simplemente alfanumerico
     * @return [type] [description]
     */
    public static function generarCodigo(){
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz-_1234567890" . date("Yhis");
        $cad = "";
        //                                        AÑO   HORA MIN  SEG
        // Montamos una cadena aleatoria con 63 + 0000 + 00 + 00 + 00
        // Total de caracteres 25 - aleatorios + el string bolsaempleo
        for($i=0;$i<15;$i++) {
            $cad .= mb_substr($str,rand(0,73),1) . date("Yhis") . "bolsaempleo";
        }
        return $cad;
    } // generarCodigo()

    /**
     * Este seeder incluye...
     * Seis usuarios de cada rol (admin, teacher, student y enterprise) completamente dados de alta.
     * Tres usuarios de cada rol sin haber sido confirmados como personas reales por sus respectivos.
     * Tres usuarios de cada rol sin verificar su email y sin haber sido confirmados como personas reales.
     * @return void
     */
    public function run()
    {
        // Creamos una instancia de Faker
        $faker = Faker::create('es_ES');

    	$user_ids = [];
    	$cont_user = 0;
        $code_generated = [];
        $registros = 50;

        // 50 redistros de usuarios
        for($i = 0; $i < $registros ;$i++){
            // Generamos un código aleatorio
            // y lo convertimos con MD5
            $code_generated[] = md5(OurUsersSeeder::generarCodigo());
        }

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

    	$rol = 'administrador';

        // Inserción del usuario Admin1
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('eduardo@admin.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin2
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('emmanuel@admin.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin3
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('pedro@admin.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin4
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('fernando@admin.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin5
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('abel@admin.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin6
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('carlos@admin.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
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

        $rol = 'profesor';

        // Inserción del usuario Teacher1
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('profesor1@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher2
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('profesor2@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher3
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('profesor3@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher4
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('fernando@teacher.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher5
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('abel@teacher.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher6
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('carlos@teacher.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
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
        	'firstName' => mb_strtolower('Eduardo Admin'),
        	'lastName' => mb_strtolower('López Pardo'),
        	'dni' => mb_strtoupper('26834560T'),
        	'phone' => '666666661',
        	'user_id' => $user_ids[0],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin2 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Emmanuel Admin'),
        	'lastName' => mb_strtolower('Valverde Ramos'),
        	'dni' => mb_strtoupper('80946137Y'),
        	'phone' => '666666662',
        	'user_id' => $user_ids[1],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin3 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Pedro Admin'),
        	'lastName' => mb_strtolower('Hernández-Mora de Fuentes'),
        	'dni' => mb_strtoupper('60735733R'),
        	'phone' => '666666663',
        	'user_id' => $user_ids[2],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin4 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Fernando Admin'),
        	'lastName' => mb_strtolower('Barcelona Pérez'),
        	'dni' => mb_strtoupper('94776325H'),
        	'phone' => '666666664',
        	'user_id' => $user_ids[3],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin5 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Abel Admin'),
        	'lastName' => mb_strtolower('Montejo Rodríguez'),
        	'dni' => mb_strtoupper('88779523Y'),
        	'phone' => '666666665',
        	'user_id' => $user_ids[4],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin6 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Carlos Admin'),
        	'lastName' => mb_strtolower('Abrisqueta'),
        	'dni' => mb_strtoupper('27015870R'),
        	'phone' => '666666666',
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
        	'firstName' => mb_strtolower('Eduardo Teacher'),
        	'lastName' => mb_strtolower('López Pardo'),
        	'dni' => mb_strtoupper('64283714W'),
        	'phone' => '666666667',
        	'user_id' => $user_ids[6],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher2 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Emmanuel Teacher'),
        	'lastName' => mb_strtolower('Valverde Ramos'),
        	'dni' => mb_strtoupper('84241523K'),
        	'phone' => '666666668',
        	'user_id' => $user_ids[7],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher3 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Pedro Teacher'),
        	'lastName' => mb_strtolower('Hernández-Mora de Fuentes'),
        	'dni' => mb_strtoupper('53943588D'),
        	'phone' => '666666669',
        	'user_id' => $user_ids[8],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher4 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Fernando Teacher'),
        	'lastName' => mb_strtolower('Barcelona Pérez'),
        	'dni' => mb_strtoupper('38017641K'),
        	'phone' => '666666670',
        	'user_id' => $user_ids[9],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher5 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Abel Teacher'),
        	'lastName' => mb_strtolower('Montejo Rodríguez'),
        	'dni' => mb_strtoupper('92215623K'),
        	'phone' => '666666671',
        	'user_id' => $user_ids[10],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher6 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Carlos Teacher'),
        	'lastName' => mb_strtolower('Abrisqueta'),
        	'dni' => mb_strtoupper('73682145N'),
        	'phone' => '666666672',
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

        $rol = 'estudiante';

        // Inserción del usuario Student1
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('alumno1@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student2
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('alumno2@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student3
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('alumno3@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student4
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('fernando@student.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student5
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('abel@student.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student6
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('carlos@student.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
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
        	'firstName' => mb_strtolower('Eduardo Student'),
        	'lastName' => mb_strtolower('López Pardo'),
        	'dni' => mb_strtoupper('13195649C'),
        	'nre' => '1234567',
        	'phone' => '666666673',
        	'road' => 'Alto',
        	'address' => 'Rio Ring, 3',
        	'curriculum' => '/storage/app/curriculums/eduardo-' . date('d-m-Y') . '/curriculum1-' . date('dmY') . '.pdf',
        	'birthdate' => '1995-11-09',
        	'user_id' => $user_ids[12],
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms'),
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student2 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => mb_strtolower('Emmanuel Student'),
        	'lastName' => mb_strtolower('Valverde Ramos'),
        	'dni' => mb_strtoupper('74053121K'),
        	'nre' => '2345678',
        	'phone' => '666666674',
        	'road' => 'Rambla',
        	'address' => 'Santa Maria, 1 1ºC Escalera sur',
        	'curriculum' => '/storage/app/curriculums/emmanuel-' . date('d-m-Y') . '/curriculum21-' . date('dmY') . '.pdf',
        	'birthdate' => '1992-06-09',
        	'user_id' => $user_ids[13],
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student3 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => mb_strtolower('Pedro Student'),
        	'lastName' => mb_strtolower('Hernández-Mora de Fuentes'),
        	'dni' => mb_strtoupper('85381923N'),
        	'nre' => '3456789',
        	'phone' => '666666675',
        	'road' => 'Camino',
        	'address' => 'Constitucion, 4 4ºA escalera norte',
        	'curriculum' => '/storage/app/curriculums/pedro-' . date('d-m-Y') . '/curriculum31-' . date('dmY') . '.pdf',
        	'birthdate' => '1992-04-17',
        	'user_id' => $user_ids[14],
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student4 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => mb_strtolower('Fernando Student'),
        	'lastName' => mb_strtolower('Barcelona Pérez'),
        	'dni' => mb_strtoupper('04084612L'),
        	'nre' => '4567890',
        	'phone' => '666666676',
        	'road' => 'Alameda',
        	'address' => 'Girona, 3 4ºC',
        	'curriculum' => '/storage/app/curriculums/fernando-' . date('d-m-Y') . '/curriculum41-' . date('dmY') . '.pdf',
        	'birthdate' => '1987-08-20',
        	'user_id' => $user_ids[15],
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student5 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => mb_strtolower('Abel Student'),
        	'lastName' => mb_strtolower('Montejo Rodríguez'),
        	'dni' => mb_strtoupper('05493598W'),
        	'nre' => '5678901',
        	'phone' => '666666677',
        	'road' => 'Bulevar',
        	'address' => 'Rio Pisuerga, 8 1ºB',
        	'curriculum' => '/storage/app/curriculums/abel-' . date('d-m-Y') . '/curriculum5-' . date('dmY') . '.pdf',
        	'birthdate' => '1984-11-17',
        	'user_id' => $user_ids[16],
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student6 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => mb_strtolower('Carlos Student'),
        	'lastName' => mb_strtolower('Abrisqueta'),
        	'dni' => mb_strtoupper('15915280Q'),
        	'nre' => '6789012',
        	'phone' => '666666678',
        	'road' => 'Plazuela',
        	'address' => 'Marques de rozalejo, 9',
        	'curriculum' => '/storage/app/curriculums/carlos-' . date('d-m-Y') . '/curriculum6-' . date('dmY') . '.pdf',
        	'birthdate' => '1990-01-06',
        	'user_id' => $user_ids[17],
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

/*
 * <<<<<<------------------------------------------------>>>>>>
 * <<<<<<----------INSERCION DE USUARIOS EMPRESA--------->>>>>>
 * <<<<<<------------------------------------------------>>>>>>
 */

        $rol = 'empresa';

        // Inserción del usuario Enterprise1
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('empresa1@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise2
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('empresa2@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise3
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('empresa3@iescierva.net'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise4
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('fernando@enterprise.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise5
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('abel@enterprise.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise6
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('carlos@enterprise.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
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
        	'name' => mb_strtolower('La taberna de Eduardo'),
        	'cif' => mb_strtoupper('N9210188J'),
        	'web' => 'https://www.latabernadeeduardo.es/',
        	'description' => 'La mejor taberna si no tenemos en cuenta a las demás.',
        	'user_id' => $user_ids[18],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise2 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => mb_strtolower('El mesón de Emmanuel'),
        	'cif' => mb_strtoupper('P8426294H'),
        	'web' => 'http://www.elmesondemanu.es/',
        	'description' => 'Ven corriendo o ven andando, pero ven.',
           	'user_id' => $user_ids[19],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise3 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => mb_strtolower('La optica de Pedro'),
        	'cif' => mb_strtoupper('V9683948E'),
        	'web' => 'https://www.laopticadepedro.es/',
        	'description' => 'No vendemos gafas graduadas, sólo gafas de postureo.',
        	'user_id' => $user_ids[20],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise4 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => mb_strtolower('La ferretería de Fernando'),
        	'cif' => mb_strtoupper('P9516378H'),
        	'web' => 'https://www.ferferreteros.com/',
        	'description' => 'Nunca me sobran tuercas ni se me cae un solo tornillo.',
        	'user_id' => $user_ids[21],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise5 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => mb_strtolower('El hotel de Abel'),
        	'cif' => mb_strtoupper('Q9693683F'),
        	'web' => 'https://www.elhoteldeabel.es/',
        	'description' => 'Hoteles de lujo a precio de pensión, vendrás solo por diversión.',
        	'user_id' => $user_ids[22],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise6 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => mb_strtolower('La floristería de Carlos'),
        	'cif' => mb_strtoupper('U5279210H'),
        	'web' => 'https://www.laflordecarlos.es/',
        	'description' => 'Vendemos flores de todos los colores.',
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
        $rol = 'administrador';

        // Inserción del usuario Admin7 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('Prueba1@admin.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin8 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('Prueba2@admin.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin9 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('Prueba3@admin.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción de Admin7 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Prueba1 Admin'),
        	'lastName' => mb_strtolower('Uno sin activar'),
        	'dni' => mb_strtoupper('82562226T'),
        	'phone' => '666666679',
        	'user_id' => $user_ids[24],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin8 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Prueba2 Admin'),
        	'lastName' => mb_strtolower('Dos sin activar'),
        	'dni' => mb_strtoupper('98962211L'),
        	'phone' => '666666680',
        	'user_id' => $user_ids[25],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin9 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Prueba3 Admin'),
        	'lastName' => mb_strtolower('Tres sin activar'),
        	'dni' => mb_strtoupper('68999560C'),
        	'phone' => '666666681',
        	'user_id' => $user_ids[26],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        $rol = 'profesor';

        // Inserción del usuario Teacher7 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('Prueba1@teacher.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher8 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('Prueba2@teacher.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher9 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('Prueba3@teacher.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción de Teacher7 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Prueba1 Teacher'),
        	'lastName' => mb_strtolower('Uno sin activar'),
        	'dni' => mb_strtoupper('63163636R'),
        	'phone' => '666666682',
        	'user_id' => $user_ids[27],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher8 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Prueba2 Teacher'),
        	'lastName' => mb_strtolower('Dos sin activar'),
        	'dni' => mb_strtoupper('54529857P'),
        	'phone' => '666666683',
        	'user_id' => $user_ids[28],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher9 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Prueba3 Teacher'),
        	'lastName' => mb_strtolower('Tres sin activar'),
        	'dni' => mb_strtoupper('19927079V'),
        	'phone' => '666666684',
        	'user_id' => $user_ids[29],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        $rol = 'estudiante';

        // Inserción del usuario Student7 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('Prueba1@Student.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student8 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('Prueba2@Student.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student9 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('Prueba3@Student.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

		// Inserción de Student7 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => mb_strtolower('Prueba1 Student'),
        	'lastName' => mb_strtolower('Uno sin activar'),
        	'dni' => mb_strtoupper('68815938F'),
        	'nre' => '7890123',
        	'phone' => '666666685',
        	'road' => 'Pasaje',
        	'address' => 'Mariano Sanz, S/N 3ºB',
        	'curriculum' => '/storage/app/curriculums/prueba1-' . date('d-m-Y') . '/curriculum7-' . date('dmY') . '.pdf',
        	'birthdate' => '1974-07-19',
        	'user_id' => $user_ids[30],
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student8 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => mb_strtolower('Prueba2 Student'),
        	'lastName' => mb_strtolower('Dos sin activar'),
        	'dni' => mb_strtoupper('02460255Z'),
        	'nre' => '8901234',
        	'phone' => '666666686',
        	'road' => 'Pista',
        	'address' => 'Don Federico Trujillo, 125 10ºD',
        	'curriculum' => '/storage/app/curriculums/prueba2-' . date('d-m-Y') . '/curriculum81-' . date('dmY') . '.pdf',
        	'birthdate' => '1966-11-17',
        	'user_id' => $user_ids[31],
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student9 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => mb_strtolower('Prueba3 Student'),
        	'lastName' => mb_strtolower('Tres sin activar'),
        	'dni' => mb_strtoupper('98554069N'),
        	'nre' => '9012345',
        	'phone' => '666666687',
        	'road' => 'Paseo',
        	'address' => 'Mi casa de campo, 16',
        	'curriculum' => '/storage/app/curriculums/prueba3-' . date('d-m-Y') . '/curriculum91-' . date('dmY') . '.pdf',
        	'birthdate' => '1978-08-10',
        	'user_id' => $user_ids[32],
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        $rol = 'empresa';

        // Inserción del usuario Enterprise7 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('Prueba1@enterprise.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise8 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('Prueba2@enterprise.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise9 (Pendiente de activacion)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('Prueba3@enterprise.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

		// Inserción de Enterprise7 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => mb_strtolower('La pensión de prueba1'),
        	'cif' => mb_strtoupper('S6420524H'),
        	'web' => 'http://www.pensionprueba1.com/',
        	'description' => 'Pensión de pobre para los pobres.',
        	'user_id' => $user_ids[33],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise8 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => mb_strtolower('La heladería de prueba2'),
        	'cif' => mb_strtoupper('D81320566'),
        	'web' => 'http://www.heladosamontones.com/',
        	'description' => 'Todo tipo de helados ¡sólo en invierno!',
           	'user_id' => $user_ids[34],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise9 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => mb_strtolower('El asador de prueba3'),
        	'cif' => mb_strtoupper('J1260117E'),
        	'web' => 'https://www.elasador.es/',
        	'description' => 'Asamos todo tipo de carnes (oso, búfalo, spetec marca mercadona... ).',
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
        $rol = 'administrador';

        // Inserción del usuario Admin10 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('iescierva_daw37@hotmail.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin11 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('iescierva_daw38@hotmail.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Admin12 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('iescierva_daw39@hotmail.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción de Admin10 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Prueba4 Admin'),
        	'lastName' => mb_strtolower('Cuatro sin verificar ni activar'),
        	'dni' => mb_strtoupper('63721866K'),
        	'phone' => '666666688',
        	'user_id' => $user_ids[36],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin11 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Prueba5 Admin'),
        	'lastName' => mb_strtolower('Cinco sin verificar ni activar'),
        	'dni' => mb_strtoupper('95373581X'),
        	'phone' => '666666689',
        	'user_id' => $user_ids[37],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Admin12 (admin)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Prueba6 Admin'),
        	'lastName' => mb_strtolower('Seis sin verificar ni activar'),
        	'dni' => mb_strtoupper('73823872J'),
        	'phone' => '666666690',
        	'user_id' => $user_ids[38],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        $rol = 'profesor';

        // Inserción del usuario Teacher10 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('iescierva_daw40@hotmail.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher11 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('iescierva_daw41@hotmail.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Teacher12 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('iescierva_daw42@hotmail.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción de Teacher10 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Prueba4 Teacher'),
        	'lastName' => mb_strtolower('Cuatro sin verificar ni activar'),
        	'dni' => mb_strtoupper('41234333W'),
        	'phone' => '666666691',
        	'user_id' => $user_ids[39],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher11 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Prueba5 Teacher'),
        	'lastName' => mb_strtolower('Cinco sin verificar ni activar'),
        	'dni' => mb_strtoupper('40779802C'),
        	'phone' => '666666692',
        	'user_id' => $user_ids[40],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        // Inserción de Teacher12 (teacher)
        $teacher_id = \DB::table('teachers')->insertGetId([
        	'firstName' => mb_strtolower('Prueba6 Teacher'),
        	'lastName' => mb_strtolower('Seis sin verificar ni activar'),
        	'dni' => mb_strtoupper('21516193S'),
        	'phone' => '666666693',
        	'user_id' => $user_ids[41],
            'created_at' => date('YmdHms')
        ]);
        $teacher_ids[$cont_teacher] = $teacher_id;
        $cont_teacher++;

        $rol = 'estudiante';

        // Inserción del usuario Student10 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('iescierva_daw43@hotmail.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student11 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('iescierva_daw44@hotmail.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Student12 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('iescierva_daw45@hotmail.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

		// Inserción de Student10 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => mb_strtolower('Prueba4 Student'),
        	'lastName' => mb_strtolower('Cuatro sin verificar ni activar'),
        	'dni' => mb_strtoupper('97020295Q'),
        	'nre' => '0123456',
        	'phone' => '666666694',
        	'road' => 'Senda',
        	'address' => 'Miguel Hernandez, 17 3ºF',
        	'curriculum' => '/storage/app/curriculums/iescierva_daw43-' . date('d-m-Y') . '/curriculum10-' . date('dmY') . '.pdf',
        	'birthdate' => '1979-05-03',
        	'user_id' => $user_ids[42],
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student11 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => mb_strtolower('Prueba5 Student'),
        	'lastName' => mb_strtolower('Cinco sin verificar ni activar'),
        	'dni' => mb_strtoupper('61342252X'),
        	'nre' => '0234567',
        	'phone' => '666666695',
        	'road' => 'Via',
        	'address' => 'Plaza Españolita, 10',
        	'curriculum' => '/storage/app/curriculums/iescierva_daw44-' . date('d-m-Y') . '/curriculum11-' . date('dmY') . '.pdf',
        	'birthdate' => '1982-04-27',
        	'user_id' => $user_ids[43],
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        // Inserción de Student12 (student)
        $student_id = \DB::table('students')->insertGetId([
        	'firstName' => mb_strtolower('Prueba6 Student'),
        	'lastName' => mb_strtolower('Seis sin verificar ni activar'),
        	'dni' => mb_strtoupper('49500203V'),
        	'nre' => '0345678',
        	'phone' => '666666696',
        	'road' => 'Travesia',
        	'address' => 'Condado de Rozas, 12 1ºC',
        	'curriculum' => '/storage/app/curriculums/iescierva_daw45-' . date('d-m-Y') . '/curriculum12-' . date('dmY') . '.pdf',
        	'birthdate' => '1993-07-30',
        	'user_id' => $user_ids[44],
            'created_at' => date('YmdHms'),
            'updated_at' => date('YmdHms')
        ]);
        $student_ids[$cont_student] = $student_id;
        $cont_student++;

        $rol = 'empresa';

        // Inserción del usuario Enterprise10 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('iescierva_daw46@hotmail.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise11 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('iescierva_daw47@hotmail.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

        // Inserción del usuario Enterprise12 (Pendiente de validación de email y activación)
        $user_id = \DB::table('users')->insertGetId([
        	'email' => mb_strtolower('iescierva_daw48@hotmail.com'),
        	'password' => \Hash::make($pass),
        	'code' => $code_generated[$cont_user],
        	'verifiedEmail' => $verifiedEmail,
        	'rol' => $rol,
            'image' => $faker->randomElement(['default_1.png', 'default_2.png', 'default_3.png', 'default_4.png', 'default_5.png', 'default_6.png', 'default_7.png', 'default_8.png', 'default_9.png', 'default_10.png', 'default_11.png']),
            'carpeta' => $code_generated[$cont_user],
        	'active' => $active,
            'created_at' => date('YmdHms')
        ]);
        $user_ids[$cont_user] = $user_id;
        $cont_user++;

		// Inserción de Enterprise10 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => mb_strtolower('La peluqueria de prueba4'),
        	'cif' => mb_strtoupper('J3593030D'),
        	'web' => 'http://www.peluquerosdeprueba4.com/',
        	'description' => 'Cortamos el pelo a todo aquel que pague.',
        	'user_id' => $user_ids[45],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise11 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => mb_strtolower('Clinica dental prueba5'),
        	'cif' => mb_strtoupper('V1639094J'),
        	'web' => 'https://www.dientesprueba5.com/',
        	'description' => 'Clinica abierta desde 1703.',
           	'user_id' => $user_ids[46],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

        // Inserción de Enterprise12 (enterprise)
        $enterprise_id = \DB::table('enterprises')->insertGetId([
        	'name' => mb_strtolower('Panaderia de prueba6'),
        	'cif' => mb_strtoupper('N2786048E'),
        	'web' => 'https://www.panespan.es/',
        	'description' => 'El pan nos sale muy rico, y lo sabes.',
        	'user_id' => $user_ids[47],
            'created_at' => date('YmdHms')
        ]);
        $enterprise_ids[$cont_enterprise] = $enterprise_id;
        $cont_enterprise++;

    } // run()
} // OurUsersSeeder

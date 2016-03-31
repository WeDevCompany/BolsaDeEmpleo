<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	/***************************************
    				Tags de informática
    	***************************************/
        $Instalacion_y_mantenimiento_de_servicios_de_redes_locales = [
            mb_strtoupper('redes locales'),
            mb_strtoupper('hub'),
            mb_strtoupper('switch'),
            mb_strtoupper('cisco'),
            mb_strtoupper('IEEE 802.1'),
            mb_strtoupper('IEEE 802.11'),
            mb_strtoupper('IEEE 803'),
            mb_strtoupper('FTP'),
            mb_strtoupper('DNS'),
            mb_strtoupper('SAMBA'),
            mb_strtoupper('LDAP'),
            mb_strtoupper('SSH'),
            mb_strtoupper('subnetting'),
            mb_strtoupper('Servicios de red')
        ];

        $Instalacion_y_mantenimiento_de_equipos_y_sistemas_informáticos = [
            mb_strtoupper('Hardware'),
            mb_strtoupper('Arquitectura de computadoras'),
            mb_strtoupper('montaje y mantenimiento de equipos')
        ];

        $Implantacion_y_mantenimiento_de_aplicaciones_ofimaticas_y_corporativas = [
            mb_strtoupper('Office'),
            mb_strtoupper('Libre Office'),
            mb_strtoupper('Ofimática'),
            mb_strtoupper('Access'),
            mb_strtoupper('Base'),
            mb_strtoupper('Calc'),
            mb_strtoupper('Excel'),
            mb_strtoupper('Word'),
            mb_strtoupper('Writter'),
            mb_strtoupper('GIMP'),
            mb_strtoupper('Licencias')
        ];

        $Operaciones_con_bases_de_datos_ofimáticas_y_corporativas = [
            mb_strtoupper('Access'),
            mb_strtoupper('Base'),
            mb_strtoupper('SQL'),
            mb_strtoupper('SQL92'),
            mb_strtoupper('Entidad relación')
        ];
        
        $Instalacion_y_mantenimiento_de_servicios_de_Internet = [
            mb_strtoupper('VPN'),
            mb_strtoupper('SSH'),
            mb_strtoupper('FTP'),
            mb_strtoupper('DNS')
        ];

        $Mantenimiento_de_portales_de_informacion = [
            mb_strtoupper('HTML'),
            mb_strtoupper('CSS'),
            mb_strtoupper('CMS')
        ];

        $Administracion_gestion_y_comercializacion_en_la_pequenya_empresa = [
            mb_strtoupper('Servidores'),
            mb_strtoupper('Derectorio activo'),
            mb_strtoupper('LDAP'),
            mb_strtoupper('Arquitectura de redes')
        ];

        $Sistemas_operativos_en_entornos_monousuarios_y_multiusuarios = [
            mb_strtoupper('Linux'),
            mb_strtoupper('Unix'),
            mb_strtoupper('Windows'),
            mb_strtoupper('Sistemas operativos')
        ];

        $Relaciones_en_el_equipo_de_trabajo = [
            mb_strtoupper('Trabajo en equipo'),
            mb_strtoupper('Liderazgo')
        ];

        $Formacion_y_orientacion_laboral = [
            mb_strtoupper('legislación laboral'),
            mb_strtoupper('derechos'),
            mb_strtoupper('obligaciones'),
            mb_strtoupper('funcionamiento de una empresa'),
            mb_strtoupper('técnicas de búsqueda de empleo')
        ];

        $Montaje_y_mantenimiento_de_equipo  = [
            mb_strtoupper('Hardware'),
            mb_strtoupper('Arquitectura de computadoras'),
            mb_strtoupper('montaje y mantenimiento de equipos'),
            mb_strtoupper('Boot'),
            mb_strtoupper('Núcleo o kernel'),
            mb_strtoupper('unidad central de procesamiento'),
            mb_strtoupper('procesador'),
            mb_strtoupper('software'),
            mb_strtoupper('firmware'),
            mb_strtoupper('driver'),
            mb_strtoupper('jerarquías de la memoria')
        ];

        $Sistemas_operativos_monopuesto  = [
            mb_strtoupper('Linux'),
            mb_strtoupper('Unix'),
            mb_strtoupper('Mac OX'),
            mb_strtoupper('Sistemas operativos'),
            mb_strtoupper('Comandos de Linux'),
            mb_strtoupper('Scripts'),
            mb_strtoupper('bash'),
            mb_strtoupper('batch'),
            mb_strtoupper('automatización de tareas'),
            mb_strtoupper('copias de seguridad'),
            mb_strtoupper('recuperación de sistemas operativos')
        ];

        $Aplicaciones_ofimaticas  = [
            mb_strtoupper('Office'),
            mb_strtoupper('Libre Office'),
            mb_strtoupper('Ofimática'),
            mb_strtoupper('Access'),
            mb_strtoupper('Base'),
            mb_strtoupper('Calc'),
            mb_strtoupper('Excel'),
            mb_strtoupper('Word'),
            mb_strtoupper('Writter'),
            mb_strtoupper('GIMP'),
            mb_strtoupper('Licencias'),
            mb_strtoupper('SQL'),
            mb_strtoupper('tipos de licencias')
        ];

        $Sistemas_operativos_en_red = [
            mb_strtoupper('Linux'),
            mb_strtoupper('DNS'),
            mb_strtoupper('Directorio activo'),
            mb_strtoupper('LDAP'),
            mb_strtoupper('Windows Server'),
            mb_strtoupper('Linux Server'),
            mb_strtoupper('SAMBA'),
            mb_strtoupper('LDAP'),
            mb_strtoupper('Arquitecturas de árbol'),
            mb_strtoupper('privilegios'),
            mb_strtoupper('permisos'),
            mb_strtoupper('seguridad'),
            mb_strtoupper('centralización')
        ];

        $Redes_locales = [
            mb_strtoupper('redes locales'),
            mb_strtoupper('hub'),
            mb_strtoupper('switch'),
            mb_strtoupper('cisco'),
            mb_strtoupper('IEEE 802.1'),
            mb_strtoupper('IEEE 802.11'),
            mb_strtoupper('IEEE 803'),
            mb_strtoupper('subnetting'),
            mb_strtoupper('topologías de red'),
            mb_strtoupper('topología de redes en anillo'),
            mb_strtoupper('topología de redes en bus'),
            mb_strtoupper('topología de redes en malla'),
            mb_strtoupper('topología de redes en árbol'),
            mb_strtoupper('topología de redes en doble anillo'),
            mb_strtoupper('cableado estructurado'),
            mb_strtoupper('NAT'),
            mb_strtoupper('IPTABLES'),
            mb_strtoupper('Ad-hoc'),
            mb_strtoupper('CSMA/CA'),
            mb_strtoupper('DDNS'),
            mb_strtoupper('Conmutador'),
            mb_strtoupper('DHCP'),
            mb_strtoupper('DMZ'),
            mb_strtoupper('Dúplex competo'),
            mb_strtoupper('Dúplex medio'),
            mb_strtoupper('EAP'),
            mb_strtoupper('Enrutador'),
            mb_strtoupper('router'),
            mb_strtoupper('Enrutamiento estático'),
            mb_strtoupper('Enrutamiento estático'),
            mb_strtoupper('Ethernet'),
            mb_strtoupper('Firmware'),
            mb_strtoupper('Dirección IP estática'),
            mb_strtoupper('Dirección IP dinámica'),
            mb_strtoupper('HTTP'),
            mb_strtoupper('ISIP'),
            mb_strtoupper('LAN'),
            mb_strtoupper('LEAP'),
            mb_strtoupper('MAC'),
            mb_strtoupper('Mbps'),
            mb_strtoupper('Modo infraestructura'),
            mb_strtoupper('PEAP'),
            mb_strtoupper('TCP/IP'),
            mb_strtoupper('Pila TCP/IP'),
            mb_strtoupper('Modelo OSI'),
            mb_strtoupper('PoE'),
            mb_strtoupper('ARP'),
            mb_strtoupper('Tipos de antenas'),
            mb_strtoupper('Conexión punto a punto'),
            mb_strtoupper('Conexión punto a punto'),
            mb_strtoupper('RJ-45'),
            mb_strtoupper('TKIP'),
            mb_strtoupper('AES'),
            mb_strtoupper('WAN'),
            mb_strtoupper('WPA'),
            mb_strtoupper('WPA-2'),
            mb_strtoupper('WPA-Enterprise'),
            mb_strtoupper('WPA-2 Empresarial'),
            mb_strtoupper('UDP'),
            mb_strtoupper('Protocolos orientados a la conexión'),
            mb_strtoupper('Protocolos no orientados a la conexión'),
            mb_strtoupper('Punto de acceso'),
            mb_strtoupper('RADIUS'),
            mb_strtoupper('Puerta de enlace'),
        ];

        $Seguridad_informatica = [
            mb_strtoupper('Amenaza'),
            mb_strtoupper('Copia de seguridad'),
            mb_strtoupper('Sistemas de copias de seguridad'),
            mb_strtoupper('Peritaje informático'),
            mb_strtoupper('Seguridad informática'),
            mb_strtoupper('Ataque informático'),
            mb_strtoupper('seguridad pasiva'),
            mb_strtoupper('seguridad activa'),
            mb_strtoupper('Arquitecturas de árbol'),
            mb_strtoupper('Autenticación'),
            mb_strtoupper('Confidencialidad'),
            mb_strtoupper('LOPD'),
            mb_strtoupper('Disponivilidad'),
            mb_strtoupper('Gestión de Riesgo'),
            mb_strtoupper('Integridad'),
            mb_strtoupper('Vulnerabilidad'),
            mb_strtoupper('0-day'),
            mb_strtoupper('backtrack'),
            mb_strtoupper('kali-linux'),
            mb_strtoupper('distros de penetración de sistemas'),
            mb_strtoupper('Adware'),
            mb_strtoupper('Amenazas polimorfas'),
            mb_strtoupper('Antispam'),
            mb_strtoupper('Aplicaciones engañosas'),
            mb_strtoupper('Ataques multi-etapas'),
            mb_strtoupper('Ataques Web'),
            mb_strtoupper('Blacklisting'),
            mb_strtoupper('Lista Negra'),
            mb_strtoupper('Bot'),
            mb_strtoupper('Botnet'),
            mb_strtoupper('Caballo de Troya'),
            mb_strtoupper('Troyano'),
            mb_strtoupper('Canal de control'),
            mb_strtoupper('Carga destructiva'),
            mb_strtoupper('Crimeware'),
            mb_strtoupper('Ciberdelito'),
            mb_strtoupper('Encriptación'),
            mb_strtoupper('Cifrado'),
            mb_strtoupper('Comunicaciones seguras'),
            mb_strtoupper('Exploits'),
            mb_strtoupper('Metasploit'),
            mb_strtoupper('Ingeniería social'),
            mb_strtoupper('Ingeniería inversa'),
            mb_strtoupper('Filtración de datos'),
            mb_strtoupper('Firewall'),
            mb_strtoupper('Firma antivirus'),
            mb_strtoupper('Virus indetectable'),
            mb_strtoupper('Greylisting'),
            mb_strtoupper('Lista Gris'),
            mb_strtoupper('Gusanos'),
            mb_strtoupper('Lista blanca'),
            mb_strtoupper('Whitelisting'),
            mb_strtoupper('Keystroke Logger'),
            mb_strtoupper('Keylogger'),
            mb_strtoupper('Malware'),
            mb_strtoupper('Mecanismo de propagación'),
            mb_strtoupper('virus polimorfico'),
            mb_strtoupper('DoS'),
            mb_strtoupper('Ddos'),
            mb_strtoupper('Denegación de servicio'),
            mb_strtoupper('Denegación de servicio distribuido'),
            mb_strtoupper('Pharming'),
            mb_strtoupper('Phishing'),
            mb_strtoupper('Protección heurística'),
            mb_strtoupper('P2P'),
            mb_strtoupper('Rootkits'),
            mb_strtoupper('Seguridad basada en la reputación'),
            mb_strtoupper('Sistema de detección de intrusos'),
            mb_strtoupper('Sistema de prevención de intrusos'),
            mb_strtoupper('Software de seguridad fraudulento'),
            mb_strtoupper('Spam'),
            mb_strtoupper('Spyware'),
            mb_strtoupper('Toolkit'),
            mb_strtoupper('Virus más propagado')
        ];

        $Fundamentos_de_programacion  = [
            mb_strtoupper('Java'),
            mb_strtoupper('C#'),
            mb_strtoupper('C'),
            mb_strtoupper('Programación estructurada'),
            mb_strtoupper('Programación modular'),
            mb_strtoupper('Programación orientada a objetos'),
            mb_strtoupper('Abstracción'),
            mb_strtoupper('Instanciar'),
            mb_strtoupper('Objeto'),
            mb_strtoupper('Clase padre'),
            mb_strtoupper('Subclase:'),
            mb_strtoupper('Acoplamiento'),
            mb_strtoupper('Agregación'),
            mb_strtoupper('Algoritmo'),
            mb_strtoupper('Ámbito de clase'),
            mb_strtoupper('Análisis'),
            mb_strtoupper('Optimización de código'),
            mb_strtoupper('Desarrollo de aplicaciones'),
            mb_strtoupper('Programación'),
            mb_strtoupper('Array'),
            mb_strtoupper('ArrayList'),
            mb_strtoupper('Pilas'),
            mb_strtoupper('Listas enlazadas'),
            mb_strtoupper('Listas doblemente enlazadas'),
            mb_strtoupper('Javadoc'),
            mb_strtoupper('Documentación'),
            mb_strtoupper('Eclipse'),
            mb_strtoupper('Git'),
            mb_strtoupper('entorno de desarrollo'),
            mb_strtoupper('UML'),
            mb_strtoupper('Desarrollo de software'),
            mb_strtoupper('lenguajes compilados'),
            mb_strtoupper('lenguajes interpretados'),
            mb_strtoupper('Constantes'),
            mb_strtoupper('Variables'),
            mb_strtoupper('JUnit'),
            mb_strtoupper('Excepciones'),
            mb_strtoupper('Expresiones regulares'),
            mb_strtoupper('Regex'),
            mb_strtoupper('JDK'),
            mb_strtoupper('JRE'),
            mb_strtoupper('encapsulación'),
            mb_strtoupper('Herencia'),
            mb_strtoupper('Polimorfismo'),
            mb_strtoupper('Persistencia'),
            mb_strtoupper('GUI')
        ];

        $Desarrollo_web_en_entorno_servidor   = [
            mb_strtoupper('PHP'),
            mb_strtoupper('ASP'),
            mb_strtoupper('JSP'),
            mb_strtoupper('Programación estructurada'),
            mb_strtoupper('Programación modular'),
            mb_strtoupper('Programación orientada a objetos'),
            mb_strtoupper('Abstracción'),
            mb_strtoupper('Instanciar'),
            mb_strtoupper('Objeto'),
            mb_strtoupper('Clase padre'),
            mb_strtoupper('Subclase:'),
            mb_strtoupper('Acoplamiento'),
            mb_strtoupper('Agregación'),
            mb_strtoupper('Algoritmo'),
            mb_strtoupper('Ámbito de clase'),
            mb_strtoupper('Análisis'),
            mb_strtoupper('Optimización de código'),
            mb_strtoupper('Desarrollo de aplicaciones'),
            mb_strtoupper('Programación'),
            mb_strtoupper('Array'),
            mb_strtoupper('Arrays asociativos'),
            mb_strtoupper('Pilas'),
            mb_strtoupper('Vagrant'),
            mb_strtoupper('PDO'),
            mb_strtoupper('Documentación'),
            mb_strtoupper('PHPStorm'),
            mb_strtoupper('Git'),
            mb_strtoupper('entorno de desarrollo'),
            mb_strtoupper('UML'),
            mb_strtoupper('Desarrollo de software'),
            mb_strtoupper('Sublime Text'),
            mb_strtoupper('lenguajes interpretados'),
            mb_strtoupper('Constantes'),
            mb_strtoupper('Variables'),
            mb_strtoupper('Excepciones'),
            mb_strtoupper('Expresiones regulares'),
            mb_strtoupper('Regex'),
            mb_strtoupper('encapsulación'),
            mb_strtoupper('Herencia'),
            mb_strtoupper('Polimorfismo'),
            mb_strtoupper('Persistencia'),
            mb_strtoupper('GUI'),
            mb_strtoupper('Aplicaciones modulares'),
            mb_strtoupper('Aplicaciones escalables'),
            mb_strtoupper('Framework'),
            mb_strtoupper('Laravel'),
            mb_strtoupper('Synfony'),
            mb_strtoupper('Base de datos'),
            mb_strtoupper('desarrollo de buscadores'),
            mb_strtoupper('Operaciones CRUD'),
        ];

        $arrayArrays = [
            1 => $Instalacion_y_mantenimiento_de_servicios_de_redes_locales,
            2 => $Instalacion_y_mantenimiento_de_equipos_y_sistemas_informáticos,
            3 => $Implantacion_y_mantenimiento_de_aplicaciones_ofimaticas_y_corporativas,
            4 => $Operaciones_con_bases_de_datos_ofimáticas_y_corporativas,
            5 => $Instalacion_y_mantenimiento_de_servicios_de_Internet,
            6 => $Mantenimiento_de_portales_de_informacion,
            7 => $Administracion_gestion_y_comercializacion_en_la_pequenya_empresa,
            8 => $Sistemas_operativos_en_entornos_monousuarios_y_multiusuarios,
            9 => $Relaciones_en_el_equipo_de_trabajo,
            10 => $Formacion_y_orientacion_laboral,
            11 => $Montaje_y_mantenimiento_de_equipo,
            12 => $Sistemas_operativos_monopuesto,
            13 => $Aplicaciones_ofimaticas,
            14 => $Sistemas_operativos_en_red,
            15 => $Redes_locales,
            16 => $Seguridad_informatica,
            24 => $Fundamentos_de_programacion,
            68 => $Desarrollo_web_en_entorno_servidor
        ];

        foreach($arrayArrays as $cycleSubject_id => $arrayTags){
            if ($cycleSubject_id == 1){
                for($i = 0; $i < count($arrayTags); $i++){ // El primer array debe insertarme todos los tags que contenga
                    $idTag = \DB::table('tags')->insertGetId([ // Primero en tags
                        'tag' => $arrayTags[$i],
                        'created_at' => date('YmdHms')
                    ]);

                    \DB::table('cycleSubjectTags')->insert([ // Luego en cycleSubjectTags
                        'cycleSubject_id' => $cycleSubject_id,
                        'tag_id' => $idTag,
                        'created_at' => date('YmdHms')
                    ]);

                    $inserted[$idTag] = $arrayTags[$i];
                }
            } else {
                for($j = 0; $j < count($arrayTags); $j++){
                    foreach($inserted as $idTag => $nombre){
                        if($nombre == $arrayTags[$j]){
                            \DB::table('cycleSubjectTags')->insert([
                                'cycleSubject_id' => $cycleSubject_id,
                                'tag_id' => $idTag,
                                'created_at' => date('YmdHms')
                            ]);
                            $found = true;
                            break;
                        } else {
                            $found = false;
                        }
                    }
                    if($found === false){
                        $idTag = \DB::table('tags')->insertGetId([
                            'tag' => $arrayTags[$j],
                            'created_at' => date('YmdHms')
                        ]);

                        \DB::table('cycleSubjectTags')->insert([
                            'cycleSubject_id' => $cycleSubject_id,
                            'tag_id' => $idTag,
                            'created_at' => date('YmdHms')
                        ]);

                        $inserted[$idTag] = $arrayTags[$j];
                    }
                }
            }
        }
    }
}

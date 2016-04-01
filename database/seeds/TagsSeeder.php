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
            mb_strtolower('redes locales'),
            mb_strtolower('hub'),
            mb_strtolower('switch'),
            mb_strtolower('cisco'),
            mb_strtolower('IEEE 802.1'),
            mb_strtolower('IEEE 802.11'),
            mb_strtolower('IEEE 803'),
            mb_strtolower('FTP'),
            mb_strtolower('DNS'),
            mb_strtolower('SAMBA'),
            mb_strtolower('LDAP'),
            mb_strtolower('SSH'),
            mb_strtolower('subnetting'),
            mb_strtolower('Servicios de red')
        ];

        $Instalacion_y_mantenimiento_de_equipos_y_sistemas_informáticos = [
            mb_strtolower('Hardware'),
            mb_strtolower('Arquitectura de computadoras'),
            mb_strtolower('montaje y mantenimiento de equipos')
        ];

        $Implantacion_y_mantenimiento_de_aplicaciones_ofimaticas_y_corporativas = [
            mb_strtolower('Office'),
            mb_strtolower('Libre Office'),
            mb_strtolower('Ofimática'),
            mb_strtolower('Access'),
            mb_strtolower('Base'),
            mb_strtolower('Calc'),
            mb_strtolower('Excel'),
            mb_strtolower('Word'),
            mb_strtolower('Writter'),
            mb_strtolower('GIMP'),
            mb_strtolower('Licencias')
        ];

        $Operaciones_con_bases_de_datos_ofimáticas_y_corporativas = [
            mb_strtolower('Access'),
            mb_strtolower('Base'),
            mb_strtolower('SQL'),
            mb_strtolower('SQL92'),
            mb_strtolower('Entidad relación')
        ];
        
        $Instalacion_y_mantenimiento_de_servicios_de_Internet = [
            mb_strtolower('VPN'),
            mb_strtolower('SSH'),
            mb_strtolower('FTP'),
            mb_strtolower('DNS')
        ];

        $Mantenimiento_de_portales_de_informacion = [
            mb_strtolower('HTML'),
            mb_strtolower('CSS'),
            mb_strtolower('CMS')
        ];

        $Administracion_gestion_y_comercializacion_en_la_pequenya_empresa = [
            mb_strtolower('Servidores'),
            mb_strtolower('Derectorio activo'),
            mb_strtolower('LDAP'),
            mb_strtolower('Arquitectura de redes')
        ];

        $Sistemas_operativos_en_entornos_monousuarios_y_multiusuarios = [
            mb_strtolower('Linux'),
            mb_strtolower('Unix'),
            mb_strtolower('Windows'),
            mb_strtolower('Sistemas operativos')
        ];

        $Relaciones_en_el_equipo_de_trabajo = [
            mb_strtolower('Trabajo en equipo'),
            mb_strtolower('Liderazgo')
        ];

        $Formacion_y_orientacion_laboral = [
            mb_strtolower('legislación laboral'),
            mb_strtolower('derechos'),
            mb_strtolower('obligaciones'),
            mb_strtolower('funcionamiento de una empresa'),
            mb_strtolower('técnicas de búsqueda de empleo')
        ];

        $Montaje_y_mantenimiento_de_equipo  = [
            mb_strtolower('Hardware'),
            mb_strtolower('Arquitectura de computadoras'),
            mb_strtolower('montaje y mantenimiento de equipos'),
            mb_strtolower('Boot'),
            mb_strtolower('Núcleo o kernel'),
            mb_strtolower('unidad central de procesamiento'),
            mb_strtolower('procesador'),
            mb_strtolower('software'),
            mb_strtolower('firmware'),
            mb_strtolower('driver'),
            mb_strtolower('jerarquías de la memoria')
        ];

        $Sistemas_operativos_monopuesto  = [
            mb_strtolower('Linux'),
            mb_strtolower('Unix'),
            mb_strtolower('Mac OX'),
            mb_strtolower('Sistemas operativos'),
            mb_strtolower('Comandos de Linux'),
            mb_strtolower('Scripts'),
            mb_strtolower('bash'),
            mb_strtolower('batch'),
            mb_strtolower('automatización de tareas'),
            mb_strtolower('copias de seguridad'),
            mb_strtolower('recuperación de sistemas operativos')
        ];

        $Aplicaciones_ofimaticas  = [
            mb_strtolower('Office'),
            mb_strtolower('Libre Office'),
            mb_strtolower('Ofimática'),
            mb_strtolower('Access'),
            mb_strtolower('Base'),
            mb_strtolower('Calc'),
            mb_strtolower('Excel'),
            mb_strtolower('Word'),
            mb_strtolower('Writter'),
            mb_strtolower('GIMP'),
            mb_strtolower('Licencias'),
            mb_strtolower('SQL'),
            mb_strtolower('tipos de licencias')
        ];

        $Sistemas_operativos_en_red = [
            mb_strtolower('Linux'),
            mb_strtolower('DNS'),
            mb_strtolower('Directorio activo'),
            mb_strtolower('LDAP'),
            mb_strtolower('Windows Server'),
            mb_strtolower('Linux Server'),
            mb_strtolower('SAMBA'),
            mb_strtolower('LDAP'),
            mb_strtolower('Arquitecturas de árbol'),
            mb_strtolower('privilegios'),
            mb_strtolower('permisos'),
            mb_strtolower('seguridad'),
            mb_strtolower('centralización')
        ];

        $Redes_locales = [
            mb_strtolower('redes locales'),
            mb_strtolower('hub'),
            mb_strtolower('switch'),
            mb_strtolower('cisco'),
            mb_strtolower('IEEE 802.1'),
            mb_strtolower('IEEE 802.11'),
            mb_strtolower('IEEE 803'),
            mb_strtolower('subnetting'),
            mb_strtolower('topologías de red'),
            mb_strtolower('topología de redes en anillo'),
            mb_strtolower('topología de redes en bus'),
            mb_strtolower('topología de redes en malla'),
            mb_strtolower('topología de redes en árbol'),
            mb_strtolower('topología de redes en doble anillo'),
            mb_strtolower('cableado estructurado'),
            mb_strtolower('NAT'),
            mb_strtolower('IPTABLES'),
            mb_strtolower('Ad-hoc'),
            mb_strtolower('CSMA/CA'),
            mb_strtolower('DDNS'),
            mb_strtolower('Conmutador'),
            mb_strtolower('DHCP'),
            mb_strtolower('DMZ'),
            mb_strtolower('Dúplex competo'),
            mb_strtolower('Dúplex medio'),
            mb_strtolower('EAP'),
            mb_strtolower('Enrutador'),
            mb_strtolower('router'),
            mb_strtolower('Enrutamiento estático'),
            mb_strtolower('Enrutamiento estático'),
            mb_strtolower('Ethernet'),
            mb_strtolower('Firmware'),
            mb_strtolower('Dirección IP estática'),
            mb_strtolower('Dirección IP dinámica'),
            mb_strtolower('HTTP'),
            mb_strtolower('ISIP'),
            mb_strtolower('LAN'),
            mb_strtolower('LEAP'),
            mb_strtolower('MAC'),
            mb_strtolower('Mbps'),
            mb_strtolower('Modo infraestructura'),
            mb_strtolower('PEAP'),
            mb_strtolower('TCP/IP'),
            mb_strtolower('Pila TCP/IP'),
            mb_strtolower('Modelo OSI'),
            mb_strtolower('PoE'),
            mb_strtolower('ARP'),
            mb_strtolower('Tipos de antenas'),
            mb_strtolower('Conexión punto a punto'),
            mb_strtolower('Conexión punto a punto'),
            mb_strtolower('RJ-45'),
            mb_strtolower('TKIP'),
            mb_strtolower('AES'),
            mb_strtolower('WAN'),
            mb_strtolower('WPA'),
            mb_strtolower('WPA-2'),
            mb_strtolower('WPA-Enterprise'),
            mb_strtolower('WPA-2 Empresarial'),
            mb_strtolower('UDP'),
            mb_strtolower('Protocolos orientados a la conexión'),
            mb_strtolower('Protocolos no orientados a la conexión'),
            mb_strtolower('Punto de acceso'),
            mb_strtolower('RADIUS'),
            mb_strtolower('Puerta de enlace'),
        ];

        $Seguridad_informatica = [
            mb_strtolower('Amenaza'),
            mb_strtolower('Copia de seguridad'),
            mb_strtolower('Sistemas de copias de seguridad'),
            mb_strtolower('Peritaje informático'),
            mb_strtolower('Seguridad informática'),
            mb_strtolower('Ataque informático'),
            mb_strtolower('seguridad pasiva'),
            mb_strtolower('seguridad activa'),
            mb_strtolower('Arquitecturas de árbol'),
            mb_strtolower('Autenticación'),
            mb_strtolower('Confidencialidad'),
            mb_strtolower('LOPD'),
            mb_strtolower('Disponivilidad'),
            mb_strtolower('Gestión de Riesgo'),
            mb_strtolower('Integridad'),
            mb_strtolower('Vulnerabilidad'),
            mb_strtolower('0-day'),
            mb_strtolower('backtrack'),
            mb_strtolower('kali-linux'),
            mb_strtolower('distros de penetración de sistemas'),
            mb_strtolower('Adware'),
            mb_strtolower('Amenazas polimorfas'),
            mb_strtolower('Antispam'),
            mb_strtolower('Aplicaciones engañosas'),
            mb_strtolower('Ataques multi-etapas'),
            mb_strtolower('Ataques Web'),
            mb_strtolower('Blacklisting'),
            mb_strtolower('Lista Negra'),
            mb_strtolower('Bot'),
            mb_strtolower('Botnet'),
            mb_strtolower('Caballo de Troya'),
            mb_strtolower('Troyano'),
            mb_strtolower('Canal de control'),
            mb_strtolower('Carga destructiva'),
            mb_strtolower('Crimeware'),
            mb_strtolower('Ciberdelito'),
            mb_strtolower('Encriptación'),
            mb_strtolower('Cifrado'),
            mb_strtolower('Comunicaciones seguras'),
            mb_strtolower('Exploits'),
            mb_strtolower('Metasploit'),
            mb_strtolower('Ingeniería social'),
            mb_strtolower('Ingeniería inversa'),
            mb_strtolower('Filtración de datos'),
            mb_strtolower('Firewall'),
            mb_strtolower('Firma antivirus'),
            mb_strtolower('Virus indetectable'),
            mb_strtolower('Greylisting'),
            mb_strtolower('Lista Gris'),
            mb_strtolower('Gusanos'),
            mb_strtolower('Lista blanca'),
            mb_strtolower('Whitelisting'),
            mb_strtolower('Keystroke Logger'),
            mb_strtolower('Keylogger'),
            mb_strtolower('Malware'),
            mb_strtolower('Mecanismo de propagación'),
            mb_strtolower('virus polimorfico'),
            mb_strtolower('DoS'),
            mb_strtolower('Ddos'),
            mb_strtolower('Denegación de servicio'),
            mb_strtolower('Denegación de servicio distribuido'),
            mb_strtolower('Pharming'),
            mb_strtolower('Phishing'),
            mb_strtolower('Protección heurística'),
            mb_strtolower('P2P'),
            mb_strtolower('Rootkits'),
            mb_strtolower('Seguridad basada en la reputación'),
            mb_strtolower('Sistema de detección de intrusos'),
            mb_strtolower('Sistema de prevención de intrusos'),
            mb_strtolower('Software de seguridad fraudulento'),
            mb_strtolower('Spam'),
            mb_strtolower('Spyware'),
            mb_strtolower('Toolkit'),
            mb_strtolower('Virus más propagado')
        ];

        $Fundamentos_de_programacion  = [
            mb_strtolower('Java'),
            mb_strtolower('C#'),
            mb_strtolower('C'),
            mb_strtolower('Programación estructurada'),
            mb_strtolower('Programación modular'),
            mb_strtolower('Programación orientada a objetos'),
            mb_strtolower('Abstracción'),
            mb_strtolower('Instanciar'),
            mb_strtolower('Objeto'),
            mb_strtolower('Clase padre'),
            mb_strtolower('Subclase:'),
            mb_strtolower('Acoplamiento'),
            mb_strtolower('Agregación'),
            mb_strtolower('Algoritmo'),
            mb_strtolower('Ámbito de clase'),
            mb_strtolower('Análisis'),
            mb_strtolower('Optimización de código'),
            mb_strtolower('Desarrollo de aplicaciones'),
            mb_strtolower('Programación'),
            mb_strtolower('Array'),
            mb_strtolower('ArrayList'),
            mb_strtolower('Pilas'),
            mb_strtolower('Listas enlazadas'),
            mb_strtolower('Listas doblemente enlazadas'),
            mb_strtolower('Javadoc'),
            mb_strtolower('Documentación'),
            mb_strtolower('Eclipse'),
            mb_strtolower('Git'),
            mb_strtolower('entorno de desarrollo'),
            mb_strtolower('UML'),
            mb_strtolower('Desarrollo de software'),
            mb_strtolower('lenguajes compilados'),
            mb_strtolower('lenguajes interpretados'),
            mb_strtolower('Constantes'),
            mb_strtolower('Variables'),
            mb_strtolower('JUnit'),
            mb_strtolower('Excepciones'),
            mb_strtolower('Expresiones regulares'),
            mb_strtolower('Regex'),
            mb_strtolower('JDK'),
            mb_strtolower('JRE'),
            mb_strtolower('encapsulación'),
            mb_strtolower('Herencia'),
            mb_strtolower('Polimorfismo'),
            mb_strtolower('Persistencia'),
            mb_strtolower('GUI')
        ];

        $Desarrollo_web_en_entorno_servidor   = [
            mb_strtolower('PHP'),
            mb_strtolower('ASP'),
            mb_strtolower('JSP'),
            mb_strtolower('Programación estructurada'),
            mb_strtolower('Programación modular'),
            mb_strtolower('Programación orientada a objetos'),
            mb_strtolower('Abstracción'),
            mb_strtolower('Instanciar'),
            mb_strtolower('Objeto'),
            mb_strtolower('Clase padre'),
            mb_strtolower('Subclase:'),
            mb_strtolower('Acoplamiento'),
            mb_strtolower('Agregación'),
            mb_strtolower('Algoritmo'),
            mb_strtolower('Ámbito de clase'),
            mb_strtolower('Análisis'),
            mb_strtolower('Optimización de código'),
            mb_strtolower('Desarrollo de aplicaciones'),
            mb_strtolower('Programación'),
            mb_strtolower('Array'),
            mb_strtolower('Arrays asociativos'),
            mb_strtolower('Pilas'),
            mb_strtolower('Vagrant'),
            mb_strtolower('PDO'),
            mb_strtolower('Documentación'),
            mb_strtolower('PHPStorm'),
            mb_strtolower('Git'),
            mb_strtolower('entorno de desarrollo'),
            mb_strtolower('UML'),
            mb_strtolower('Desarrollo de software'),
            mb_strtolower('Sublime Text'),
            mb_strtolower('lenguajes interpretados'),
            mb_strtolower('Constantes'),
            mb_strtolower('Variables'),
            mb_strtolower('Excepciones'),
            mb_strtolower('Expresiones regulares'),
            mb_strtolower('Regex'),
            mb_strtolower('encapsulación'),
            mb_strtolower('Herencia'),
            mb_strtolower('Polimorfismo'),
            mb_strtolower('Persistencia'),
            mb_strtolower('GUI'),
            mb_strtolower('Aplicaciones modulares'),
            mb_strtolower('Aplicaciones escalables'),
            mb_strtolower('Framework'),
            mb_strtolower('Laravel'),
            mb_strtolower('Synfony'),
            mb_strtolower('Base de datos'),
            mb_strtolower('desarrollo de buscadores'),
            mb_strtolower('Operaciones CRUD'),
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

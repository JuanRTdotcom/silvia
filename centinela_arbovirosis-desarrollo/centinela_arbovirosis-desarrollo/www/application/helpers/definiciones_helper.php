<?php
if (!defined('BASEPATH')){exit('No direct script access allowed');}

if (!function_exists('getOpciones'))
{
    function getOpciones($def1 = null, $def2 = null)
    {
        switch ($def1) {
            case 'clasificacion':
                $resultado = array(
                    '1' => 'CONFIRMADO',
                    '2' => 'PROBABLE',
                    '3' => 'SOSPECHOSO',
                    '57' => 'DESCARTADO'
                );
                break;
            
            case 'punto':
                $resultado = array(
                    '4' => 'SI',
                    '5' => 'NO',
                    '6' => 'DESCONOCIDO'
                );
                break;

            case 'tipo_edad':
                $resultado = array(
                    '7' => 'AÑOS',
                    '8' => 'MES',
                    '9' => 'DIA'
                );
                break;

            case 'sexo':
                $resultado = array(
                    '10' => 'MASCULINO',
                    '11' => 'FEMENINO'
                );
                break;

            case 'tipodoc':
                $resultado = array(
                    '12' => 'DNI',
                    '13' => 'CARNET DE EXTRANJERIA',
                    '14' => 'PASAPORTE',
                    '51' => 'SIN DOCUMENTO'
                );
                break;

            case 'hospitalizado':
                $resultado = array(
                    '15' => 'SI',
                    '16' => 'NO',
                    '17' => 'DESCONOCIDO'
                );
                break;

            case 'aislamiento':
                $resultado = array(
                    '52' => 'SI',
                    '53' => 'NO'
                );
                break;

            case 'ventilacion':
                $resultado = array(
                    '18' => 'SI',
                    '19' => 'NO',
                    '20' => 'DESCONOCIDO'
                );
                break;

            case 'evolucion':
                $resultado = array(
                    '21' => 'RECUPERADO',
                    '22' => 'NO RECUPERADO',
                    '23' => 'FALLECIÓ',
                    '24' => 'DESCONOCIDO',
                    '96' => 'ESTACIONARIA'
                );
                break;

            case 'lugar_def':
                $resultado = array(
                    '102' => 'ESTABLECIMIENTO DE SALUD',
                    '103' => 'CALLE',
                    '104' => 'VIVIENDA',
                    '105' => 'OTROS'
                );
                break;

            case 'clasifica_def':
                $resultado = array(
                    '108' => 'CONFIRMADO POR PRUEBA RT-PCR',
                    '109' => 'TIENE IMAGEN O RESONANCIA COMPATIBLE',
                    '114' => 'TIENE PRUEBA SEROLOGICA IgG/IgM PARA COVID19',
                    '117' => 'TIENE NEXO EPIDEMIOLOGICO CON CASO CONFIRMADO',
                    '121' => 'CASO SOSPECHOSO CON PRUEBA SEROLOGICA IgG',
                    '125' => 'FALLECIDO CON CERT. DE DEFUNCION P/COVID19',
                    '126' => 'CASO SOSPECHOSO EN INVESTIGACION'
                );
                break;

            case 'ocupacion':
                $resultado = array(
                    '25' => 'ESTUDIANTE',
                    '26' => 'TRABAJADOR DE SALUD',
                    '27' => 'TRABAJA CON ANIMALES',
                    '28' => 'TRABAJADOR DE SALUD EN LABORATORIO',
                    '29' => 'OTROS'
                );
                break;

            case 'viajado_14':
                $resultado = array(
                    '30' => 'SI',
                    '31' => 'NO',
                    '32' => 'DESCONOCIDO'
                );
                break;

            case 'eess_14':
                $resultado = array(
                    '33' => 'SI',
                    '34' => 'NO',
                    '35' => 'DESCONOCIDO'
                );
                break;

            case 'contacto_14':
                $resultado = array(
                    '48' => 'SI',
                    '49' => 'NO',
                    '50' => 'DESCONOCIDO'
                );
                break;

            case 'confirmado_14':
                $resultado = array(
                    '36' => 'SI',
                    '37' => 'NO',
                    '38' => 'DESCONOCIDO'
                );
                break;

            case 'mercado':
                $resultado = array(
                    '42' => 'SI',
                    '43' => 'NO',
                    '44' => 'DESCONOCIDO'
                );
                break;

            case 'muestra':
            case 'muestra1':
                $resultado = array(
                    '54' => 'HISOPADO NASAL Y FARINGEO',
                    '55' => 'LAVADO BRONCOALVEOLAR',
                    '56' => 'ASPIRADO TRAQUEAL O NASAL FARINGEO'
                );
                break;

            case 'resultado':
            case 'resultado1':
                $resultado = array(
                    '100' => 'POSITIVO',
                    '101' => 'NEGATIVO'
                );
                break;

            case 'muestra_rap':
            case 'muestra_rap1':
                $resultado = array(
                    '93' => 'MUESTRA DE SANGRE'
                );
                break;

            case 'resultado_rap':
            case 'resultado_rap1':
                $resultado = array(
                    '94' => 'POSITIVO',
                    '95' => 'NEGATIVO',
                    '97' => 'Ig M Positivo',
                    '98' => 'Ig G Positivo',
                    '99' => 'Ig M e Ig G Positivo'
                );
                break;

            case 'secuenciamiento':
                $resultado = array(
                    '45' => 'SI',
                    '46' => 'NO',
                    '47' => 'DESCONOCIDO'
                );
                break;
        }

        if($resultado)
        {
            foreach ($resultado as $key => $value) {
                if($key == $def2)
                {
                    return $value;
                }
            }            
        }else{
            return false;
        }

    }
}

if (!function_exists('getInstitucion'))
{
    function getInstitucion($def1 = null)
    {
        $resultado = array(
            '1' => 'MINSA',
            '2' => 'ESSALUD',
            '3' => 'SANIDAD DEL EJERCITO DEL PERU',
            '4' => 'SANIDAD DE LA FUERZA AEREA DEL PERU',
            '5' => 'SANIDAD DE LA POLICIA NACIONAL DEL PERU',
            '6' => 'SANIDAD DE LA MARINA DE GUERRA DEL PERU',
            '7' => 'GOBIERNO REGIONAL',
            '8' => 'MUNICIPALIDAD PROVINCIAL',
            '9' => 'MUNICIPALIDAD DISTRITAL',
            '10' => 'PRIVADO',
            '11' => 'OTRO',
            '12' => 'MIXTO',
            '13' => 'INPE',
            '99' => 'HISTORICO'
        );

        if($resultado)
        {
            foreach ($resultado as $key => $value) {
                if($key == $def1)
                {
                    return $value;
                }
            }            
        }else{
            return false;
        }
    }
}

if (!function_exists('getDiresa'))
{
    function getDiresa($def1 = null)
    {
        $resultado = array(
            '02' => 'ANCASH',
            '04' => 'AREQUIPA',
            '05' => 'AYACUCHO',
            '07' => 'CALLAO',
            '08' => 'CUSCO',
            '09' => 'HUANCAVELICA',
            '10' => 'HUANUCO',
            '11' => 'ICA',
            '12' => 'JUNIN',
            '13' => 'LA LIBERTAD',
            '14' => 'LAMBAYEQUE',
            '16' => 'LORETO',
            '17' => 'MADRE DE DIOS',
            '18' => 'MOQUEGUA',
            '19' => 'PASCO',
            '21' => 'PUNO',
            '22' => 'SAN MARTIN',
            '23' => 'TACNA',
            '24' => 'TUMBES',
            '25' => 'UCAYALI',
            '31' => 'LUCIANO CASTILLO',
            '32' => 'PIURA',
            '33' => 'APURIMAC',
            '34' => 'CHANKA',
            '35' => 'CAJAMARCA',
            '36' => 'AMAZONAS',
            '37' => 'CHOTA',
            '38' => 'JAEN',
            '42' => 'LIMA PROVINCIAS',
            '46' => 'CUTERVO',
            '50' => 'DIRIS LIMA CENTR',
            '51' => 'DIRIS LIMA NORTE',
            '52' => 'DIRIS LIMA ESTE',
            '53' => 'DIRIS LIMA SUR'
        );

        if($resultado)
        {
            foreach ($resultado as $key => $value) {
                if($key == $def1)
                {
                    return $value;
                }
            }            
        }else{
            return false;
        }
    }
}

if (!function_exists('getPuntos'))
{
    function getPuntos($def1 = null)
    {
        $resultado = array(
            '1' => 'PUERTO PAITA - PIURA',
            '2' => 'PUERTO BAYOVAR - PIURA',
            '3' => 'PUERTO TALARA - PIURA',
            '4' => 'PUERTO SALAVARRY - LA LIBERTAD',
            '5' => 'PUERTO CHIMBOTE - ANCASH',
            '6' => 'PUERTO CALLAO - LIMA',
            '7' => 'PUERTO PISCO - ICA',
            '8' => 'PUERTO MATARANI - AREQUIPA',
            '9' => 'PUERTO SAN NICOLAS - ICA',
            '10' => 'PUERTO ILO - MOQUEGUA',
            '11' => 'PUERTO MELCHORITA - LIMA',
            '12' => 'PUERTO SUPE - LIMA',
            '13' => 'AEROPUERTO INTERNACIONAL CAPITAN FAP. JOSE A. QUIÑONES (LAMBAYEQUE)',
            '14' => 'AEROPUERTO INTERNACIONAL CAPITAN FAP. CARLOS MARTINEZ DE PINILLOS (LA LIBERTAD)',
            '15' => 'AEROPUERTO INTERNACIONAL JORGE CHAVEZ (CALLAO)',
            '16' => 'AEROPUERTO INTERNACIONAL ALFERES ALFREDO RODRIGUEZ BALLON (AREQUIPA)',
            '17' => 'AEROPUERTO INTERNACIONAL TENIENTE ALEJANDRO VELASCO ASTETE (CUSCO)',
            '18' => 'AEROPUERTO INTERNACIONAL CORONEL FAP FRACISCO SECADA VIGNETTA (LORETO)',
            '19' => 'AEROPUERTO INTERNACIONAL CARLOS CIRIANI SANTA ROSA (TACNA)',
            '20' => 'FRONTERA PERU - CHILE',
            '21' => 'FRONTERA PERU - BOLIVIA',
            '22' => 'FRONTERA PERU - BRASIL',
            '23' => 'FRONTERA PERU - COLOMBIA',
            '24' => 'FRONTERA PERU - ECUADOR'
        );

        if($resultado)
        {
            foreach ($resultado as $key => $value) {
                if($key == $def1)
                {
                    return $value;
                }
            }            
        }else{
            return false;
        }
    }    
}

if (!function_exists('getPaises'))
{
    function getPaises($def1 = null)
    {
        $resultado = array(
            '' => 'Sin registro',
            '001' => 'Afghanistan',
            '002' => 'Albania',
            '003' => 'Alemania',
            '004' => 'Algeria',
            '005' => 'Andorra',
            '006' => 'Angola',
            '007' => 'Anguilla',
            '008' => 'Antigua y Barbuda',
            '009' => 'Antillas Holandesas',
            '010' => 'Arabia Saudita',
            '011' => 'Argentina',
            '012' => 'Armenia',
            '013' => 'Aruba',
            '014' => 'Australia',
            '015' => 'Austria',
            '016' => 'Azerbaijan',
            '017' => 'Bahamas, Las',
            '018' => 'Bahrain',
            '019' => 'Bangladesh',
            '020' => 'Barbados',
            '021' => 'Belarus',
            '022' => 'Belgium',
            '023' => 'Belize',
            '024' => 'Benin',
            '025' => 'Bermuda',
            '026' => 'Bhutan',
            '027' => 'Bolivia',
            '028' => 'Bosnia y Herzegovina',
            '029' => 'Botswana',
            '030' => 'Brazil',
            '031' => 'Brunei',
            '032' => 'Bulgaria',
            '033' => 'Burkina Faso',
            '034' => 'Burma',
            '035' => 'Burundi',
            '036' => 'Cabo Verde',
            '037' => 'Camboya',
            '038' => 'Camerun',
            '039' => 'Canada',
            '040' => 'Chad',
            '041' => 'Chile',
            '042' => 'China',
            '043' => 'Chipre',
            '044' => 'Colombia',
            '045' => 'Comoros',
            '046' => 'Congo, Republica de El',
            '047' => 'Congo, Rep£blica democr tica de',
            '048' => 'Cook Islas',
            '049' => 'Corea del Norte',
            '050' => 'Corea del Sur',
            '051' => 'Costa de Oro',
            '052' => 'Costa Rica',
            '053' => 'Croacia',
            '054' => 'Cuba',
            '055' => 'Dinamarca',
            '056' => 'Djibouti',
            '057' => 'Dominica',
            '058' => 'Dominicana Republica',
            '059' => 'Ecuador',
            '060' => 'Egipto',
            '061' => 'El Salvador',
            '062' => 'Emiratos Arabes  Unidos',
            '063' => 'Eritrea',
            '064' => 'España',
            '065' => 'Estados Unidos',
            '066' => 'Estonia',
            '067' => 'Etiopia',
            '068' => 'Fiji',
            '069' => 'Filipinas',
            '070' => 'Finlandia',
            '071' => 'Francia',
            '072' => 'Gabon',
            '073' => 'Gambia',
            '074' => 'Gaza Franja de',
            '075' => 'Georgia',
            '076' => 'Ghana',
            '077' => 'Gibraltar',
            '078' => 'Grecia',
            '079' => 'Grenada',
            '080' => 'Groenlandia',
            '081' => 'Guadelupe',
            '082' => 'Guam',
            '083' => 'Guatemala',
            '084' => 'Guernsey',
            '085' => 'Guiana Francesa',
            '086' => 'Guinea',
            '087' => 'Guinea Equatorial',
            '088' => 'Guinea-Bissau',
            '089' => 'Guyana',
            '090' => 'Haiti',
            '091' => 'Holanda',
            '092' => 'Honduras',
            '093' => 'Hong Kong',
            '094' => 'Hungria',
            '095' => 'India',
            '096' => 'Indonesia',
            '097' => 'Iran',
            '098' => 'Iraq',
            '099' => 'Irlanda',
            '100' => 'Islandia',
            '101' => 'Islas Cayman',
            '102' => 'Islas Christmas',
            '103' => 'Islas Cocos (Keeling)',
            '104' => 'Islas Faroe',
            '105' => 'Islas Malvinas (Falkland Islands)',
            '106' => 'Islas Marshall',
            '107' => 'Islas Norfolk',
            '108' => 'Islas Pitcairn',
            '109' => 'Islas Solomon',
            '110' => 'Islas Virgenes',
            '111' => 'Islas Virgenes Britanicas',
            '112' => 'Israel',
            '113' => 'Italia',
            '114' => 'Jamaica',
            '115' => 'Jap¢n',
            '116' => 'Jersey',
            '117' => 'Jordania',
            '118' => 'Kazakhstan',
            '119' => 'Kenya',
            '120' => 'Kiribati',
            '121' => 'Kuwait',
            '122' => 'Kyrgyzstan',
            '123' => 'Laos',
            '124' => 'Latvia',
            '125' => 'Lesotho',
            '126' => 'Libano',
            '127' => 'Liberia',
            '128' => 'Libia',
            '129' => 'Liechtenstein',
            '130' => 'Lituania',
            '131' => 'Luxembourgo',
            '132' => 'Macao',
            '133' => 'Macedonia, La anterior Rep£blica de Yugoslavia',
            '134' => 'Madagascar',
            '135' => 'Malasia',
            '136' => 'Malawi',
            '137' => 'Maldives',
            '138' => 'Mali',
            '139' => 'Malta',
            '140' => 'Man, Isla de',
            '141' => 'Mariana del Norte, Islas de',
            '142' => 'Marruecos',
            '143' => 'Martinica',
            '144' => 'Mauricio, Isla',
            '145' => 'Mauritania',
            '146' => 'Mayotte',
            '147' => 'Mexico',
            '148' => 'Micronesia, Estados Federados de',
            '149' => 'Moldova',
            '150' => 'Monaco',
            '151' => 'Mongolia',
            '152' => 'Montserrat',
            '153' => 'Mozambique',
            '154' => 'Namibia',
            '155' => 'Nauru',
            '156' => 'Nepal',
            '157' => 'Nicaragua',
            '158' => 'Niger',
            '159' => 'Nigeria',
            '160' => 'Niue',
            '161' => 'Noruega',
            '162' => 'Nueva Caledonia',
            '163' => 'Nueva Zelandia',
            '164' => 'Oman',
            '165' => 'Oriental Sahara',
            '166' => 'Pakistan',
            '167' => 'Palau',
            '168' => 'Panama',
            '169' => 'Papua Nueva Guinea',
            '170' => 'Paraguay',
            '171' => 'Peru',
            '172' => 'Polinesia Francesa',
            '173' => 'Polonia',
            '174' => 'Portugal',
            '175' => 'Puerto Rico',
            '176' => 'Qatar',
            '177' => 'Reino Unido',
            '178' => 'Rep£blica Central Africana',
            '179' => 'Republica Checa',
            '180' => 'Reunion',
            '181' => 'Rumania',
            '182' => 'Russia',
            '183' => 'Rwanda',
            '184' => 'Saint Kitts and Nevis',
            '185' => 'Sainta Helena',
            '186' => 'Samoa',
            '187' => 'Samoa Americana',
            '188' => 'San Marino',
            '189' => 'San Pedro y Miquelon',
            '190' => 'San Vincente y las Grenadinas',
            '191' => 'Santa Lucia',
            '192' => 'Santo Tomas y Principe',
            '193' => 'Senegal',
            '194' => 'Serbia y Montenegro',
            '195' => 'Seychelles',
            '196' => 'Sierra Leona',
            '197' => 'Singapur',
            '198' => 'Siria',
            '199' => 'Slovakia',
            '200' => 'Slovenia',
            '201' => 'Somalia',
            '202' => 'Sri Lanka',
            '203' => 'Sud Africa',
            '204' => 'Sudan',
            '205' => 'Suecia',
            '206' => 'Suiza',
            '207' => 'Surinam',
            '208' => 'Svalbard',
            '209' => 'Swazilandia',
            '210' => 'Taiwan',
            '211' => 'Tajikistan',
            '212' => 'Tanzania',
            '213' => 'Thailandia',
            '214' => 'Timor Oriental',
            '215' => 'Togo',
            '216' => 'Tokelau',
            '217' => 'Tonga',
            '218' => 'Trinidad y Tobago',
            '219' => 'Tunisia',
            '220' => 'Turkey',
            '221' => 'Turkmenistan',
            '222' => 'Turks and Caicos Islands',
            '223' => 'Tuvalu',
            '224' => 'Uganda',
            '225' => 'Ukraine',
            '226' => 'Uruguay',
            '227' => 'Uzbekistan',
            '228' => 'Vanuatu',
            '229' => 'Vaticano, Ciudad del  (Santa Sede)',
            '230' => 'Venezuela',
            '231' => 'Vietnam',
            '232' => 'Wallis and Futuna',
            '233' => 'West Bank',
            '234' => 'Yemen',
            '235' => 'Zambia',
            '236' => 'Zimbabwe',
            '384' => 'Costa de Marfil'
        );

        if($resultado)
        {
            foreach ($resultado as $key => $value) {
                if($key == $def1)
                {
                    return $value;
                }
            }            
        }else{
            return false;
        }
    }
}

if (!function_exists('getUbicacion'))
{
    function getUbicacion($id = null)
    {
        $where = array('ubigeo'=>$id, 'ano'=>'2020');

        $CI = & get_instance();

        $query = $CI->db
                    ->select('ubigeo, departam, provincia, distrito')
                    ->where($where)
                    ->get('codubi');

        return $query->row();
    }
}
/*
if (!function_exists('getLocalidad'))
{
    function getLocalidad($id = null)
    {
        $where = array('codloc'=>$id);

        $CI = & get_instance();

        $query = $CI->db->get_where('localidad', $where);

        return $query->row();
    }
}
*/
if (!function_exists('getEtnia'))
{
    function getEtnia($def1 = null)
    {
        $resultado = array(
            '1' => 'Mestizo',
            '2' => 'Afrodescendiente',
            '3' => 'Andino',
            '4' => 'Indígena amazónico',
            '5' => 'Asiático descendiente',
            '6' => 'Otro'
        );

        if($resultado)
        {
            foreach ($resultado as $key => $value) {
                if($key == $def1)
                {
                    return $value;
                }
            }            
        }else{
            return false;
        }
    }        
}

if (!function_exists('getPueblo'))
{
    function getPueblo($def1 = null)
    {
        $resultado = array(
            '1' => '01 - AYMARA',
            '2' => '02 - URO',
            '3' => '03 - JAQARU, KAWI (JAQI, CAUQUI)',
            '4' => '04 - CHANCAS',
            '5' => '05 - CHOPCCAS',
            '6' => '06 - QEROS',
            '7' => '07 - WANCAS',
            '8' => '08 - OTROS GRUPOS QUECHUAS DEL AREA ANDINA',
            '9' => '09 - ACHUAR , ACHUAL',
            '10' => '10 - AMAHUACA',
            '11' => '11 - AMAIWERI - KISAMBAERI',
            '12' => '12 - AMARAKAERI',
            '13' => '13 - ANDOA - SHIMIGAE',
            '14' => '14 - ANDOKE',
            '15' => '15 - ARABELLA (CHIRUPINO)',
            '16' => '16 - ARASAIRE',
            '17' => '17 - ASHANINKA',
            '18' => '18 - ASHENINKA',
            '19' => '19 - AWAJUN (AGUARUNA, AENTS)',
            '20' => '20 - BORA (MIAMUNA)',
            '21' => '21 - CACATAIBO (UNI)',
            '22' => '22 - CAHUARANA (MOROCANO)',
            '23' => '23 - CANDOSHI - MURATO',
            '24' => '24 - CAPANAHUA (JUNIKUIN)',
            '25' => '25 - CAQUINTE (POYENISATI)',
            '26' => '26 - CASHINAHUA (JUNIKUIN)',
            '27' => '27 - CHAMICURO (CHAMEKOLO)',
            '28' => '28 - CHITONAHUA',
            '29' => '29 - COCAMA - COCAMILLA',
            '30' => '30 - CUJARE�O (I�APARI)',
            '31' => '31 - CULINA (MADIJA)',
            '32' => '32 - ESE`EJA ("HUARAYO")',
            '33' => '33 - HARAKMBUT',
            '34' => '34 - HUACHIPAIRE',
            '35' => '35 - HUAORANI (TAGAERI, TAROMENANE)',
            '36' => '36 - HUITOTO (INCLUYE MURUI, MENECA, MUNAINE)',
            '37' => '37 - IQUITO',
            '38' => '38 - ISCONAHUA (ICOBAKEBO)',
            '39' => '39 - JEBERO (SHIWILU, SEWELO)',
            '40' => '40 - JIBARO',
            '41' => '41 - LAMISTO',
            '42' => '42 - MACHIGUENGA (MATSIGENKA)',
            '43' => '43 - MASHCO - PIRO ("MASHCO")',
            '44' => '44 - MASTANAHUA',
            '45' => '45 - MAYORUNA (MATSE)',
            '46' => '46 - MURUNAHUA',
            '47' => '47 - NANTI',
            '48' => '48 - NOMATSIGUENGA',
            '49' => '49 - OCAINA (IVO`TSA)',
            '50' => '50 - OMAGUA',
            '51' => '51 - OREJON (MAI HUNA, MAIJUNA)',
            '52' => '52 - PISABO (MAYO, KANIBO)',
            '53' => '53 - PUKIRIERI',
            '54' => '54 - QUICHUA - QUICHUA RUNA, KICHWA (I)',
            '55' => '55 - RESIGARO',
            '56' => '56 - SAPITERI',
            '57' => '57 - SECOYA (AIDO PAI)',
            '58' => '58 - SHAPRA',
            '59' => '59 - SHARANAHUA / MARINAHUA (ONIKOIN)',
            '60' => '60 - SHAWI (CHAYAHUITA, KANPUNAN, KAMPU PIYAW',
            '61' => '61 - SHIPIBO - CONIBO - SHETEBO',
            '62' => '62 - SHUAR',
            '63' => '63 - TAUSHIRO (PINCHE)',
            '64' => '64 - TICUNA (DUUXUGU)',
            '65' => '65 - TOYOERI',
            '66' => '66 - URARINA (ITUKALE, SHIMACO, KACHA)',
            '67' => '67 - WAMPIS (HUAMBISA)',
            '68' => '68 - YAGUA (YAWA, NIHAMWO)',
            '69' => '69 - YAMINAHUA',
            '70' => '70 - YANESHA ("AMUESHA")',
            '71' => '71 - YINE - YAMI ("PIRO")',
            '72' => '72 - YORA ("NAHUA", "PARQUENAHUA")',
            '73' => '73 - OTROS GRUPOS INDIGENAS AMAZONICOS'
        );

        if($resultado)
        {
            foreach ($resultado as $key => $value) {
                if($key == $def1)
                {
                    return $value;
                }
            }            
        }else{
            return false;
        }
    }        
}

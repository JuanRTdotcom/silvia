<?php
if (!defined('BASEPATH')){exit('No direct script access allowed');}

if (!function_exists('tratamiento'))
{   
	function tratamiento($datos)
    {

        $filtro = array('dni'=>$datos['dni'], 'app'=>$datos['app'], 'usuario'=>$datos['usuario']);

        $resultado = consumiendo($filtro);

        //$resultado = '{"nombres":"ROSA MARIA DEL PILAR","apepat":"PRADA","apemat":"AHON","sexo":"F","edadcal":"59-6-22","direccion_reniec":"CARTAGENA","fecnac":"17-04-1959","dni":"07905620", "fuente":"clocal"}';

        echo $resultado;
    }
}
    //Satinisando

if (!function_exists('test_input'))
{   
	function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
}

if (!function_exists('consumiendo'))
{   
    function consumiendo($consume)
    {
        $dni = $consume['dni'];
        $app = $consume['app'];
        $usuario = $consume['usuario'];

        $texto = "";

        if(trim($dni) != '00000000' and trim($dni) != '999999999' and trim($dni) != '11111111'){
            $nfile="http://192.168.200.19/r/cliext18.php?dni=$dni&app=$app&usuario=".$usuario;

            $archivo = fopen ($nfile, "r");
            while ($linea = fgets($archivo,1024)) {
                if ($linea) $texto .= trim($linea);
            }
            $texto;
            fclose ($archivo);
        }

        return $texto;
    }
}

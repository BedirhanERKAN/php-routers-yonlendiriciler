<?php
/*
 * Created by Bedirhan ERKAN
 * Github   :  BedirhanERKAN
 * Facebook :  BedirhanERKAN
 * Twitter  :  BedirhanERKAN
 * Youtube  :  BedirhanERKAN
 */

class Router{
    
    static $requestURI,$requestURIs,$scriptName,$requestlist = array(),$configlist = array();

    function __construct()
    {

        self::$requestURIs = explode('/', $_SERVER['REQUEST_URI']);
        self::$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);
       
        for($i= 0;$i < sizeof(self::$scriptName);$i++)
        {
            if (self::$requestURIs[$i] == self::$scriptName[$i])
            {
                unset(self::$requestURIs[$i]);
            }
        }
        
        $newurl = null;
        foreach(self::$requestURIs as $val){
            $newurl.= "/".$val;
        }
        self::$requestURI = $newurl;
        
    }

    function any($href,$callback,$arr = array())
    {
        self::$requestlist[] = array($href,$callback,$arr,0);
    }
    
    
    function post($href,$callback,$arr = array())
    {
        self::$requestlist[] = array($href,$callback,$arr,1);
    }

    function config($e)
    {
        self::$configlist = $e;
    }

    function router()
    {
        global $pars;
        $errorcode = 0;
        
        for($i=0; $i < sizeof(self::$requestlist);$i++)
        {        
            //preg_match_all("@". self::$requestlist[$i][0] ."@i", $_SERVER['REQUEST_URI'], $pat_array);
            preg_match_all("@". self::$requestlist[$i][0] ."@i", self::$requestURI, $pat_array);

            if(self::$requestlist[$i][3]==1 and $_SERVER['REQUEST_METHOD']!="POST"){ break; }

            //echo $pat_array[0][0]."<>".self::$requestURI."<br>";
            if(@$pat_array[0][0]==self::$requestURI)
            {
                unset($pat_array[0]);
                $params = $pat_array;


                $is=0;
                foreach($params as $key => $val)
                {
                     self::$requestlist[$i][1] = str_ireplace(":".self::$requestlist[$i][2][$is],$val[0],self::$requestlist[$i][1]);

                     $pars[self::$requestlist[$i][2][$is]]=$val[0];
                     $_GET[self::$requestlist[$i][2][$is]] = $val[0];
                     $is++;
                }

                if($_SERVER['REQUEST_METHOD']=="POST")
                {
                    foreach($_POST as $valuesm => $item){
                        $pars[$valuesm] = $item;
                    }
                }

                $path = self::$requestlist[$i][1];

                if(file_exists($path))
                {
                 require_once($path);   
                }else{
                    header("HTTP/1.0 404 Not Found");

                    if(self::$configlist['error_none']==false)
                    {
                     echo self::$requestlist[$i][1]." not found.";
                    }else{
                        echo "404 Not Found";
                    }

                    die();
                }  
                
                
                break;
            }else{
                    $errorcode+=1;

                    if(sizeof(self::$requestlist)==$errorcode+1 and self::$configlist['error_none']==false)
                    {
                       header("HTTP/1.0 404 Not Found");
                        echo "Yönlendirici Listesini Kontrol Ediniz.";
                    }else{
                        echo "404 Not Found";
                    }

                    die();
            }
             
        }
        
        return $pars;
    }

}

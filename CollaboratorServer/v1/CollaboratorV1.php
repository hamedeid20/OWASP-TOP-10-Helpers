<?php 

namespace CollaboratorServer\V1;
use CollaboratorServer\V1\DateHandling\DateHandling;

require_once 'DateHandling.php';

class CollaboratorV1{

    private $fileName;
    private $filesPath = './files/';

    public function __construct($fileName = null){
        $this->fileName = $fileName;
    }

    public function collaboratorData($requestMethod, $headers){
        
        $date = new DateHandling();
        // $date->setTimezone('Africa/Cairo');
        $date->setTimezone('Asia/Baghdad');

        if($requestMethod == "POST"){
            
            $requestBody = !empty(file_get_contents('php://input')) ? file_get_contents('php://input') : $_POST;

            $typeCheck = is_array($requestBody) ? "Array" : "String";

            $BodyString = '';
            if($typeCheck == "Array"){
                foreach( $requestBody as $name => $key){
                    $BodyString .= $name . "= " . $key . " & "; 
                }
            }

            if(!empty($this->fileName)){
                if(empty($BodyString)){
                    file_put_contents($this->filesPath . $this->fileName .'.log', $date->getCurrentTime() . " - Method: $requestMethod - Body: $requestBody - Headers: " . json_encode($headers) . PHP_EOL, FILE_APPEND);
                }else if(!empty($BodyString)){
                    file_put_contents($this->filesPath . $this->fileName .'.log', $date->getCurrentTime() . " - Method: $requestMethod - Body: ". trim($BodyString, '& ') ." - Headers: " . json_encode($headers) . PHP_EOL, FILE_APPEND);
                }
            }else if(empty($this->fileName)){
                $arrayOfNum = [];
                foreach(glob($this->filesPath.'/*.log') as $file) {
                    $file = explode('/', $file);
                    $arrayOfNum[] = preg_replace('/[^0-9]/', '', $file[3]);
                }
                $newNum = !empty($arrayOfNum) ? max($arrayOfNum) + 1 : 0 + 1;
                $newFileName = "session" . $newNum . ".log";
                if(empty($BodyString)){
                    file_put_contents($this->filesPath . $newFileName, $date->getCurrentTime() . " - Method: $requestMethod - Body: $requestBody - Headers: " . json_encode($headers) . PHP_EOL, FILE_APPEND);
                }else if(!empty($BodyString)){
                    file_put_contents($this->filesPath . $newFileName, $date->getCurrentTime() . " - Method: $requestMethod - Body: ". trim($BodyString, '& ') ." - Headers: " . json_encode($headers) . PHP_EOL, FILE_APPEND);
                }
            }
            
        }else{
            file_put_contents($this->filesPath . 'error.log', $date->getCurrentTime() . " - Error: Please Use Post Method!". PHP_EOL, FILE_APPEND);
        }

        
    }

}

?>
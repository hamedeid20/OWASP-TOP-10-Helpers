<?php 

    namespace CollaboratorServer\V1\DateHandling;
     class DateHandling{

        private $timeZone;

        public function setTimezone($timeZone) {
            $this->timeZone = new \DateTimeZone($timeZone);
        }
          
        public function getCurrentTime() {
            if (!$this->timeZone) {
              throw new \Exception("Time zone has not been set.");
            }else{
                $currentTime = new \DateTime('now', $this->timeZone);
                return $currentTime->format('Y-m-d h:i:s A');
            }
        }

    }

?>

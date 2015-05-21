<?php
    class ServiceStatus {
        private $statusId;
        private $statusText;
        private $data;
        
        public function __construct($statusId, $statusText) {
            $this->statusId = $statusId;
            $this->statusText = $statusText;
        }
        
        function getStatusId() {
            return $this->statusId;
        }

        function getStatusText() {
            return $this->statusText;
        }

        function getData() {
            return $this->data;
        }

        function setStatusId($statusId) {
            $this->statusId = $statusId;
        }

        function setStatusText($statusText) {
            $this->statusText = $statusText;
        }

        function setData($data) {
            $this->data = $data;
        }


    }

?>

<?php
    class Canal{
        private $idCanal;
        private $descricao;
        
        
        public function getIdCanal() {
            return $this->idCanal;
        }

        public function setIdCanal($idCanal) {
            $this->idCanal = $idCanal;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

    }

?>

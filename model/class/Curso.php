<?php
    class Curso{
        private $idCurso;
        private $descricao;
        private $idCanal;
        
        public function getIdCurso() {
            return $this->idCurso;
        }

        public function setIdCurso($idCurso) {
            $this->idCurso = $idCurso;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function getIdCanal() {
            return $this->idCanal;
        }

        public function setIdCanal($idCanal) {
            $this->idCanal = $idCanal;
        }

    }

?>

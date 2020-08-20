<?php
    class UsuarioCurso{
        private $idUsuario;
        private $idCurso;
        
        public function getIdUsuario() {
            return $this->idUsuario;
        }

        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }

        public function getIdCurso() {
            return $this->idCurso;
        }

        public function setIdCurso($idCurso) {
            $this->idCurso = $idCurso;
        }
    }

?>

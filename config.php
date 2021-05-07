<?php
    class configuration
    {
        public function connexion()
        {
            return (new pdo("mysql:host=127.0.0.1;dbname=GestionnaireDeProjet","chef","mdpchef"));
        }
    }
?>
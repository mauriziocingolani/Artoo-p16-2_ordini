<?php

class Cliente {

    public static function AggiungiNuovo(array $post) {
        $nome = self::_cleanString($post['nome']);
        $cognome = self::_cleanString($post['cognome']);
        $email = self::_cleanString($post['email']);
        $sqlString = "INSERT INTO clienti(Nome,Cognome,Email)
              VALUES('$nome','$cognome','$email')";
        var_dump($sqlString);
        try {
            $GLOBALS['db']->chiedi($sqlString);
            return true;
        } catch (Exception $e) {
            return 'Errore: ' . $e->getMessage();
        }
    }

    # tutti i clienti ordinati per cognome e poi nome

    public static function Tutti() {
        $sqlString = 'SELECT * FROM clienti ORDER BY Cognome,Nome';
        return $GLOBALS['db']->chiedi($sqlString)->fetch_all(MYSQLI_ASSOC);
    }

    private static function _cleanString($string) {
        return str_replace("'", "''", $string);
    }

}

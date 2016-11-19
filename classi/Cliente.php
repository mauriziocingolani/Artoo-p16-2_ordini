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

    public static function Aggiorna(array $post) {
        $clienteid = $post['clienteid'];
        $nome = self::_cleanString($post['nome']);
        $cognome = self::_cleanString($post['cognome']);
        $email = self::_cleanString($post['email']);
        $sqlString = "UPDATE Clienti " .
                "SET Nome='$nome',Cognome='$cognome',Email='$email' " .
                "WHERE ClienteID=$clienteid ";
        var_dump($sqlString);
        try {
            $GLOBALS['db']->chiedi($sqlString);
            return true;
        } catch (Exception $e) {
            return 'Errore: ' . $e->getMessage();
        }
    }

    /*
     * UPDATE clienti
     * SET Nome='...',Cognome='...'
     * WHERE ClienteID=...
     * 
     */

    # tutti i clienti ordinati per cognome e poi nome

    public static function Tutti() {
        $sqlString = 'SELECT * FROM clienti ORDER BY Cognome,Nome';
        return $GLOBALS['db']->chiedi($sqlString)->fetch_all(MYSQLI_ASSOC);
//        $setRisultati = $GLOBALS['db']->chiedi($sqlString);
//        $records = array();
//        $continua = true;
//        while ($continua) :
//            $record = $setRisultati->fetch_assoc();
//            if ($record != null) :
//                $records[] = $record;
//            else :
//                $continua = false;
//            endif;
//        endwhile;
//        return $records;
    }

    public static function Cerca(array $get) {
        $sqlString = "SELECT * FROM clienti WHERE ClienteID={$get['clienteid']}";
//        $clienti = $GLOBALS['db']->chiedi($sqlString)->fetch_all(MYSQLI_ASSOC);
//        return $clienti[0];
        $cliente = $GLOBALS['db']->chiedi($sqlString)->fetch_assoc();
        return $cliente;
    }

    private static function _cleanString($string) {
        return str_replace("'", "''", $string);
    }

}

<?php

class Persona {

    private $nome;
    private $cognome;
    private $dataDiNascita;
    private $luogoDiNascita;
    private $codiceFiscale;

    public function __construct($nome, $cognome, $dataDiNascita,$luogoDiNascita, $codiceFiscale) {
        
        $this -> setNome($nome);
        $this -> setCognome($cognome);
        $this -> setDataDiNascita($dataDiNascita);
        $this -> setLuogoDiNascita($luogoDiNascita);
        $this -> setCodiceFiscale($codiceFiscale);

    }

    public function getNome() {

        return $this -> nome;

    }

    public function setNome($nome) {

        $this -> nome = $nome;

    }

    public function getCognome() {

        return $this -> cognome;

    }

    public function setCognome($cognome) {

        $this -> cognome = $cognome;

    }

    public function getDataDiNascita() {

        return $this -> dataDiNascita;

    }

    public function setDataDiNascita($dataDiNascita) {

        $this -> dataDiNascita = $dataDiNascita;

    }

    public function getLuogoDiNascita() {

        return $this -> luogoDiNascita;

    }

    public function setLuogoDiNascita($luogoDiNascita) {

        $this -> luogoDiNascita = $luogoDiNascita;

    }

    public function getCodiceFiscale() {

        return $this -> codiceFiscale;

    }

    public function setCodiceFiscale($codiceFiscale) {

        $this -> codiceFiscale = $codiceFiscale;

    }

    public function getHtml() {

        return 
        "<br>" . $this -> getNome() 
        . "<br>" . $this -> getCognome() 
        . "<br>" . $this -> getDataDiNascita() 
        . "<br>" . $this -> getLuogoDiNascita() 
        . "<br>" . $this -> getCodiceFiscale();

    }

}


class Impiegato extends Persona {

    private Stipendio $stipendio;
    private $dataAssunzione;

    public function __construct($nome, $cognome, $dataDiNascita,$luogoDiNascita, $codiceFiscale, Stipendio $stipendio, $dataAssunzione) {

        parent :: __construct($nome, $cognome, $dataDiNascita, $luogoDiNascita, $codiceFiscale);

        $this -> setStipendio($stipendio);
    
        $this -> setDataAssunzione($dataAssunzione);
    }

    public function getStipendio() {

        return $this -> stipendio;
    }
    public function setStipendio($stipendio) {

        $this -> stipendio = $stipendio;
    }
    public function getDataAssunzione() {

        return $this -> dataAssunzione;
    }
    public function setDataAssunzione($dataAssunzione) {

        $this -> dataAssunzione = $dataAssunzione;
    }
    

    public function getHtml() {

        return parent :: getHtml() 
            . "<br>" . $this -> getStipendio() -> getHtml() 
            . "<br>" . $this -> getDataAssunzione()
            . "<br>";
    }
}


class Stipendio {
    
    private $mensile;
    private $tredicesima;
    private $quattordicesima;

    public function __construct($mensile, $tredicesima, $quattordicesima) {

        $this -> setMensile($mensile);
        $this -> setTredicesima($tredicesima);
        $this -> setQuattordicesima($quattordicesima);

    }


    public function getMensile() {

        return $this -> mensile;

    } 

    public function setMensile($mensile) {

        $this -> mensile = $mensile;

    }   

    public function getTredicesima() {

        return $this -> tredicesima;

    } 

    public function setTredicesima($tredicesima) {

        $this -> tredicesima = $tredicesima;

    }

    public function getQuattordicesima() {

        return $this -> quattordicesima;

    } 

    public function setQuattordicesima($quattordicesima) {

        $this -> quattordicesima = $quattordicesima;

    }


    public function getStipendioAnnuale() {

        if ($this -> getTredicesima() == "si" && $this -> getQuattordicesima() == "si") {
            return $this -> getMensile() * 14;
        }
        else {
            if ($this -> getTredicesima() == "no") {
                return $this -> getMensile() * 12;
            }
            else {
                return $this -> getMensile() * 13;
            }
        }

    }


    public function getHtml() {

        return $this -> getMensile()
        . "<br>" . $this -> getTredicesima()
        . "<br>" . $this -> getQuattordicesima()
        . "<br>" . $this -> getStipendioAnnuale();
    }

}

class Capo extends Persona {

    private $dividendo;
    private $bonus;

    public function __construct($nome, $cognome, $dataDiNascita, $luogoDiNascita, $codiceFiscale, $dividendo, $bonus) {

        parent :: __construct($nome, $cognome, $dataDiNascita, $luogoDiNascita, $codiceFiscale);

        $this -> setDividendo($dividendo);
    
        $this -> setBonus($bonus);
    }

    public function getDividendo() {
        return $this -> dividendo;
    }
    public function setDividendo ($dividendo) {
        $this -> dividendo = $dividendo;
    }
    public function getBonus() {
        return $this -> bonus;
    }
    public function setBonus ($bonus) {
        $this -> bonus = $bonus;
    }

    public function getStipendioAnnuale() {
        return $this -> getDividendo() * 12 + $this -> getBonus();
    }

    public function getHtml() {

        return parent :: getHtml() 
            . "<br>" . $this -> getDividendo() 
            . "<br>" . $this -> getBonus()
            . "<br>" . $this -> getStipendioAnnuale()
            . "<br>";
    }
}

$stipendio1 = new Stipendio(1300, "si", "no");

/* echo $stipendio1 -> getHtml(); */

/* $nome, $cognome, $dataDiNascita,$luogoDiNascita, $codiceFiscale, Stipendio $stipendio, $dataAssunzione */

$impiegato1 = new Impiegato("Luigi", "Terzi", "12-05-1983", "Roma", "TRZLGI83E12D325R", $stipendio1, "17-01-2020");

echo $impiegato1 -> getHtml();

/* $nome, $cognome, $dataDiNascita, $luogoDiNascita, $codiceFiscale, $dividendo, $bonus */

$capo1 = new Capo("Giorgio", "Rossi", "13-06-1961", "Milano", "RSSGRG61F13D325R", 1700, 4000);

echo $capo1 -> getHtml();
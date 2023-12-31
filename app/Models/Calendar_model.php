<?php

namespace App\Models;

use CodeIgniter\Model;

class Calendar_model extends Model
{
    protected $table = 'dane_AbsencjeCK';

    //pobieranie danych z bazy danych
    public function getAbsences() {
        $db = \Config\Database::connect(); //podłączenie się do bazy danych

        // daty rok w przód i rok w przód
        $currentDate = strftime("%Y-%m-%d");

        //obliczanie dat do zapytania SQL
        $startDate = date('Y-01-m', strtotime('-1 year', strtotime($currentDate)));
        $endDate = date('Y-t-m', strtotime('+1 year', strtotime($currentDate)));
        
        return $this->db->table($this->table)
            ->select('imie, nazwisko, dataOd, dataDo, grupaAbsencji')
            ->where('dataOd >=', $startDate) //2022-09-01
            ->where('dataOd <=', $endDate) //2023-10-31
            ->where('dataDo >=', $startDate) //2022-09-01
            ->where('dataDo <=', $endDate) //2023-10-31
            //->orderBy('dataOd', 'ASC')
            ->orderBy('nazwisko', 'ASC')
            ->get()
            ->getResult();
    }

    public function getAbsencesByDate($year, $month) {

        $db = \Config\Database::connect();

        $selectedDate = $year . '-' . $month . '-01';
        
        $startDate = date('Y-01-m', strtotime('-1 year', strtotime($selectedDate)));
        $endDate = date('Y-t-m', strtotime('+1 year', strtotime($selectedDate)));
    

        //Zapytanie do bazy danych, aby pobrać wydarzenia w określonym zakresie dat
        return $this->db->table($this->table)
            ->select('imie, nazwisko, dataOd, dataDo, grupaAbsencji')
            ->where('dataOd >=', $startDate)
            ->where('dataOd <=', $endDate)
            ->where('dataDo >=', $startDate)
            ->where('dataDo <=', $endDate)
            ->orderBy('dataOd', 'ASC')
            ->get()
            ->getResult();
    }

    public function getAbsencesByFullName($name, $surname) {

        $db = \Config\Database::connect();

       // daty rok w przód i rok w przód
       $currentDate = strftime("%Y-%m-%d");

       //obliczanie dat do zapytania SQL
       $startDate = date('Y-01-m', strtotime('-1 year', strtotime($currentDate)));
       $endDate = date('Y-t-m', strtotime('+1 year', strtotime($currentDate)));

        //Zapytanie do bazy danych, z użyciem pełnego imienia i nazwiska
        return $this->db->table($this->table)
            ->select('imie, nazwisko, dataOd, dataDo, grupaAbsencji')
            ->where('dataOd >=', $startDate)
            ->where('dataOd <=', $endDate)
            ->where('dataDo >=', $startDate)
            ->where('dataDo <=', $endDate)
            ->where('imie =', $name)
            ->where('nazwisko =', $surname)
            ->orderBy('dataOd', 'ASC')
            ->get()
            ->getResult();
    }

    public function getAbsencesByName($name) {

        $db = \Config\Database::connect();

       // daty rok w przód i rok w przód
       $currentDate = strftime("%Y-%m-%d");

       //obliczanie dat do zapytania SQL
       $startDate = date('Y-01-m', strtotime('-1 year', strtotime($currentDate)));
       $endDate = date('Y-t-m', strtotime('+1 year', strtotime($currentDate)));

        //Wykonaj zapytanie do bazy danych, z użyciem imienia
        return $this->db->table($this->table)
            ->select('imie, nazwisko, dataOd, dataDo, grupaAbsencji')
            ->where('dataOd >=', $startDate)
            ->where('dataOd <=', $endDate)
            ->where('dataDo >=', $startDate)
            ->where('dataDo <=', $endDate)
            ->where('imie =', $name)
            ->orderBy('dataOd', 'ASC')
            ->get()
            ->getResult();
    }

    public function getAbsencesBySurname($surname) {

        $db = \Config\Database::connect();

       // daty rok w przód i rok w przód
       $currentDate = strftime("%Y-%m-%d");

       //obliczanie dat do zapytania SQL
       $startDate = date('Y-01-m', strtotime('-1 year', strtotime($currentDate)));
       $endDate = date('Y-t-m', strtotime('+1 year', strtotime($currentDate)));

        //Wykonaj zapytanie do bazy danych, z użyciem nazwiska
        return $this->db->table($this->table)
            ->select('imie, nazwisko, dataOd, dataDo, grupaAbsencji')
            ->where('dataOd >=', $startDate)
            ->where('dataOd <=', $endDate)
            ->where('dataDo >=', $startDate)
            ->where('dataDo <=', $endDate)
            ->where('nazwisko =', $surname)
            ->orderBy('dataOd', 'ASC')
            ->get()
            ->getResult();
    }
}
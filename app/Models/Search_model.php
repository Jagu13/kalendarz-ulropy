<?php

namespace App\Models;

use CodeIgniter\Model;

class Search_model extends Model
{
    // protected $table = 'dane_AbsencjeCK';

    // //pobieranie danych z bazy danych
    // public function getAbsences()
    // {
    //     $db = \Config\Database::connect(); //podłączenie się do bazy danych

    //     // daty rok w przód i rok w przód
    //     $currentDate = strftime("%Y-%m-%d");
        
    //     $startDate = date('Y-01-m', strtotime('-1 years', strtotime($currentDate)));
    //     $endDate = date('Y-t-m', strtotime('+1 month', strtotime($currentDate)));
        
    //     // echo $currentDate .'<br>';
    //     // echo $startDate .'<br>';
    //     // echo $endDate;

    //     return $this->db->table($this->table)
    //         ->select('imie, nazwisko, dataOd, dataDo, grupaAbsencji')
    //         ->where('dataOd >=', $startDate) //2022-09-01
    //         ->where('dataOd <=', $endDate) //2023-10-31
    //         ->where('dataDo >=', $startDate) //2022-09-01
    //         ->where('dataDo <=', $endDate) //2023-10-31
    //         ->orderBy('dataOd', 'ASC')
    //         ->get()
    //         ->getResult();
    // }
}

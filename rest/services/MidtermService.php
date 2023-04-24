<?php
require_once __DIR__."/../dao/MidtermDao.php";

class MidtermService {
    protected $dao;

    public function __construct(){
        $this->dao = new MidtermDao();
    }

    /** TODO
    * Implement service method to return detailed cap-table
    */
    public function cap_table(){
        return $this->dao->cap_table();
    }

    /** TODO
    * Implement service method to return cap-table summary
    */
    public function summary(){
        return $this->dao->summary();
    }

    /** TODO
    * Implement service method to return list of investors with their total shares amount
    */
    public function investors(){
        return $this->dao->investors();
    }
}
?>

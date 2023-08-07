<?php
include ("model/company.php");

class repoCompany {

    function getCompany() : array {
        $con = DBConnection::getInstance()->getConnection();
        $query = $con->query("SELECT * FROM company WHERE company_id = 1");
        $arr = array();
        if($query->num_rows > 0){
            while ($row = $query->fetch_assoc()){
                $arr += $row;
            }
        }else {
            return array();
        }
        return $arr;
    }

    function getNumOfRows() : int {
        $con = DBConnection::getInstance()->getConnection();
        return $con->query("SELECT * FROM company")->num_rows;
    }

    function updateCompany(company $company) : bool {
        $con = DBConnection::getInstance()->getConnection();
        $name = $company->getCompanyName();
        $email = $company->getCompanyEmail();
        $id = 1;
        $query = $con->prepare("UPDATE company set company_name = ?, company_email = ? WHERE company_id = ?");
        $query->bind_param("ssi", $name, $email, $id);
        return $query->execute();
    }

    function updateCompanyLogo(company $company) : bool {
        $con = DBConnection::getInstance()->getConnection();
        $logo = $company->getCompanyLogo();
        $id = 1;
        $query = $con->prepare("UPDATE company set company_logo = ? WHERE company_id = ?");
        $query->bind_param("si", $logo, $id);
        return $query->execute();
    }
}
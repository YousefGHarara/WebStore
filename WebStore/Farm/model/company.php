<?php


class company {
    private $company_id;
    private $company_name;
    private $company_email;
    private $company_logo;
    private $creation_date;



    function setCompanyId(string $company_id) {
        $this->company_id = $company_id;
    }
    
    function getCompanyId() : int {
        return $this->company_id;
    }

    function setCompanyName(string $company_name) {
        $this->company_name = $company_name;
    }
    
    function getCompanyName() : string {
        return $this->company_name;
    }

    function setCompanyEmail(string $company_email) {
        $this->company_email = $company_email;
    }
    
    function getCompanyEmail() : string {
        return $this->company_email;
    }

    function setCompanyLogo(string $company_logo) {
        $this->company_logo = $company_logo;
    }
    
    function getCompanyLogo() : string {
        return $this->company_logo;
    }

    function setCreationDate(string $creation_date) {
        $this->creation_date = $creation_date;
    }
    
    function getCreationDate() : string {
        return $this->creation_date;
    }


}
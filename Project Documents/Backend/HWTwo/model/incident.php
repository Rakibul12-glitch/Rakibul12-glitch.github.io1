<?php
class Incident{
    private $incidentID;
    private $customerID;
    private $productCode;
    private $techID;
    private $dateOpened;
    private $dateClosed;
    private $title;
    private $description;
    
    function getIncidentID() {
        return $this->incidentID;
    }

    function getCustomerID() {
        return $this->customerID;
    }

    function getProductCode() {
        return $this->productCode;
    }

    function getTechID() {
        return $this->techID;
    }

    function getDateOpened() {
        return $this->dateOpened;
    }

    function getDateClosed() {
        return $this->dateClosed;
    }

    function getTitle() {
        return $this->title;
    }

    function getDescription() {
        return $this->description;
    }

    function setIncidentID($incidentID) {
        $this->incidentID = $incidentID;
    }

    function setCustomerID($customerID) {
        $this->customerID = $customerID;
    }

    function setProductCode($productCode) {
        $this->productCode = $productCode;
    }

    function setTechID($techID) {
        $this->techID = $techID;
    }

    function setDateOpened($dateOpened) {
        $this->dateOpened = $dateOpened;
    }

    function setDateClosed($dateClosed) {
        $this->dateClosed = $dateClosed;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setDescription($description) {
        $this->description = $description;
    }
}
?>

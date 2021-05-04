<?php
class Product{
    private $productCode;
    private $name;
    private $version;
    private $releaseDate;
    function getProductCode() {
        return $this->productCode;
    }

    function getName() {
        return $this->name;
    }

    function getVersion() {
        return $this->version;
    }

    function getReleaseDate() {
        return $this->releaseDate;
    }

    function setProductCode($productCode) {
        $this->productCode = $productCode;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setVersion($version) {
        $this->version = $version;
    }

    function setReleaseDate($releaseDate) {
        $this->releaseDate = $releaseDate;
    }
}
?>


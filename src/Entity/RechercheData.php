<?php


namespace App\Entity;


class RechercheData {
    
    private $surfaceMax;
    
    private $surfaceMin;
    
    private $priceMax;
    
    private $priceMin;
    
    private $roomMax;
    
    private $roomMin;
    
    function getSurfaceMax() {
        return $this->surfaceMax;
    }

    function getSurfaceMin() {
        return $this->surfaceMin;
    }

    function getPriceMax() {
        return $this->priceMax;
    }

    function getPriceMin() {
        return $this->priceMin;
    }

    function getRoomMax() {
        return $this->roomMax;
    }

    function getRoomMin() {
        return $this->roomMin;
    }

    function setSurfaceMax($surfaceMax) {
        $this->surfaceMax = $surfaceMax;
    }

    function setSurfaceMin($surfaceMin) {
        $this->surfaceMin = $surfaceMin;
    }

    function setPriceMax($priceMax) {
        $this->priceMax = $priceMax;
    }

    function setPriceMin($priceMin) {
        $this->priceMin = $priceMin;
    }

    function setRoomMax($roomMax) {
        $this->roomMax = $roomMax;
    }

    function setRoomMin($roomMin) {
        $this->roomMin = $roomMin;
    }


}

<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;


class RechercheData {
    
        private $surfaceMax;
    
    private $surfaceMin;
    
    private $priceMax;
    
    private $priceMin;
    
    private $roomMax;
    
    private $roomMin;
    
    /**
     *
     * @var ArrayCollection 
     */
    
    private $options;
    
    public function __construct() {
        $this->options = new ArrayCollection();
    }
    
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
    
    function getOptions(): ArrayCollection {
        return $this->options;
    }

    function setOptions(ArrayCollection $options) {
        $this->options = $options;
    }


}

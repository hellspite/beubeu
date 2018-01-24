<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExhibitRepository")
 */
class Exhibit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @ORM\Column(type="string", length=250) 
    */
    private $title;

    /**
    * @ORM\Column(type="string", length=250) 
    */
    private $image;

    /**
    * @ORM\Column(type="text") 
    */
    private $description;

    /**
    * @ORM\Column(type="integer") 
    */
    private $year;

    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getImage(){
        return $this->image;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function getYear(){
        return $this->year;
    }

    public function setYear($year){
        $this->year = $year;
    }
}

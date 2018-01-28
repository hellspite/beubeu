<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PerformanceRepository")
 */
class Performance
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
    * @ORM\Column(type="datetime") 
    */
    private $when;

    /**
    * @Gedmo\Slug(fields={"title"})
    * @ORM\Column(length=300, unique=true)
    */
    private $slug;

    /**
    * @Gedmo\Timestampable(on="create")
    * @ORM\Column(type="datetime")
    */
    private $created;

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

    public function getWhen(){
        return $this->when;
    }

    public function setWhen($when){
        $this->when = $when;
    }

    public function getSlug(){
        return $this->slug;
    }

    public function getCreated(){
        return $this->created;
    }
}

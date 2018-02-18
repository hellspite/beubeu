<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarouselRepository")
 * @Vich\Uploadable
 */
class Carousel
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
    private $image;

    /**
    * @Vich\UploadableField(mapping="exhibit_images", fileNameProperty="image")
    * @var File
    */
    private $imageFile;

    /**
    * @Gedmo\Timestampable(on="create")
    * @ORM\Column(type="datetime")
    */
    private $created;

    /**
    * @ORM\Column(type="datetime", nullable=true)
    * @var \DateTime
    */
    private $updated;

    public function getId(){
        return $this->id;
    }

    public function getImage(){
        return $this->image;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function getImageFile(){
        return $this->imageFile;
    }

    public function setImageFile(File $image = null){
        $this->imageFile = $image;

        if($image){
            $this->updated = new \DateTime('now');
        }
    }

    public function getCreated(){
        return $this->created;
    }
}

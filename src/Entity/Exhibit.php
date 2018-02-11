<?php

namespace App\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Entity\News;
use Doctrine\ORM\Mapping as ORM;
use  Doctrine\ORM\EntityManagerInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExhibitRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable
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
    * @Vich\UploadableField(mapping="exhibit_images", fileNameProperty="image")
    * @var File
    */
    private $imageFile;

    /**
    * @ORM\Column(type="text") 
    */
    private $description;

    /**
    * @ORM\Column(type="integer") 
    */
    private $year;

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

    /**
    * @ORM\Column(type="datetime", nullable=true)
    * @var \DateTime
    */
    private $updated;

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

    public function getImageFile(){
        return $this->imageFile;
    }

    public function setImageFile(File $image = null){
        $this->imageFile = $image;

        if($image){
            $this->updated = new \DateTime('now');
        }
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

    public function getSlug(){
        return $this->slug;
    }

    public function getCreated(){
        return $this->created;
    }

    /**
    * @ORM\PostPersist
    */
    public function createNews($args){

        $em = $args->getEntityManager();
        $news = new News();    
        $news->setSourceId($this->getId());
        $news->setSource('Exhibit');

        $em->persist($news);
        $em->flush();


    }
}

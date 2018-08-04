<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Entity\News;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StreetRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable
 */
class Street
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
    * @Vich\UploadableField(mapping="street_images", fileNameProperty="image")
    * @var File
    */
    private $imageFile;

    /**
    * @ORM\Column(type="text") 
    */
    private $description;

    /**
    * @ORM\Column(type="datetime") 
    */
    private $whendate;

    /**
    * @Gedmo\Slug(fields={"title"})
    * @ORM\Column(length=300, unique=true)
    */
    private $slug;

    /**
    * @ORM\Column(type="string", length=250, nullable=true)
    */
    private $gallery1;

    /**
    * @Vich\UploadableField(mapping="street_images", fileNameProperty="gallery1")
    * @var File
    */
    private $gallery1File;

    /**
    * @ORM\Column(type="string", length=250, nullable=true) 
    */
    private $gallery2;

    /**
    * @Vich\UploadableField(mapping="street_images", fileNameProperty="gallery2")
    * @var File
    */
    private $gallery2File;

    /**
    * @ORM\Column(type="string", length=250, nullable=true) 
    */
    private $gallery3;

    /**
    * @Vich\UploadableField(mapping="street_images", fileNameProperty="gallery3")
    * @var File
    */
    private $gallery3File;

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

    public function getWhendate(){
        return $this->whendate;
    }

    public function setWhendate($whendate){
        $this->whendate = $whendate;
    }

    public function getSlug(){
        return $this->slug;
    }

    public function getGallery1(){
        return $this->gallery1;
    }

    public function setGallery1($gallery1){
        $this->gallery1 = $gallery1;
    }

    public function setGallery1File(File $gallery1 = null){
        $this->gallery1File = $gallery1;

        if($gallery1){
            $this->updated = new \DateTime('now');
        }
    }

    public function getGallery1File(){
        return $this->gallery1File;
    }

    public function getGallery2(){
        return $this->gallery2;
    }

    public function setGallery2($gallery2){
        $this->gallery2 = $gallery2;
    }

    public function setGallery2File(File $gallery2 = null){
        $this->gallery2File = $gallery2;

        if($gallery2){
            $this->updated = new \DateTime('now');
        }
    }

    public function getGallery2File(){
        return $this->gallery2File;
    }

    public function getGallery3(){
        return $this->gallery3;
    }

    public function setGallery3($gallery3){
        $this->gallery3 = $gallery3;
    }

    public function setGallery3File(File $gallery3 = null){
        $this->gallery3File = $gallery3;

        if($gallery3){
            $this->updated = new \DateTime('now');
        }
    }

    public function getGallery3File(){
        return $this->gallery3File;
    }

    public function getCreated(){
        return $this->created;
    }

    /**
    * @ORM\PostPersist
    */
    public function createNews($args){

        if($this->getWhendate()->format("Y") == date("Y")){
            $em = $args->getEntityManager();
            $news = new News();    
            $news->setSourceId($this->getId());
            $news->setSource('Street');

            $em->persist($news);
            $em->flush();
        }
    }

    /**
    * @ORM\PreRemove
    */
    public function deleteNews($args){
        $em = $args->getEntityManager();
        $news = $em->getRepository(News::class)->findOneBySourceId($this->getId(), 'Street');

        if($news){
            $em->remove($news);
            $em->flush();    
        }
    }
}

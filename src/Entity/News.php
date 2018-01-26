<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsRepository")
 */
class News
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @ORM\Column(type="integer")
    */
    private $sourceId;

    /**
    * @ORM\Column(type="string", length=250)
    */
    private $source;

    public function setSourceId($sourceId){
        $this->sourceId = $sourceId;
    }

    public function getSourceId(){
        return $this->sourceId;
    }

    public function setSource($source){
        $this->source = $source;
    }

    public function getSource(){
        return $this->source;
    }
}

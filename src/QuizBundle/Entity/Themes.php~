<?php

namespace QuizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Themes
 *
 * @ORM\Table(name="themes", indexes={
 *     @Index(name="id_cat", columns={"id_cat"})
 * })
 * @ORM\Entity(repositoryClass="QuizBundle\Repository\ThemesRepository")
 *
 * @Vich\Uploadable
 */
class Themes
{

    /**
     * @var Categories $category
     * @ORM\ManyToOne(targetEntity="Categories", inversedBy="theme")
     * @ORM\JoinColumn(name="id_cat", referencedColumnName="id")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="Questions", mappedBy="theme")
     */
    private $question;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="img", type="text")
     */
    private $img;

    /**
     * @var File
     * @Vich\UploadableField(mapping="theme_images", fileNameProperty="img")
     */
    private $imgFile;

    /**
     * @var int
     *
     * @ORM\Column(name="id_cat", type="integer")
     */
    private $id_cat;

    /**
     * @var int
     *
     * @ORM\Column(name="is_published", type="boolean", options={"default":true})
     */
    private $isPublished;

    /**
     * @var \DateTime
     * @ORM\Column(name="update_at", type="datetime")
     */
    private $updateAt;

    public $photo;
 
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Themes
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set id_cat
     *
     * @param integer $idCat
     * @return Themes
     */
    public function setIdCat($idCat)
    {
        $this->id_cat = $idCat;

        return $this;
    }

    /**
     * Get id_cat
     *
     * @return integer 
     */
    public function getIdCat()
    {
        return $this->id_cat;
    }

    /**
     * Set category
     *
     * @param \QuizBundle\Entity\Categories $category
     * @return Themes
     */
    public function setCategory(\QuizBundle\Entity\Categories $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \QuizBundle\Entity\Categories 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set img
     *
     * @param string $img
     * @return Themes
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string 
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param File|null $img
     */
    public function setImgFile(File $img = null)
    {
        $this->imgFile = $img;

        if ($img) {
            $this->updateAt = new \DateTime('now');
        }
    }

    /**
     * @return File
     */
    public function getImgFile()
    {
        return $this->imgFile;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->question = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add question
     *
     * @param \QuizBundle\Entity\Questions $question
     * @return Themes
     */
    public function addQuestion(\QuizBundle\Entity\Questions $question)
    {
        $this->question[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \QuizBundle\Entity\Questions $question
     */
    public function removeQuestion(\QuizBundle\Entity\Questions $question)
    {
        $this->question->removeElement($question);
    }

    /**
     * Get question
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Converte object in string
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Set the image path for BackEnd
     * @return string
     */
    public function getPhotoPath() {
        return '/img/Affiche_theme/' . $this->getImg() . $this->photo;
    }

    /**
     * Set updateAt
     *
     * @param \DateTime $updateAt
     * @return Themes
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime 
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }


    /**
     * Set isPublished
     *
     * @param boolean $isPublished
     * @return Themes
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    /**
     * Get isPublished
     *
     * @return boolean 
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }
}

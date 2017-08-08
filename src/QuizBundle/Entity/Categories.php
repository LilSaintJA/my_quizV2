<?php

namespace QuizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="QuizBundle\Repository\CategoriesRepository")
 * @Vich\Uploadable
 */
class Categories
{

    /**
     * @var Themes $theme
     * @ORM\OneToMany(targetEntity="Themes", mappedBy="category")
     */
    private $theme;

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
     *
     * @ORM\Column(name="img", type="text")
     */
    private $img;

    /**
     * @Vich\UploadableField(mapping="category_images", fileNameProperty="img")
     * @var File
     */
    private $imgFile;

    /**
     * @var int
     *
     * @ORM\Column(name="is_published", type="boolean", options={"default":true})
     */
    private $isPublished;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

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
     * @return Categories
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
     * @param File|null $img
     */
    public function setImgFile(File $img = null)
    {
        $this->imgFile = $img;

        if ($img) {
            $this->updatedAt = new \DateTime('now');
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
     * Set img
     *
     * @param string $img
     * @return Categories
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
     * Constructor
     */
    public function __construct()
    {
        $this->theme = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add theme
     *
     * @param \QuizBundle\Entity\Themes $theme
     * @return Categories
     */
    public function addTheme(\QuizBundle\Entity\Themes $theme)
    {
        $this->theme[] = $theme;

        return $this;
    }

    /**
     * Remove theme
     *
     * @param \QuizBundle\Entity\Themes $theme
     */
    public function removeTheme(\QuizBundle\Entity\Themes $theme)
    {
        $this->theme->removeElement($theme);
    }

    /**
     * Get theme
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set the image path for BackEnd
     * @return string
     */
    public function getPathPhoto() {
        return '/img/' . $this->getImg() . $this->photo;
    }


    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Categories
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    

    /**
     * Set isPublished
     *
     * @param boolean $isPublished
     * @return Categories
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

    /**
     * Converte Object in string
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}

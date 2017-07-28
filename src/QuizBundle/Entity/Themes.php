<?php

namespace QuizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Themes
 *
 * @ORM\Table(name="themes", indexes={
 *     @Index(name="id_cat", columns={"id_cat"})
 * })
 * @ORM\Entity(repositoryClass="QuizBundle\Repository\ThemesRepository")
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
     * @var Questions $question
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(name="img", type="text")
     */
    private $img;

    /**
     * @var int
     *
     * @ORM\Column(name="id_cat", type="integer")
     */
    private $id_cat;


 
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
     * Set nom
     *
     * @param string $nom
     * @return Themes
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
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

//    public function __toString()
//    {
//        return $this->get;
//    }
}

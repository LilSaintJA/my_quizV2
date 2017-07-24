<?php

namespace QuizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Questions
 *
 * @ORM\Table(name="questions")
 * @ORM\Entity(repositoryClass="QuizBundle\Repository\QuestionsRepository")
 */
class Questions
{
    /**
     * @var Themes $theme
     * @ORM\ManyToOne(targetEntity="Themes", inversedBy="questions")
     * @ORM\JoinColumn(name="id_theme", referencedColumnName="id")
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
     * @ORM\Column(name="questions", type="text")
     */
    private $questions;

    /**
     * @var int
     *
     * @ORM\Column(name="id_theme", type="integer")
     */
    private $idTheme;


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
     * Set questions
     *
     * @param string $questions
     * @return Questions
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;

        return $this;
    }

    /**
     * Get questions
     *
     * @return string 
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Set idTheme
     *
     * @param integer $idTheme
     * @return Questions
     */
    public function setIdTheme($idTheme)
    {
        $this->idTheme = $idTheme;

        return $this;
    }

    /**
     * Get idTheme
     *
     * @return integer 
     */
    public function getIdTheme()
    {
        return $this->idTheme;
    }

    /**
     * Set theme
     *
     * @param \QuizBundle\Entity\Themes $theme
     * @return Questions
     */
    public function setTheme(\QuizBundle\Entity\Themes $theme = null)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return \QuizBundle\Entity\Themes 
     */
    public function getTheme()
    {
        return $this->theme;
    }
//
//    public function __toString()
//    {
//        return $this->theme->getNom();
//    }
}

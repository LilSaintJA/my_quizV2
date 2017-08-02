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
     * @ORM\ManyToOne(targetEntity="Themes", inversedBy="question")
     * @ORM\JoinColumn(name="id_theme", referencedColumnName="id")
     */
    private $theme;

    /**
     * @var Answers $answer
     * @ORM\OneToMany(targetEntity="Answers", mappedBy="question")
     */
    private $answer;

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
     * @ORM\Column(name="statement", type="string")
     */
    private $statement;

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
     * Set statement
     *
     * @param string $statement
     * @return Questions
     */
    public function setStatement($statement)
    {
        $this->statement = $statement;

        return $this;
    }

    /**
     * Get statement
     *
     * @return string
     */
    public function getStatement()
    {
        return $this->statement;
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

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answer = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add answer
     *
     * @param \QuizBundle\Entity\Answers $answer
     * @return Questions
     */
    public function addAnswer(\QuizBundle\Entity\Answers $answer)
    {
        $this->answer[] = $answer;

        return $this;
    }

    /**
     * Remove answer
     *
     * @param \QuizBundle\Entity\Answers $answer
     */
    public function removeAnswer(\QuizBundle\Entity\Answers $answer)
    {
        $this->answer->removeElement($answer);
    }

    /**
     * Get answer
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    public function __toString()
    {
        return $this->getStatement();
    }

}

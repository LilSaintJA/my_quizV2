<?php

namespace QuizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Responses
 *
 * @ORM\Table(name="responses")
 * @ORM\Entity(repositoryClass="QuizBundle\Repository\ResponsesRepository")
 */
class Responses
{

    /**
     * @var Questions $question
     * @ORM\ManyToOne(targetEntity="Questions", inversedBy="reponse")
     * @ORM\JoinColumn(name="id_question", referencedColumnName="id")
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
     * @var int
     *
     * @ORM\Column(name="id_question", type="integer")
     */
    private $idQuestion;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="boolean", options={"default":false})
     */
    private $status;


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
     * @return Responses
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
     * Set idQuestion
     *
     * @param integer $idQuestion
     * @return Responses
     */
    public function setIdQuestion($idQuestion)
    {
        $this->idQuestion = $idQuestion;

        return $this;
    }

    /**
     * Get idQuestion
     *
     * @return integer 
     */
    public function getIdQuestion()
    {
        return $this->idQuestion;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Responses
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set question
     *
     * @param \QuizBundle\Entity\Questions $question
     * @return Responses
     */
    public function setQuestion(\QuizBundle\Entity\Questions $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \QuizBundle\Entity\Questions 
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
        return $this->getNom();
    }
}

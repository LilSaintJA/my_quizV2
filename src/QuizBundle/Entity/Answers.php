<?php

namespace QuizBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Answers
 *
 * @ORM\Table(name="answers")
 * @ORM\Entity(repositoryClass="QuizBundle\Repository\AnswersRepository")
 */
class Answers
{

    /**
     * @var Questions $question
     * @ORM\ManyToOne(targetEntity="Questions", inversedBy="answer")
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
     * @ORM\Column(name="statement", type="string", length=255)
     */
    private $statement;

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
     * Set statement
     *
     * @param string $statement
     * @return Answers
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
     * Set idQuestion
     *
     * @param integer $idQuestion
     * @return Answers
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
     * @return Answers
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
     * @return Answers
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
        return $this->getStatement();
    }

}

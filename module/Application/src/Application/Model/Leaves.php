<?php

namespace Application\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="leaves")
 * @ORM\Entity
 */
class Leaves extends Entity
{
    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    protected $employee;


    public function getEmployee()
    {
        return $this->employee;
    }

    public function setEmployee($emp)
    {
        $this->employee = $emp;
    }
    /**
     * @ORM\Column(type="date", length=100)
     * @var string
     */
    protected $date;


    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    protected $type;


    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    protected $days;


    public function getDays()
    {
        return $this->days;
    }

    public function setDays($days)
    {
        $this->days = $days;
    }
    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    protected $status;


    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }


    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    protected $comments;

    public function getComments()
    {
        return $this->comments;
    }

    public function setComments($comments)
    {
        $this->comments = $comments;
    }
}
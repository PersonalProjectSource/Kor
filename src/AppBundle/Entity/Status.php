<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Status
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repositories\StatusRepository")
 */
class Status
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Appointment", mappedBy="status")
     */
    protected $appointments;

    public function __construct()
    {
        $this->appointments = new ArrayCollection();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="appointmentLabel", type="string", length=100)
     */
    private $appointmentLabel;


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
     * Set appointmentLabel
     *
     * @param string $appointmentLabel
     * @return Status
     */
    public function setAppointmentLabel($appointmentLabel)
    {
        $this->appointmentLabel = $appointmentLabel;

        return $this;
    }

    /**
     * Get appointmentLabel
     *
     * @return string 
     */
    public function getAppointmentLabel()
    {
        return $this->appointmentLabel;
    }

    /**
     * Transforme un objet en array
     * Methode devant obligatoirement etre surchargée par les classes filles.
     */
    public function spawnInArray() {
        foreach ($this as $sAttribName => $mAttribValue) {
            if (!is_object($mAttribValue)) {
                $aProduit[$sAttribName] = $mAttribValue;
            }
        }
        return $aProduit;
    }
}

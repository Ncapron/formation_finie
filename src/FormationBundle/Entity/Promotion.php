<?php

namespace FormationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promotion
 */
class Promotion
{
    public function __toString()
    {
        return $this->getTitre();
    }

    public $file;

    protected function getUploadDir()
    {
        return 'uploads/promotion';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->logo ? null : $this->getUploadDir().'/'.$this->logo;
    }

    public function getAbsolutePath()
    {
        return null === $this->logo ? null : $this->getUploadRootDir() . '/' . $this->logo;
    }

    /**
     * @ORM\PrePersist
     */
    public function preUpload()
    {
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->logo = uniqid().'.'.$this->file->guessExtension();
        }
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PrePersist
     */
    public function setExpiresAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PostPersist
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->logo);

        unset($this->file);
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    //generate
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $logo;

    /**
     * @var string
     */
    private $nomForm;

    /**
     * @var string
     */
    private $prenomForm;

    /**
     * @var string
     */
    private $semaines;

    /**
     * @var \DateTime
     */
    private $dateDeb;

    /**
     * @var \DateTime
     */
    private $dateFin;

    /**
     * @var \FormationBundle\Entity\Module
     */
    private $module;


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
     * Set titre
     *
     * @param string $titre
     * @return Promotion
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Promotion
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set nomForm
     *
     * @param string $nomForm
     * @return Promotion
     */
    public function setNomForm($nomForm)
    {
        $this->nomForm = $nomForm;

        return $this;
    }

    /**
     * Get nomForm
     *
     * @return string 
     */
    public function getNomForm()
    {
        return $this->nomForm;
    }

    /**
     * Set prenomForm
     *
     * @param string $prenomForm
     * @return Promotion
     */
    public function setPrenomForm($prenomForm)
    {
        $this->prenomForm = $prenomForm;

        return $this;
    }

    /**
     * Get prenomForm
     *
     * @return string 
     */
    public function getPrenomForm()
    {
        return $this->prenomForm;
    }

    /**
     * Set semaines
     *
     * @param string $semaines
     * @return Promotion
     */
    public function setSemaines($semaines)
    {
        $this->semaines = $semaines;

        return $this;
    }

    /**
     * Get semaines
     *
     * @return string 
     */
    public function getSemaines()
    {
        return $this->semaines;
    }

    /**
     * Set dateDeb
     *
     * @param \DateTime $dateDeb
     * @return Promotion
     */
    public function setDateDeb($dateDeb)
    {
        $this->dateDeb = $dateDeb;

        return $this;
    }

    /**
     * Get dateDeb
     *
     * @return \DateTime 
     */
    public function getDateDeb()
    {
        return $this->dateDeb;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Promotion
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set module
     *
     * @param \FormationBundle\Entity\Module $module
     * @return Promotion
     */
    public function setModule(\FormationBundle\Entity\Module $module = null)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return \FormationBundle\Entity\Module 
     */
    public function getModule()
    {
        return $this->module;
    }
    /**
     * @var \FormationBundle\Entity\Langage
     */
    private $langage;

    /**
     * @var \FormationBundle\Entity\Intervenant
     */
    private $intervenant;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $eleve;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->eleve = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set langage
     *
     * @param \FormationBundle\Entity\Langage $langage
     * @return Promotion
     */
    public function setLangage(\FormationBundle\Entity\Langage $langage = null)
    {
        $this->langage = $langage;

        return $this;
    }

    /**
     * Get langage
     *
     * @return \FormationBundle\Entity\Langage 
     */
    public function getLangage()
    {
        return $this->langage;
    }

    /**
     * Set intervenant
     *
     * @param \FormationBundle\Entity\Intervenant $intervenant
     * @return Promotion
     */
    public function setIntervenant(\FormationBundle\Entity\Intervenant $intervenant = null)
    {
        $this->intervenant = $intervenant;

        return $this;
    }

    /**
     * Get intervenant
     *
     * @return \FormationBundle\Entity\Intervenant 
     */
    public function getIntervenant()
    {
        return $this->intervenant;
    }

    /**
     * Add eleve
     *
     * @param \FormationBundle\Entity\Eleve $eleve
     * @return Promotion
     */
    public function addEleve(\FormationBundle\Entity\Eleve $eleve)
    {
        $this->eleve[] = $eleve;

        return $this;
    }

    /**
     * Remove eleve
     *
     * @param \FormationBundle\Entity\Eleve $eleve
     */
    public function removeEleve(\FormationBundle\Entity\Eleve $eleve)
    {
        $this->eleve->removeElement($eleve);
    }

    /**
     * Get eleve
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEleve()
    {
        return $this->eleve;
    }
}

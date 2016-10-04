<?php

namespace FormationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eleve
 */
class Eleve
{

    public function __toString()
    {
        return $this->getNom();
    }

    //generate
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;


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
     * @return Eleve
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
     * @var string
     */
    private $logo;

    /**
     * @var string
     */
    private $adresse;

    /**
     * @var integer
     */
    private $cp;

    /**
     * @var string
     */
    private $ville;

    /**
     * @var integer
     */
    private $tel;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var \DateTime
     */
    private $datenaissance;


    /**
     * Set logo
     *
     * @param string $logo
     * @return Eleve
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
     * Set adresse
     *
     * @param string $adresse
     * @return Eleve
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     * @return Eleve
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return integer 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Eleve
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set tel
     *
     * @param integer $tel
     * @return Eleve
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return integer 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Eleve
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set datenaissance
     *
     * @param \DateTime $datenaissance
     * @return Eleve
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    /**
     * Get datenaissance
     *
     * @return \DateTime 
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $promotion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->promotion = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add promotion
     *
     * @param \FormationBundle\Entity\Promotion $promotion
     * @return Eleve
     */
    public function addPromotion(\FormationBundle\Entity\Promotion $promotion)
    {
        $this->promotion[] = $promotion;

        return $this;
    }

    /**
     * Remove promotion
     *
     * @param \FormationBundle\Entity\Promotion $promotion
     */
    public function removePromotion(\FormationBundle\Entity\Promotion $promotion)
    {
        $this->promotion->removeElement($promotion);
    }

    /**
     * Get promotion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPromotion()
    {
        return $this->promotion;
    }
}

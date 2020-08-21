<?php


namespace App\Entity;


class Search
{
  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $ipp;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $episode;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $prenom;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $nom;

  /**
   * @ORM\Column(type="datetime", length=255, nullable=true)
   */
  private $dateNaissance;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $referent;

  /**
   * @return mixed
   */
  public function getIpp()
  {
    return $this->ipp;
  }

  /**
   * @param mixed $ipp
   * @return Search
   */
  public function setIpp($ipp)
  {
    $this->ipp = $ipp;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getEpisode()
  {
    return $this->episode;
  }

  /**
   * @param mixed $episode
   * @return Search
   */
  public function setEpisode($episode)
  {
    $this->episode = $episode;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getPrenom()
  {
    return $this->prenom;
  }

  /**
   * @param mixed $prenom
   * @return Search
   */
  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getNom()
  {
    return $this->nom;
  }

  /**
   * @param mixed $nom
   * @return Search
   */
  public function setNom($nom)
  {
    $this->nom = $nom;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getDateNaissance()
  {
    return $this->dateNaissance;
  }

  /**
   * @param mixed $dateNaissance
   * @return Search
   */
  public function setDateNaissance($dateNaissance)
  {
    $this->dateNaissance = $dateNaissance;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getReferent()
  {
    return $this->referent;
  }

  /**
   * @param mixed $referent
   * @return Search
   */
  public function setReferent($referent)
  {
    $this->referent = $referent;
    return $this;
  }





}

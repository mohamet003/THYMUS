<?php

namespace App\Entity;

use App\Repository\CaseCocheeMultipleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CaseCocheeMultipleRepository::class)
 */
class CaseCocheeMultiple
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom_case;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $value_case;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $texte_case;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="cases_cochee_multi")
     */
    private $patient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCase(): ?string
    {
        return $this->nom_case;
    }

    public function setNomCase(?string $nom_case): self
    {
        $this->nom_case = $nom_case;

        return $this;
    }

    public function getValueCase(): ?string
    {
        return $this->value_case;
    }

    public function setValueCase(?string $value_case): self
    {
        $this->value_case = $value_case;

        return $this;
    }

    public function getTexteCase(): ?string
    {
        return $this->texte_case;
    }

    public function setTexteCase(?string $texte_case): self
    {
        $this->texte_case = $texte_case;

        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): self
    {
        $this->patient = $patient;

        return $this;
    }
}

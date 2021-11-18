<?php

namespace App\Entity;

use App\Repository\GrupoRolKeycloakRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GrupoRolKeycloakRepository::class)
 */
class GrupoRolKeycloak
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=RolKeycloak::class, inversedBy="grupoRolesKeycloak")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rolKeycloak;

    /**
     * @ORM\ManyToOne(targetEntity=GrupoKeycloak::class, inversedBy="grupoRolesKeycloak")
     * @ORM\JoinColumn(nullable=false)
     */
    private $grupoKeycloak;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRolKeycloak(): ?RolKeycloak
    {
        return $this->rolKeycloak;
    }

    public function setRolKeycloak(?RolKeycloak $rolKeycloak): self
    {
        $this->rolKeycloak = $rolKeycloak;

        return $this;
    }

    public function getGrupoKeycloak(): ?GrupoKeycloak
    {
        return $this->grupoKeycloak;
    }

    public function setGrupoKeycloak(?GrupoKeycloak $grupoKeycloak): self
    {
        $this->grupoKeycloak = $grupoKeycloak;

        return $this;
    }
}

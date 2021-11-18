<?php

namespace App\Entity;

use App\Repository\RolKeycloakRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RolKeycloakRepository::class)
 */
class RolKeycloak
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roleSymfony;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity=GrupoRolKeycloak::class, mappedBy="rolKeycloak")
     */
    private $grupoRolesKeycloak;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $idKeycloakRole;

    public function __construct()
    {
        $this->grupoRolesKeycloak = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getRoleSymfony(): ?string
    {
        return $this->roleSymfony;
    }

    public function setRoleSymfony(string $roleSymfony): self
    {
        $this->roleSymfony = $roleSymfony;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return Collection|GrupoRolKeycloak[]
     */
    public function getGrupoRolesKeycloak(): Collection
    {
        return $this->grupoRolesKeycloak;
    }

    public function addGrupoRolesKeycloak(GrupoRolKeycloak $grupoRolesKeycloak): self
    {
        if (!$this->grupoRolesKeycloak->contains($grupoRolesKeycloak)) {
            $this->grupoRolesKeycloak[] = $grupoRolesKeycloak;
            $grupoRolesKeycloak->setRolKeycloak($this);
        }

        return $this;
    }

    public function removeGrupoRolesKeycloak(GrupoRolKeycloak $grupoRolesKeycloak): self
    {
        if ($this->grupoRolesKeycloak->removeElement($grupoRolesKeycloak)) {
            // set the owning side to null (unless already changed)
            if ($grupoRolesKeycloak->getRolKeycloak() === $this) {
                $grupoRolesKeycloak->setRolKeycloak(null);
            }
        }

        return $this;
    }

    public function getIdKeycloakRole(): ?string
    {
        return $this->idKeycloakRole;
    }

    public function setIdKeycloakRole(?string $idKeycloakRole): self
    {
        $this->idKeycloakRole = $idKeycloakRole;

        return $this;
    }
}

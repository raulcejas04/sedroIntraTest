<?php

namespace App\Entity;

use App\Repository\GrupoKeycloakRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GrupoKeycloakRepository::class)
 */
class GrupoKeycloak
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
     * @ORM\OneToMany(targetEntity=GrupoRolKeycloak::class, mappedBy="grupoKeycloak")
     */
    private $grupoRolesKeycloak;

    /**
     * @ORM\Column(type="text")
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $idKeycloakGroup;

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
            $grupoRolesKeycloak->setGrupoKeycloak($this);
        }

        return $this;
    }

    public function removeGrupoRolesKeycloak(GrupoRolKeycloak $grupoRolesKeycloak): self
    {
        if ($this->grupoRolesKeycloak->removeElement($grupoRolesKeycloak)) {
            // set the owning side to null (unless already changed)
            if ($grupoRolesKeycloak->getGrupoKeycloak() === $this) {
                $grupoRolesKeycloak->setGrupoKeycloak(null);
            }
        }

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

    public function getIdKeycloakGroup(): ?string
    {
        return $this->idKeycloakGroup;
    }

    public function setIdKeycloakGroup(?string $idKeycloakGroup): self
    {
        $this->idKeycloakGroup = $idKeycloakGroup;

        return $this;
    }
}

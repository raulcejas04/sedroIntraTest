<?php

namespace App\Entity;

use App\Repository\SolicitudRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SolicitudRepository::class)
 */
class Solicitud
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $cuit;

    /**
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $cuil;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nicname;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaAlta;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaExpiracion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hash;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaUso;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $correccion;

    /**
     * @ORM\ManyToOne(targetEntity=Realm::class, inversedBy="solicitudes")
     */
    private $realm;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="solicitudes")
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity=PersonaFisica::class, inversedBy="solicitudes")
     */
    private $personaFisica;

    /**
     * @ORM\ManyToOne(targetEntity=PersonaJuridica::class, inversedBy="solicitudes")
     */
    private $personaJuridica;

    /**
     * @ORM\ManyToOne(targetEntity=Dispositivo::class, inversedBy="solicitudes")
     */
    private $dispositivo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCuit(): ?string
    {
        return $this->cuit;
    }

    public function setCuit(?string $cuit): self
    {
        $this->cuit = $cuit;

        return $this;
    }

    public function getCuil(): ?string
    {
        return $this->cuil;
    }

    public function setCuil(?string $cuil): self
    {
        $this->cuil = $cuil;

        return $this;
    }

    public function getNicname(): ?string
    {
        return $this->nicname;
    }

    public function setNicname(string $nicname): self
    {
        $this->nicname = $nicname;

        return $this;
    }

    public function getFechaAlta(): ?\DateTimeInterface
    {
        return $this->fechaAlta;
    }

    public function setFechaAlta(?\DateTimeInterface $fechaAlta): self
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getFechaExpiracion(): ?\DateTimeInterface
    {
        return $this->fechaExpiracion;
    }

    public function setFechaExpiracion(?\DateTimeInterface $fechaExpiracion): self
    {
        $this->fechaExpiracion = $fechaExpiracion;

        return $this;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getFechaUso(): ?\DateTimeInterface
    {
        return $this->fechaUso;
    }

    public function setFechaUso(?\DateTimeInterface $fechaUso): self
    {
        $this->fechaUso = $fechaUso;

        return $this;
    }

    public function getCorreccion(): ?string
    {
        return $this->correccion;
    }

    public function setCorreccion(?string $correccion): self
    {
        $this->correccion = $correccion;

        return $this;
    }

    public function getRealm(): ?Realm
    {
        return $this->realm;
    }

    public function setRealm(?Realm $realm): self
    {
        $this->realm = $realm;

        return $this;
    }

    public function getUsuario(): ?User
    {
        return $this->usuario;
    }

    public function setUsuario(?User $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getPersonaFisica(): ?PersonaFisica
    {
        return $this->personaFisica;
    }

    public function setPersonaFisica(?PersonaFisica $personaFisica): self
    {
        $this->personaFisica = $personaFisica;

        return $this;
    }

    public function getPersonaJuridica(): ?PersonaJuridica
    {
        return $this->personaJuridica;
    }

    public function setPersonaJuridica(?PersonaJuridica $personaJuridica): self
    {
        $this->personaJuridica = $personaJuridica;

        return $this;
    }

    public function getDispositivo(): ?Dispositivo
    {
        return $this->dispositivo;
    }

    public function setDispositivo(?Dispositivo $dispositivo): self
    {
        $this->dispositivo = $dispositivo;

        return $this;
    }

}

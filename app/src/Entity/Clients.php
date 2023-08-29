<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientsRepository::class)]
class Clients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 256)]
    private ?string $client_id = null;

    #[ORM\Column(length: 256)]
    private ?string $client_secret = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createDate = null;

    #[ORM\Column(length: 32)]
    private ?string $adminLogin = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $redirectUri = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientId(): ?string
    {
        return $this->client_id;
    }

    public function setClientId(string $client_id): static
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getClientSecret(): ?string
    {
        return $this->client_secret;
    }

    public function setClientSecret(string $client_secret): static
    {
        $this->client_secret = $client_secret;

        return $this;
    }

    public function getCreateDate(): ?\DateTimeInterface
    {
        return $this->createDate;
    }

    public function setCreateDate(\DateTimeInterface $createDate): static
    {
        $this->createDate = $createDate;

        return $this;
    }

    public function getAdminLogin(): ?string
    {
        return $this->adminLogin;
    }

    public function setAdminLogin(string $adminLogin): static
    {
        $this->adminLogin = $adminLogin;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getRedirectUri(): ?string
    {
        return $this->redirectUri;
    }

    public function setRedirectUri(string $redirectUri): static
    {
        $this->redirectUri = $redirectUri;

        return $this;
    }
}

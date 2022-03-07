<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    private $nameUser;

    #[ORM\Column(type: 'string', length: 255)]
    private $firstNameUser;

    #[ORM\Column(type: 'string', length: 255)]
    private $emailUser;

    #[ORM\Column(type: 'string', length: 255)]
    private $pseudo;

    #[ORM\Column(type: 'string', length: 255)]
    private $passwordUser;

    #[ORM\Column(type: 'datetime_immutable')]
    private $accounCreationDateUser;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $accountValidationUser;

    #[ORM\Column(type: 'text', nullable: true)]
    private $bioUser;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $avatarUser;

    #[ORM\ManyToOne(targetEntity: Roles::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_role;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNameUser(): ?string
    {
        return $this->nameUser;
    }

    public function setNameUser(string $nameUser): self
    {
        $this->nameUser = $nameUser;

        return $this;
    }

    public function getFirstNameUser(): ?string
    {
        return $this->firstNameUser;
    }

    public function setFirstNameUser(string $firstNameUser): self
    {
        $this->firstNameUser = $firstNameUser;

        return $this;
    }

    public function getEmailUser(): ?string
    {
        return $this->emailUser;
    }

    public function setEmailUser(string $emailUser): self
    {
        $this->emailUser = $emailUser;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getPasswordUser(): ?string
    {
        return $this->passwordUser;
    }

    public function setPasswordUser(string $passwordUser): self
    {
        $this->passwordUser = $passwordUser;

        return $this;
    }

    public function getAccounCreationDateUser(): ?\DateTimeImmutable
    {
        return $this->accounCreationDateUser;
    }

    public function setAccounCreationDateUser(\DateTimeImmutable $accounCreationDateUser): self
    {
        $this->accounCreationDateUser = $accounCreationDateUser;

        return $this;
    }

    public function getAccountValidationUser(): ?\DateTimeInterface
    {
        return $this->accountValidationUser;
    }

    public function setAccountValidationUser(?\DateTimeInterface $accountValidationUser): self
    {
        $this->accountValidationUser = $accountValidationUser;

        return $this;
    }

    public function getBioUser(): ?string
    {
        return $this->bioUser;
    }

    public function setBioUser(?string $bioUser): self
    {
        $this->bioUser = $bioUser;

        return $this;
    }

    public function getAvatarUser(): ?string
    {
        return $this->avatarUser;
    }

    public function setAvatarUser(?string $avatarUser): self
    {
        $this->avatarUser = $avatarUser;

        return $this;
    }

    public function getIdRole(): ?Roles
    {
        return $this->id_role;
    }

    public function setIdRole(?Roles $id_role): self
    {
        $this->id_role = $id_role;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtistRepository::class)]
#[ORM\Table(name:"artists")]
class Artist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 60)]
    #[Assert\Length(
        min: 2,
        max: 60,
        minMessage: 'Your firstname must be at least {{ limit }} characters long',
        maxMessage: 'Your firstname cannot be longer than {{ limit }} characters',
    )]
    private ?string $firstname = null;

    #[ORM\Column(length: 60)]
    #[Assert\Length(
        min: 2,
        max: 60,
        minMessage: 'Your lastname must be at least {{ limit }} characters long',
        maxMessage: 'Your lastname cannot be longer than {{ limit }} characters',
    )]
    private ?string $lastname = null;

    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'artists')]
    private Collection $types;

    public function __construct()
    {
        $this->types = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Type $type): static
    {
        if (!$this->types->contains($type)) {
            $this->types->add($type);
        }

        return $this;
    }

    public function removeType(Type $type): static
    {
        $this->types->removeElement($type);

        return $this;
    }
}

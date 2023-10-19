<?php

namespace App\Entity;

use App\Repository\DiscRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiscRepository::class)]
class Disc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $disc_title = null;

    #[ORM\Column]
    private ?int $disc_year = null;

    #[ORM\Column(length: 50)]
    private ?string $disc_picture = null;

    #[ORM\Column(length: 50)]
    private ?string $disc_label = null;

    #[ORM\ManyToOne(inversedBy: 'discs')]
    private ?Artist $artist = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiscTitle(): ?string
    {
        return $this->disc_title;
    }

    public function setDiscTitle(string $disc_title): static
    {
        $this->disc_title = $disc_title;

        return $this;
    }

    public function getDiscYear(): ?int
    {
        return $this->disc_year;
    }

    public function setDiscYear(int $disc_year): static
    {
        $this->disc_year = $disc_year;

        return $this;
    }

    public function getDiscPicture(): ?string
    {
        return $this->disc_picture;
    }

    public function setDiscPicture(string $disc_picture): static
    {
        $this->disc_picture = $disc_picture;

        return $this;
    }

    public function getDiscLabel(): ?string
    {
        return $this->disc_label;
    }

    public function setDiscLabel(string $disc_label): static
    {
        $this->disc_label = $disc_label;

        return $this;
    }

    public function getArtist(): ?Artist
    {
        return $this->artist;
    }

    public function setArtist(?Artist $artist): static
    {
        $this->artist = $artist;

        return $this;
    }
}

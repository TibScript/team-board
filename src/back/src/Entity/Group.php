<?php

namespace App\Entity;

use App\Repository\GroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupRepository::class)
 * @ORM\Table(name="`group`")
 */
class Group
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @Groups("group:detail")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups("group:detail")
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Group::class, inversedBy="childGroup")
     */
    private $parents;

    /**
     * @ORM\ManyToMany(targetEntity=Group::class, mappedBy="parents")
     */
    private $childGroup;

    /**
     * @Groups("group:detail")
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $imGroot;

    /**
     * @Groups("group:detail")
     * @ORM\ManyToMany(targetEntity=Member::class, mappedBy="parents", cascade={"persist"})
     */
    private $members;

    public function __construct()
    {
        $this->parents = new ArrayCollection();
        $this->childGroup = new ArrayCollection();
        $this->members = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getParents(): Collection
    {
        return $this->parents;
    }

    public function addParent(self $parent): self
    {
        if (!$this->parents->contains($parent)) {
            $this->parents[] = $parent;
        }

        return $this;
    }

    public function removeParent(self $parent): self
    {
        $this->parents->removeElement($parent);

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getChildGroup(): Collection
    {
        return $this->childGroup;
    }

    public function addChildGroup(self $childGroup): self
    {
        if (!$this->childGroup->contains($childGroup)) {
            $this->childGroup[] = $childGroup;
            $childGroup->addParent($this);
        }

        return $this;
    }

    public function removeChildGroup(self $childGroup): self
    {
        if ($this->childGroup->removeElement($childGroup)) {
            $childGroup->removeParent($this);
        }

        return $this;
    }

    public function getImGroot(): ?bool
    {
        return $this->imGroot;
    }

    public function setImGroot(?bool $imGroot): self
    {
        $this->imGroot = $imGroot;

        return $this;
    }

    /**
     * @return Collection|Member[]
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(Member $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->addParent($this);
        }

        return $this;
    }

    public function removeMember(Member $member): self
    {
        if ($this->members->removeElement($member)) {
            $member->removeParent($this);
        }

        return $this;
    }
}

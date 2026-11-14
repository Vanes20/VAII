<?php

namespace App\Models;

use Framework\Core\Model;

class Chapter extends Model
{
    protected ?int $id = null;
    protected ?int $storyId = null;
    protected ?string $title = null;
    protected ?string $content = null;
    protected ?int $number = 1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStoryId(): ?int
    {
        return $this->storyId;
    }

    public function setStoryId(int $storyId): void
    {
        $this->storyId = $storyId;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): void
    {
        $this->number = $number;
    }

    public function getStory(): ?Story
    {
        return $this->getOneRelated(Story::class);
    }
}
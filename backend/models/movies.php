<?php

class Movies
{
    private $id;
    private $title;
    private $duration;
    private $description;
    private $release_year;
    private $genre;
    private $director;

    public function __construct(array $data)
    {
        $this->id= $data['id']?? null;
        $this->title = $data['title'] ?? '';
        $this->duration = $data['duration']?? 0;
        $this->description = $data['description']?? '';
        $this->release_year = $data['release_year']?? 0;
        $this->genre = $data ['genre']?? '';
        $this->director = $data['director']?? '';
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getDuration(): int
    {
        return $this->duration;
    }
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'duration' => $this->duration,
            'description' => $this->description,
            'release_year' => $this->release_year,
            'genre' => $this->genre,
            'director' => $this->director
        ];
    }
}

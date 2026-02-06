<?php

class Screening
{
    //Properties

    private $id;
    private $movie_id;
    private $room_id;
    private $start_time;

    //Initialize properties with default values
    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->movie_id = $data['movie_id'] ?? 0;
        $this->room_id = $data['room_id'] ?? 0;
        $this->start_time = $data['start_time'] ?? "";
    }

    //orgination the time
    public function getStartTime()
    {
        return $this->start_time;
    }

    //Converts the object properties into an array for API.
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'movie_id' => $this->movie_id,
            'room_id' => $this->room_id,
            'start_time' => $this->start_time
        ];
    }
}

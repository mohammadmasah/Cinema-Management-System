<?php

class Room
   
{
     //Properties
     
    private $id;
    private $name;
    private $capacity;
    private $active;

    //Constructor
    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? '';
        $this->capacity = $data['capacity'] ?? 0;

        $this->active = $data['active'] ?? 1;
    }


    //Salon conditions
    public function isActive(): bool
    {
        return $this->active == 1;
    }



    //API
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'capacity' => $this->capacity,
            'active' => $this->active
        ];
    }
}

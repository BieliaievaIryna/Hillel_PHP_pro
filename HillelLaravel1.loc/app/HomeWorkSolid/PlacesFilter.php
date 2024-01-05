<?php

namespace App\HomeWorkSolid;

class PlacesFilter
{
    public function filterByProperties(array $places, array $properties): array
    {
        foreach ($places as $key => $place){
            foreach ($place as $prop => $val) {
                if (!in_array($prop, $properties)){
                    unset($place->$prop);
                }
            }
            $places[$place->place_id] = $place;
            unset($places[$key]);
        }
        return $places;
    }
}

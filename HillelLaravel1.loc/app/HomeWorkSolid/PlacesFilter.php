<?php

namespace App\HomeWorkSolid;

class PlacesFilter implements PlacesFilterInterface
{
    public function filterByProperties(array $results, array $filters, string $key): array
    {
        $filteredResults = [];

        foreach ($results as $result) {
            $filteredResult = new \stdClass();

            foreach ($result as $prop => $val) {
                if (in_array($prop, $filters)) {
                    $filteredResult[$prop] = $val;
                }
            }

            $filteredResults[$filteredResult->$key] = $filteredResult;
        }

        return $filteredResults;
    }
}

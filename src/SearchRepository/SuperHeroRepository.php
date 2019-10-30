<?php

namespace App\SearchRepository;

use Elastica\Query;
use Elastica\Query\BoolQuery;
use FOS\ElasticaBundle\Repository;

class SuperHeroRepository extends Repository
{
    public function search($search = null, $limit = 25)
    {
        $query = new Query();

        $boolQuery = new BoolQuery();

        if (!\is_null($search)) {
            $fieldQuery = new Query\Match('name', [
                "query" =>         $search,
                "boost" =>         1.0,
                "fuzziness" =>     2,
                "prefix_length" => 0,
                "max_expansions" => 100
            ]);
            $boolQuery->addMust($fieldQuery);
        }

        $query->setQuery($boolQuery);
        $query->setSize($limit);

        return $this->find($query);
    }
}

<?php


namespace victor\refactoring;


class ExtractMethodObject
{
    function search(array $criteria): array
    {
        $queryBuilder = new ParentSearchQueryBuilder($criteria);

        $queryBuilder->execute();

        $dql = $queryBuilder->getDql();

        echo "Create query $dql\n";
        foreach ($queryBuilder->getParams() as $param) {
            echo "Set param '$param'=" . $queryBuilder->getParams()[$param];
        }
    }
}
<?php


namespace victor\refactoring;


class ExtractMethodObject
{
    function search(array $criteria): array
    {
        $params = [];
        $dql = "SELECT p.id FROM Parent ON  WHERE 1=1   ";

        if (isset($criteria['name'])) {
            $dql .= '    AND p.name = ?    ';
            $params[] = $criteria['name'];
        }

        if (isset($criteria['caregory'])) {
            $dql .= ' AND p.category = ? ';
            $params[] = $criteria['category'];
        }

        echo "Create query $dql\n";
        foreach ($params as $param) {
            echo "Set param '$param'=" . $params[$param];
        }
    }
}
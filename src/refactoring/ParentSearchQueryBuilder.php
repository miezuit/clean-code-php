<?php


namespace victor\refactoring;


class ParentSearchQueryBuilder
{
    private array $criteria;
    private $dql;
    private $params = [];

    public function __construct(array $criteria)
    {
        $this->criteria = $criteria;
    }

    function execute()
    {
        $this->dql = "SELECT p.id FROM Parent  WHERE 1=1   ";
        $this->addNameCriteria();
        $this->addAddressCriteria();
    }

    /**
     * @return mixed
     */
    public function getDql()
    {
        return $this->dql;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    private function addNameCriteria()
    {
        if (isset($this->criteria['name'])) {
            $this->dql .= '    AND p.name = ?    ';
            $this->params[] = $this->criteria['name'];
        }
    }

    private function addAddressCriteria(): void
    {
        if (isset($this->criteria['address'])) {
            $this->dql .= ' AND UPPER(p.address) LIKE (' % ' || ? || ' % ') ';
            $this->params[] = $this->criteria['address'];
        }
    }
}
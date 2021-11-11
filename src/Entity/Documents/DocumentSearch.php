<?php

namespace App\Entity\Documents;


class DocumentSearch
{
    /**
     * valeur de la recherche
     * @var string|null
     */
    private ?string $search = null;

    /**
     * @return string
     */
    public function getSearch() : ?string
    {
        return $this->search;
    }

    /**
     * @param string|null $search
     * @return self
     */
    public function setSearch(?string $search) : self
    {
        $this->search = $search;
        return $this;
    }

    public function __toString()
    {
        return $this->search;
    }
}

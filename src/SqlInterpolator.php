<?php

namespace Itrn0\SqlInterpolator;

class SqlInterpolator
{
    private $prefix = ':param_';
    private $params = [];
    private $counter = 0;

    /**
     * @param ...$values
     * @return string
     */
    public function __invoke(...$values)
    {
        $placeholders = [];
        foreach ($values as $value) {
            $placeholders[] = $this->add($value);
        }
        return implode(',', $placeholders);
    }

    /**
     * @return array<string, mixed>
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @param $value
     * @return string
     */
    private function add($value)
    {
        $placeholder = $this->prefix . ++$this->counter;
        $this->params[$placeholder] = $value;
        return $placeholder;
    }
}
<?php

class ConditionSql
{
    private $field;
    private $value;
    private $comparator;

    public function __construct($field, $value, $comparator = '=')
    {
        $this->field = $field;
        $this->value = $value;
        $this->comparator = $comparator;
    }

    /**
     * @return mixed
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getComparator()
    {
        return trim($this->comparator);
    }

    public static function eq($field, $value)
    {
        return new static($field, $value, '=');
    }

    public static function notEq($field, $value)
    {
        return new static($field, $value, '!=');
    }

    public static function lt($field, $value)
    {
        return new static($field, $value, '<');
    }

    public static function let($field, $value)
    {
        return new static($field, $value, '<=');
    }

    public static function gt($field, $value)
    {
        return new static($field, $value, '>');
    }

    public static function get($field, $value)
    {
        return new static($field, $value, '>=');
    }

    public static function like($field, $value)
    {
        return new static($field, $value, 'LIKE');
    }

    public static function notLike($field, $value)
    {
        return new static($field, $value, 'NOT LIKE');
    }
}
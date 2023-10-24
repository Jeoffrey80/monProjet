<?php
class QueryBuilder
{
    public function select($select = null) {}
    public function addSelect($select = null) {}
    public function delete($delete = null, $alias = null) {}
    public function update($update = null, $alias = null) {}
    public function set($key, $value) {}
    public function from($from, $alias, $indexBy = null) {}
    public function join($join, $alias, $conditionType = null, $condition = null, $indexBy = null) {}
    public function innerJoin($join, $alias, $conditionType = null, $condition = null, $indexBy = null) {}
    public function leftJoin($join, $alias, $conditionType = null, $condition = null, $indexBy = null) {}
    public function where($where) {}
    public function andWhere($where) {}
    public function orWhere($where) {}
    public function groupBy($groupBy) {}
    public function addGroupBy($groupBy) {}
    public function having($having) {}
    public function andHaving($having) {}
    public function orHaving($having) {}
    public function orderBy($sort, $order = null) {}
    public function addOrderBy($sort, $order = null) {}
}
?>
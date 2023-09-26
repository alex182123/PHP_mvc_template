<?php

class SQLChecker
{
    private $reservedWords = array(
        'SELECT', 'INSERT', 'UPDATE', 'DELETE', 'CREATE', 'DROP', 'ALTER',
        'TABLE', 'DATABASE', 'FROM', 'WHERE', 'ORDER BY', 'GROUP BY',
        'INNER JOIN', 'LEFT JOIN', 'RIGHT JOIN', 'OUTER JOIN', 'JOIN',
        'HAVING', 'UNION', 'AND', 'OR', 'NOT', 'IN', 'LIKE', 'BETWEEN',
        'AS', 'ON', 'COUNT', 'SUM', 'MAX', 'MIN', 'AVG', 'DISTINCT',
        'ALL', 'CASE', 'WHEN', 'THEN', 'ELSE', 'END', 'IS', 'NULL',
        'PRIMARY KEY', 'FOREIGN KEY', 'REFERENCES'
    );
    public function SQL_Injection($var)
    {
        $var = strtoupper($var);
        foreach ($this->reservedWords as $word) {
            if (preg_match('/\b' . preg_quote($word, '/') . '\b/', $var)) {
                return true; // The input contains an entire reserved word
            }
        }
    }
}

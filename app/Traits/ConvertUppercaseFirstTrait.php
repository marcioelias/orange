<?php

namespace App\Traits;

trait ConvertUppercaseFirstTrait {

    public function delimiters() {
        return [' ', '-', '.', "'", "O'", 'Mc'];
    }

    public function exceptions() {
        return ['de', 'da', 'dos', 'das', 'do', 'I', 'II', 'III', 'IV', 'V', 'VI'];
    }

    public function getAllUppercase(string $string) {
        return mb_convert_case($string, MB_CASE_TITLE_SIMPLE, 'UTF-8');
    }

    public function uppercaseSentence(string $string) {
        $string = $this->getAllUppercase($string);
        foreach ($this->delimiters() as $delimiter) {
            $words = explode($delimiter, $string);
            if (count($words) > 1) {
                $newwords = array();
                foreach ($words as $word) {
                    if (in_array(mb_strtoupper($word, 'UTF-8'), $this->exceptions())) {
                        $word = mb_strtoupper($word, 'UTF-8');
                    } elseif (in_array(mb_strtolower($word, 'UTF-8'), $this->exceptions())) {
                        $word = mb_strtolower($word, 'UTF-8');
                    } elseif (!in_array($word, $this->exceptions())) {
                        $word = ucfirst($word);
                    }
                    array_push($newwords, $word);
                }
                $result = join($delimiter, $newwords);
            }
        }

        if (!isset($result)) {
            $result = ucfirst($string);
        }

        return $result;
    }

}

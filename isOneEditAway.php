<?php

    /*
    function to return if two words are exactly "one edit" away, where an edit is:
    Inserting one character anywhere in the word (including at the beginning and end)
    Removing one character
    Replacing exactly one character
    */
    function isOneEditAway(string $word1, string $word2) {
        if ($word1 === $word2) {
            return true;
        }
        
        //if different is more than one char return false
        if (abs(strlen($word1)-strlen($word2)) > 1) {
            return false;
        }
        
        //lets but the smal one in the first word
        if (strlen($word1)>strlen($word2)) {
            $temp = $word1;
            $word1 = $word2;
            $word2 = $temp;
        }
        
        //the word1 is a sub set of word2 and we know the differenc is one char return true
        if (strpos($word2, $word1) !== false) {
            return true;
        }
        
        //matching
        $differences = 0;
        for($i = 0; $i < strlen($word2); $i++) {
            if (!isset($word1[$i])) {
                $differences++;
            } else if ($word1[$i] !== $word2[$i]) {
                $differences++;
            }
            
            if ($differences > 1) {
                return false;
            }
        }
        //if we came here then $differences < 2
        return true;
    }
    
    var_dump(isOneEditAway('eslam', 'eslamx'));//true
    var_dump(isOneEditAway('eslam', 'eslam'));//true
    var_dump(isOneEditAway('eslam', 'esla'));//true
    var_dump(isOneEditAway('eslam', 'eslac'));//true
    var_dump(isOneEditAway('eslam', 'eslamdd'));//false
    var_dump(isOneEditAway('eslam', 'esl'));//false
    var_dump(isOneEditAway('eslam', 'slam'));//true
    var_dump(isOneEditAway('eslam', 'qeslam'));//true
    var_dump(isOneEditAway('eslam', 'lam'));//false
    var_dump(isOneEditAway('1', '0'));//true
    var_dump(isOneEditAway('1', '00'));//false
    
    echo "\n";

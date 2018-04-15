<?php
    
    /**
    * Binary tree structure 
    * Left elemtn < Value/Current element < Right element
    */
    class BinaryTree {
        //init the values of the tree
        private $value = null;
        private $left = null;
        private $right = null;
        
        //set the value of the tree
        function __construct($value){
            $this->value = $value;
        }
        
        //Insert the value in the correct place
        public function insert($value) {
            if ($value <= $this->value) {
                if (is_null($this->left)) {
                    $this->left = new BinaryTree($value);
                } else {
                    $this->left->insert($value);
                }
            } else {
                if (is_null($this->right)) {
                    $this->right = new BinaryTree($value);
                } else {
                    $this->right->insert($value);
                }
            }
        }

        //search if value in the tree
        public function contains($needle) {
            if ($needle === $this->value){
                return true;
            } else if ($needle < $this->value && !is_null($this->left)){
                return $this->left->contains($needle);
            } else if ($needle > $this->value && !is_null($this->right)){
                return $this->right->contains($needle);
            }
            return false;
        }
        
        //return the tree as sorted array
        public function toArray() {
            $result = [];
            
            if (!is_null($this->left)) {
                $result = array_merge($result, $this->left->toArray());
            }
            $result = array_merge($result, [$this->value]);
            if (!is_null($this->right)) {
                $result = array_merge($result, $this->right->toArray());
            }
            
            return $result;
        }
        
        //Getters
        public function getValue() {
            return $this->value;
        }
        public function getLeft() {
            return $this->left;
        }
        public function getRight() {
            return $this->right;
        }
    }
    
    //data to be inserted as binary tree
    $data = [5,3,4,2,1,8,6,9,7];
    
    //init the bunary tree and insert first value
    $tree = new BinaryTree(array_shift($data));
    //loop on the data to insert all values as tree
    foreach($data as $k => $v) {
        $tree->insert($v);
    }
    
    //Display the tree
    //print_r($tree);
    
    //search the tree
    var_dump($tree->contains(0));//false
    var_dump($tree->contains(1));//true
    var_dump($tree->contains('1'));//false
    var_dump($tree->contains(-1));//false
    var_dump($tree->contains(7));//true

    //print the tree as sorted array
    print_r($tree->toArray());
    

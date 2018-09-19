class Node {
    constructor(data){
        //TODO need better ID
        this.id = Date.now()+'-'+Math.floor(Math.random() * 1000000);
        this.data = data;
        this.children = {};
        this.parent = null;
    }
    addChild(childPointer) {
        childPointer.parent = this;
        this.children[childPointer.id] = childPointer;
        return childPointer.id;
    }
    getChildren() {
        return this.children;
    }
    remove(){
  	    if (this.parent === null) {
      		//root element
        } else {
      		let parent = this.parent;
            for(let key in this.children) {
            	this.children[key].parent = parent;
              parent.addChild(this.children[key]);
            }
            delete this.parent.children[this.id];
        }
    }
}

class Tree {
		constructor(data) {
        var node = new Node(data);
        this.root = node;
    }
    traverseDF() {
    	this.result = [];
        this.visited = {};
		this.traverseDFRecusive(this.root)
        return this.result;
    }
    traverseDFRecusive(node) {
        if (this.visited[node.id]){
            return false;
        }
		this.visited[node.id] = true;
		this.result.push(node.data);
        for(let key in node.children) {
    		this.traverseDFRecusive(node.children[key]);
        };
    }
    traverseBF() {
        let result = [];
        let visited = {};
        let next = [];
        next.push(this.root);
        while(next.length) {
            let node = next.shift();
            if (visited[node.id]){
                continue;
            }
            visited[node.id] = true;
            result.push(node.data);
            for(let key in node.children) {
                next.push(node.children[key]);
            }
        }
        return result;
    }
}

var tree = new Tree('one');
 
let two = tree.root.addChild(new Node('two'));
tree.root.addChild(new Node('three')); 
let four = tree.root.addChild(new Node('four'));
//TODO: not the best way need to work on that
tree.root.children[two].addChild(new Node('five')); 
tree.root.children[two].addChild(new Node('six'));
 
tree.root.children[four].addChild(new Node('seven'));
/**
Tree
 - one
 		- two
		 		- five
		 		- six
 		- three
 		- four
		 		- seven
*/
/* 
console.log(tree.traverseDF());
console.log(tree.traverseBF());
console.log(tree);
tree.root.children[two].remove();
console.log(tree); 
*/

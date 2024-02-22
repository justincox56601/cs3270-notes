<?php
/**
 * php supports object inheritance, polymoprhism, abstract classes, and interfaces.
 */

class Parent{
	private $_id;  
	protected $_familyName; 
	public $firstName; 

	function __construct(string $firstName, string $familyName){
		$this->_id = 7;
		$this->_familyName = $familyName;
		$this->firstName = $firstName;
	}

	private function _private_method():void{
		//do stuff
	}

	protected function _protected_method():void{
		//do stuff
	}

	public function public_method():void{
		//do stuff
	}
}

class Child extends Parent{ 						//extends is the keyword for inheriting form a parent class
	private $_favoriteDinosaur; 					//child class ONLY needs to declare properties specific to it.
													//NOTE: private properties ARE NOT inherited.  
													//ONLY public and protected.

	function __construct(string $familyName){ 		// __construct is the proper way to call a constructor
		parent::__construct('Timmy', $familyName);	// no longer use the ClassName version for constructor
	}												//  function Child()  in this example.
													// as of PHP 8, parent::_construct(); is the way to 
													//initalize the parent.  It used to be super(); 
													//super() still works in PHP 7
													//note that constructor arguments for the child and 
													//parent do not need to be the same.
	
	public function public_method():void{			//child classes DO NOT NEED to declare methods form 
		//do child specific stuff					//the parent class.  They are automatically availble
	}												//However, if they have child specific behavior, then
													//the method needs to be overridden.  This is
													//polymorphism
		
}

class GrandChild extends Child{						//inheritance can go down as many levels as needed
	//stuff											//GrandChild still has access to public and protected
}													// properties and methods from Child and Parent.
													//In this case, it will use the child verion of 
													//public_method() since it is the most recent version


abstract class AbstractClass{						//Abstract classes are classes where you CANNOT create
	protected $_protectedPorperty;					//an instance of it.  You must inherit from it.
	public $publicPropery;							//Abstract classes CANNOT have private properties or
													//methods. 
	function __construct(){}

	function do_stuff():void{						//Abstract classes can have any number of concrete 
			//do stuff								//methods.  These will be inherited by the child class
	}

	abstract function public_method():void;			//Abstract classes can have any number of abstract methods
	abstract function _protected_method():void;		//these NEED to be implemented by the child class.
}

interface iInterface{								//interfaces are like mini abstract classes.
	function public_method():void;					//interaces can ONLY have public methods
}													//interfaces CANNOT have properties
													//all classes that implement an interface
													//MUST implement the interface methods
													//the abstract keyword is assumed and not needed in interface
class MyClass implements iInterface{				//definitions
	__construct(){}

	public function public_method():void{			
		//do public stuff							
	} 
}
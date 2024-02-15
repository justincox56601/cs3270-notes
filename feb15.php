<?php
/**
 * OBJECTS and CLASSES
 * 
 * brief reminder that a class is the blueprint for the house, and the object is the instance of the house. Many houses can come from the same blueprint. These terms often get used interchangably, but technically that is the difference.
 * 
 */

class Car{ //class keyword tells php you are defining a class.  class name must be capitalized.
    private $_vinNumber; // private properties are ONLY accessible from within this class
    protected $_engine; //proected properties are only accessible within this class AND inherited classes
    public $numberOfDoors; //public properties are freely accessible

    function __construct(int $vin){ //constructor uses the dunder prefix
        $this->_vinNumber = $vin; //setting a property via passed in param
        $this->numberOfDoors = 4; //directly assigning property value
        $this->_set_engine(); //calling class methods from inside constructor
        //NOTICE how $this  is used.  the $ goes with the $this NOT the property or function name
        //NOTICE php classes use the arrow accessor ->  instead of the dot like in other languages.
    }

    function get_vin_number():int{ //all functions need to use the function keyword
        return $this->_vinNumber;
    }

    public function calc_gas_mileage(float $currentGas):float{ //functions have accessors as well.  default is public
        $currentMileage = $this->_gas_mileage_calc($currentGas);
        //do some math
        return $currentMileage;
    }

    protected function _gas_mileage_calc(float $gas):int{ //protected functions same as protected properties
        //do some math
        return 4;
    }

    private function _set_engine():void{ //private functions same as private properties
        $this->_engine = '440 bigblock'; 
    }
}

$jetta = new Car(1235); //objects need to be instantiated with the 'new' keyword
$miata =new Car(5567); //multiple objects can be made from the same class.  These are distinct from eachother
// echo $jetta->get_vin_number(), PHP_EOL; //arrow accessor is used to call class methods here too
// echo $miata->get_vin_number(), PHP_EOL; //these are difference because these are two separate instances of the same class
// echo $jetta->numberOfDoors, PHP_EOL; //easy access to public properites and methods
// echo $miata->_vinNumber, PH_EOL; //this causes a fatal error because you cannot access private or protected properties / methods from outside of the class itself.
// echo get_class($jetta), PHP_EOL; //display class name
// print_r(get_declared_classes()); // displays all of the classes that are currently in use in the current script

/**
 * SOLID principles with object oriented programming
 * S - Single responsibility principle
 * O - Open closed prinicple
 * L - Liskov substitution principle
 * I - Interface segregation principle
 * D - Dependency inversion principle
 * 
 * 
 * Single Repsonsibility Principle
 * Classes should have 1 responsibility and that is it.  The employee class should ONLY deal with things involving the employee.  While you may need to get info from the database for the client, dealing with the database is a spearate responsibility and should be the responsibility of the Database Class, NOT the Employee Class.
 * 
 * Open Closed Principle
 * Classes and their methods should be open to extension but closed to modificaiton.  Consider the Employee class.  It handles dealing with employees.  But now you need to deal with managers specifically.  Managers are a type of employee, but there is some special methods needed for them that is not part of the employee class.  Instead of modifying the Employee class to add methods specific to the manager scenario, resulting in often unused code, the correct action is to create a Manager Class that extends the original Employee Class.  Then to add the manager specific items there.
 * 
 * Liskov Substitution Principle
 * If you are dependent on a class or interface, ANY object that is of that type should work with your code.  Again using the employee example.  Since the Manager Class is of type Employee, then any manager object should be useable in any employee dependency.  Another example is a video game situation.  Lets say the player has a reference the a health bar using the iHealth interface (we will cover interfaces shortly, don't worry about this for now), then ANY object that that imiplements the iHealth interface should work with the players code.  Regardless of what the actual object is.
 * 
 * Interface Segregation Principle
 * A class should NEVER be forced to implement a method it doesn't use.  Using the player health example.  Lets say the player has a reference to a health bar.  The health bar is an object that implements the iHealth interace.  Now lets say the player also has mana.  It would be incorrect to added a mana function to iHealth.  Because now EVERY object that uses iHealth now needs to implement a mana function WETHER THEY ACTUALY NEED IT OR NOT.
 * 
 * Dependency Inversion
 * Classes should not depend on concrete implementations of other classes, instead they should rely on abstractions.  Using the Employee class from above.  They employee needs information from the database.  As discussed earlier, it is not the employees job to get that information, instead it needs a reference to a database object to do that work for them.  Instead of creating a concrete implementation of the database object inside the employee object, the database reference should be passed into the constructor.  a more visual example is below
 * 
 * WRONG
 * class Employee{
 *      private $_database;
 * 
 *      function __construct(){
 *          $this->_database = new DatabaseService();
 *      }
 * }
 * 
 * CORRECT
 * class Employee{
 *      private $_database;
 * 
 *      function __construct($databaseService){
 *          $this->_database = $databaseService;
 *      }
 * }
 * 
 * Some Best PRactices:
 * 1) Class names need to be capitalized
 * 2) ALL properties should private or protected.  Then use getters and setters to access them.
 * 3) getters and setters can use camel case OR snake case
 * 4) use action verbs for metho names.  ie  get_caluclated_value() or set_local_variables()
 * 5) use an underscore ( _ ) as a prefix for all private and protected properties and methods
 * 
 * EXERCISE:
 * 1) create an Employee Class
 * 2) the class should have name, id, and salary properties
 * 3) the name and id should be passed in via the constructor
 * 4) all three properties should ahve a getter and setter function
 * 5) create a method give_raise()  that will take in a a float $amount and return void.  this method will add the amount to the salary.
 * 6) create a method show_stats() that takes no parameters but returns a string that will show the employees name, id, and salary on three different lines  with the following format
 * name: XXXXX
 * id: XXXX
 * salary: $XXXXXX.XX
 * 7) instantiate 3 employees, call the getter function for salary on each of them to set their salary.  call the give_raise() ethod on each of them to give them a raise, call the show_stats() method on each of them and echo out the return string.  something like below
 * $beth = new Employee('Beth', 379);
 * $beth->setSalary(125000);
 * $beth->give_raise(10000);
 * echo $beth->show_stats(), PHP_EOL;
 * 8) when done, show me before moving on to the next exercise
 * 
 * EXERCISE:
 * 1) create a class called ChessPiece
 * 2) this class will have a private pieces property.  It will be an associative array that will have the name of the pieces as the keys and a string saying how they move as the value.  DOn't over think it, just make a string in your own words describing how the piece moves.  DOn not set the values here.  We will set those via a method.
 * 3) the constructor will tak no parameters but will call a private function _init_pieces() method. the method should return void and directly set the values.
 * 4) there will ne NO setters or getters forthis class
 * 5) the _init_pieces method will be responsible for setting the keys and values of the $_pieces property.
 * 6) create a method get_move() that takes a string parameter $piece and returns a string with the way that peice moves.
 * 7) this method should be able to handle whether or not the $piece param is capitalized or not (we did cover this before).
 * 8) this method should have a default return for when a piece that is not present in your array is passed in, or if the piece is spelled incorrectly.
 * 9) instantiate the class, call the get_move() method on two pieces that are in the class, and one that isn't.  Show me when you are done.
 */

 
?>
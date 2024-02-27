<?php
/**
 * OBJECTS, INHERITANCE, and INTERFACES Oh My!
 * 
 * PHP supports object inheritence.  As a reminder, object inheritance is a mechanism for extending an existing class.  The child class inherits all of the properties and methods of the parent class, plus adds their own properties and methods.
 * 
 * 
 * Exercise:  In a new file, create an Character class as described below
 * 
 *  _______________________________
 * | Character                     |
 *  _______________________________
 * | public $_name                 |
 * | private $_level               |
 * | protected $_class             |
 *  _______________________________
 * | public print_Level():void     |
 * | private _print_name():void    |
 * | protected _print_class():void |
 *  _______________________________
 * 
 * Then run 
 * $character = new Character(name, level, class)
 * $character->print_level();
 * $character->_print_name();
 * $character->_print_class();
 * 
 * What happenes?  Why does that happen?
 * 
 * Now create a new method in Character to print out all of the stats.  utilize the previous 3 methods for this.
 * public function print_stats():void
 * 
 * Does this work?
 * 
 * In PHP the keyword extends is used to denote a class that is inheriting from another class.  We also need to add the super() method to the constructor.  This is because in order for a child to be created you need to first create the parent.  AND pass in all of the arguments for it.  the super call is generally the FIRST thing called in your constructor. 
 * 
 * Reminder:  to create a constructor you either use function __construct()  OR function ClassName.  In the Character example, either of the following examples would work.
 * function _construct(name, level, class){}
 * function Character(name, level, class){}
 * 
 * In the child class, we will need to use the super, so it would loke like
 * function PlayerCharacter(name, level, class){
 * 		super(name, level, class);
 * 		//more stuff here as needed
 * }
 * 
 * Now create the class below
 * 
 *  ____________________________________
 * | PlayerCharacter extends Character  |
 *  ____________________________________
 * |                                    |
 *  ____________________________________
 * | public deal_damage():int           |
 * | public receive_damage($amount):int |
 *  ____________________________________
 * 
 * run these commands:
 * $player = new PlayerCharacter(name, level, class)
 * $player->print_level();
 * $player->_print_name();
 * $player->_print_class(); 
 * 
 * do these work?  why or why not?  what about  
 * $player->print_stats() ?  does this work?
 * 
 * Private properties and methods are not inherited.  PlayerCharacter  doesn't actually have $_level as a property, or _print_name():void as a function.  It DOES however have all of the protected properties and methods.  the keyword protected specifically allows for this inheritance situation to occur.  Where the child class has access to 'private'  memebers of the parent class, while other classes and outside users do not.
 * 
 * Go ahead and create a new class.  This class will be called EnemyCharacter.  It will be identical to the PlayerCharacter class.
 * 
 * We seem to have created a problem for ourselves here.  we have written the same method in two classes.  EnemyCharacter and Player Character both have deal_damage() and receive_damage() methods.  As developers you know we don't like to write the same code over and over again if we dont' have to.  But maybe it is okay?  I mean it is only two classes right?  And to be honest, even though they have the same signature, they inner workings are going to be different.
 * 
 * We have a bit of problem here though.  At some point, our game is going to be bigger than just a player and an enemy.  Maybe we will have NPCs and terrain objects, and what not.  Over time, we are going to need to create deal_damage and receive_damage in EACH of those, AND remember where they are all at.  More importantly, take a look as the scenario below, 
 * 
 * function damage_controller(PlayerCharacter $player, EnemyCharacter $enemy):void{
 * 		$player->deal_damage();
 * 		$enemy->receive_damage();
 * }
 * 
 * This kinda works for now.  right the player is dealing damage to the enemy.  But what if we wanted to reverse that?  what if we wanted to have the enemy damaging the player?  We could do some wonky if else statements but that is messy and prone to error.  One possible solution is the Abstract Class
 * 
 * Abstract classes are classes that are never meant to be instantiated.  They are only meant to be extended.  The great part of Abstract classes is that they can define common properties and methods that ALL inheriting classes either have or are required to implement.  take a look at the example below
 */

// abstract class Character{
// 	protected $_name;
// 	protected $_level;
// 	protected $_class;

// 	function Character($name, $level, $class){
// 		$this->_name = $name;
// 		$this->_level = $level;
// 		$this->_class = $class;
// 	}

// 	abstract public function deal_damage():void;
// 	abstract public function receive_damage():void;
// }

/**
 * In the abstract class Character, we now can guarantee that every class that inherits from Character will hve the name, level, and class properties.  AS well as their own implementation of the deal_damage and receive_damage methods.  
 * 
 * Now lets take a look at the method from above  damage_controller()
 * 
 * function damage_controller(Character $dealer, Character $receiver){
 * 		$dealer->deal_damage();
 * 		$receiver->receive_damage();
 * }
 * 
 * now that the player and enemy both inherit from the abastract class Character.  We can be guaranteed that the methods are present in each.  If a class were to try and inherit from the Character class now without implementing the deal_damage() and receive_damage() methods, it would through an error.  This forces the issue and helps prevent downline mistakes.
 * 
 * Exercise:  Go ahead and convert your character class to an abstract class just like above and make the changes needed to PlayerCharacter and EnemyCharacter.
 * 
 * But Justin!  I hear you saying.  Why can't we just put those methods in the normal Character class and when we inherit them, we have them automatically AND we can override them if we want?  That is a great question immaginary student plot device.  let's take a look at that scenario.
 * 
 * First off, you are 100% correct.  We could have just put the deal_damage() and receive_damage methods in the parent Character class.  That is a valid way to do it. And sometimes, the desired way to do it.  The real difference is going to lay in how you answer the following question.
 * 
 * Do I want a pure character object?  OR will it always be some type of child?  player, enemy, npc, etc...? 
 * 
 * Speaking of npcs.  What about them?  Do we want all of our NPCs to be able to do damage and receive damage?  maybe?  Maybe in NPC class, we just return void in those methods so they can't take damage.  
 * 
 * But that violates the Interface Segregation principle from SOLID.  Because now we have classes (NPC and maybe others) That will need to implement deal_damage() and receive_damage().  Even though we have no intention of ever using those methods on those classes.  And what about monsters?  Bosses?  they very defintely deal and receive damage.  But are they characters?  maybe maybe not.  How do we factor them into our method damage_controller?
 * 
 * Do we have to make a seperate method fore each combination of enemies and players?  that is a lot of work for essentially doing the same thing over and over again.  but currently our method can ONLY handle taking Characters.  And you cant use an 'or' operator to say Characters or Enemy or Boss or etc... 
 * 
 * Enter Interfaces!
 * 
 * Interfaces provide reusable types detailing specific behaviors that applications can comsume.  Essentailly think of them as mini abstract classes.  Take a look below.  
 */

// interface iDealDamage{
// 	public function deal_damage():void; 
// }

// interface iReceiveDamage{
// 	public function receive_damage(float $amount):void;
// }

/**
 * Traditionally interfaces are prfixed with lowercase i.  Your employer may have a different standard, but this is the naming convention I will ask you to use.
 * 
 * Classes are typed as their interfaces in addition to their normal types.  
 * 
 * Interfaces vs Abstract classes.  
 * Interfaces and abstract classes offer a lot of the same functionality but have some key differences.
 * 1) interfaces CANNOT have properties while abstract classes can
 * 2) all interface methods must be public, while abstract classes can have public or protected
 * 3) all methods in an interface MUST be abstract, because of this the abstract keyword is assumed and not needed.
 * 4) classes can implement MULTIPLE interfaces but cannot inherit from multiple classes. 
 * 
 * Putting this all together we now can update our method to be:
 * 
 * function damage_controller(iDealDamage $dealer, iReceiveDamge $receiver);void{
 * 		$dealer->deal_damage();
 * 		$receiver->receive_damage();
 * }
 * 
 * the true beauty here is that it no longer matters what dealer and receiver are.  They could be npcs, player, breakable terrain, or even squirrels.  All that matters that they have implemented the interfaces.  
 * 
 * Exercise:  Lets put it all together now. update your code to meet to following requirements
 * 
 *  _____________________________
 * | abstract class Character    | 
 *  _____________________________
 * | $_name                      | 
 * | $_level                     |
 * | $_class                     |
 *  _____________________________
 * | function show_stats():void; |
 *  _____________________________
 * 
 *  _____________________________
 * | iDealDamage                 |
 *  _____________________________
 * | function deal_damage()void; |
 *  _____________________________
 * 
 * *________________________________
 * | iReceiveDamage                 |
 *  ________________________________
 * | function receive_damage()void; |
 *  ________________________________
 * 
 *   _____________________________________________
 * | PlayerCharacter 							  |
 * |	extends Character 						  |
 * |	implements iDealDamage, iReceiveDamage    | 
 *  ______________________________________________
 * |                                              |
 *  ______________________________________________
 * |                                              |
 *  ______________________________________________
 * 
 *   _____________________________________________
 * | EnemyCharacter 							  |
 * |	extends Character 						  |
 * |	implements iDealDamage, iReceiveDamage    | 
 *  ______________________________________________
 * |                                              |
 *  ______________________________________________
 * |                                              |
 *  ______________________________________________
 * 
 * then instantiate a new player and new enemy
 * then run show_stats() on both of them
 * then reuse the damge controller function from above as a free method and use player and enemy as the passed in parameters.
 * 
 */

 abstract class Character{
	protected $_name;
	protected $_level;
	protected $_class;

	function Character($name, $level, $class){
		$this->_name = $name;
		$this->_level = $level;
		$this->_class = $class;
	}

    public function show_stats():void{
        echo "name: {$this->_name}\nclass: {$this->_class}\nlevel: {$this->_level}\n";
    }
}

interface iDealDamage{
	public function deal_damage():void; 
}

interface iReceiveDamage{
	public function receive_damage(float $amount):void;
}

class Player extends Character implements iDealDamage, iReceiveDamage{
    function Player($name, $level, $class){
        parent::__construct($name, $level, $class);
    }

    public function deal_damage():void{
        echo "Player does damage\n";
    }

    public function receive_damage():void{
        echo "Player takes damage\n";
    }
}

class Enemy extends Character implements iDealDamage, iReceiveDamage{
    function Enemy($name, $level, $class){
        parent::__construct($name, $level, $class);
    }

    public function deal_damage():void{
        echo "Enemy does damage\n";
    }

    public function receive_damage():void{
        echo "Enemy takes damage\n";
    }
}
<?php
/**
 * DESIGN PATTERNS
 * Design patterns are general, reusable solutions to commonly occurring software problems.  They are not code but rather patterns for the code to follow.
 * 
 * Singleton
 * The singleton pattern is a design pattern that allows for only a single instance of an object to exists.  This is useful in situations like services.  Services often work with application state. You don't want several duplicate objects updating application state simultaneously.  This creates a race condition and results in unreliable state.  The Singleton pattern solves this issue.
 * 
 * creating a singleton class is very straight forward.
 * 1) create a private static property to hold a reference to an object of the singleton class
 * 2) make the constructor private (it is public by default) so no outside class can make an instance
 * 3) create a public static function to get an instance of the class.  This function will check to see if an instance has already been created.  if one hasn't, it will create one and save it.  Then return the reference.
 * 4) Finally, instead of calling a new instance of the class, you would call the get_instance method
 */

class SingletonExample{
	private static $_singleton; //this will be of type SingletonExample

	private function __construct(){
		echo "creating instance";
	}

	public static function get_instance(){
		if(self::$_singleton == null){
			self::$_singleton= new SingletonExample();
		}

		return SingletonExample::$_singleton;
	}
}

$s = SingletonExample::get_instance();

/**
 * Strategy Pattern
 * Strategy pattern is a behavior pattern that turns a set of behaviors into objects and makes them interchangeable inside the original object. 
 * 
 * This pattern allows an object to fucus ONLY on the one thing is it supposed to do, while not caring about how other things get implemented.  In the example below we have an iDatabse interface, a MySqlService, and an ApplicantService.
 * 
 * The applicant service ONLY deals with things surrounding applicants. In some cases that does mean adding a new applicant to the databse.  However, adding to the database service's job.  But it is NOT the databse service's job to prep and create the applicant.  Its only job is to post to and get from the database.
 * 
 * So what we do is create an iDatabase interface that defines exactly what a databse service is expected to do.  it needs to implement 4 methods.  get, post, update, delete.  Now it can do a lot more than that.  But it has to do at least that, and everyone who relies on a databse service can rely on those four methods.
 * 
 * Next we create the MySqlService which implements iDatabase.  We now have a database service that is specific to MySql, AND everyone knows what to expect from it.
 * 
 * Inside of the ApplicantService, we do not create our own instance of the MySqlService.  That creates a tight coupling, and is prone to cause breaks if we ever need to change.  Instead we pass in a parameter to the constructor that is of type iDatabase.  We then store that reference.
 * 
 * The beauty here is that we ahve now separated concerns so that the ApplicantService only needs to know how to create the applicant.  While the MySqlService can handle the responsibilty of actually inserting the new applicant into the database.
 * 
 * Even better, if in the future, we need to switch to a Postress databse, or maybe we switch over to NoSQL and start using MongoDb, it won't matter.  Our code is not tightly coupled with the database service.  As long, as the new service implements iDatabase, the ApplicantService does not care. 
 */

interface iDatabase{
	function get(string $query):array;
	function post(string $query):array;
	function update(string $query):array;
	function delete(string $query):array;
}

class MySqlService implements iDatabase{
	function __construct(){}

	public function get(string $query):array{return [];}
	public function post(string $query):array{return [];}
	public function update(string $query):array{return [];}
	public function delete(string $query):array{return [];}
}

class ApplicantService{
	private $_db;
	function __construct(iDatabase $database){
		$this->_db = $database;
	}

	public function add_new_applicant($name, $skills, $level):void{
		$query = "INSERT INTO applicants (`name`, `skills`, `level`) VALUES ($name, $skills, $level);";
		try{
			$this->_db->post($query);
		}catch(Throwable $th){
			throw new Exception("Error Processing Request", 1);
			
		}
		
	}
}

/**
 * Model View Control
 * The MVC pattern is an architectural pattern that separates an application into three main components.  The Model, the View, and the Controller.  This keeps the code cleaner and allows for reusable components.  This lends to a more modular code base.  
 * 
 * Model
 * the model is responsible for dealing with data and business logic directly.  It also generally communicates with the database via an abstraction layer.
 * 
 * View
 * The view is what displays data for the end user.  It is passive and gerenally should not be making any major decisions.  It only shows model data, and sends user input to the controller.
 * 
 * Control
 * The controller is a conductor of the symphony.  It is the intermediary between the view and the model.  It receives user input, updates/queries the model accordingly, and then uses the new data from the model, to update the view.
 */

class PageModel{ //page model ONLY deals with creating and updating a page object
	private $_title; 
	private $_author;
	private $_content;
	private $_date;

	function __construct($data){
		//converts raw data into page object
	}
}

class PageService{ //page service deals with logic around page objects
	private $_db;

	function __construct(iDatabase $database){
		$this->_db = $database;
	}

	public function get_page_data_by_id(int $id):Page{
		$query = "SELECT * FROM 'pages' WHERE '_id' = $id;";
		try{
			$data = $this->_db->get($query);
			return new Page($data);
		}catch(Throwable $th){
			throw new Exception("Error Processing Request", 1);
		}
		
	}
}

class PageController{ //page controller ONLY acts as the coordinator between page model and page view
	protected $_pageService;

	function __construct($service){
		$this->_pageService = $service;
	}

	function render($view, $data=[]){
		extract($data);						//because $data	was extracted here into memory, 
		inlcude("Views/$view.php");			//it is available in the view
	}

	function get_page($id){
		$data = $this->_pageService->get_page_data_by_id($id);

		$this->render('page/index', [$data]);
	}
}

/**
 * pageview //page view ONLY shows page data
 * 
 * <div>
 * 		<div><p><?= $data->get_title()</p></div>
 * 		<div><p><?= $data->get_content()?></p></div>
 * 		<div><p><?= $data->get_author()?></p></div>
 * </div>
 */
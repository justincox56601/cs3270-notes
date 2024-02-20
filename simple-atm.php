<?php

class CardHolder{
	private $_name;
	private $_accountNumber;
	private $_pin;
	private $_balance;

	function __construct(string $name, string $accountNumber, int $pin, float $balance){
		$this->_name = $name;
		$this->_accountNumber = $accountNumber;
		$this->_pin = $pin;
		$this->_balance = $balance;
	}

	public function get_accountNumber():string{
		return $this->_accountNumber;
	}

	public function get_pin(){
		return $this->_pin;
	}

	public function get_name():string{
		return $this->_name;
	}

	public function set_balance(float $amount):void{
		$this->_balance = $amount;
	}

	public function get_balance():float{
		return $this->_balance;
	}
}

class Database{
	private $_cardHolders;
	function __construct(){
		$this->_init();
	}

	private function _init():void{
		$this->_cardHolders = [
			new CardHolder("Jessi", "4411564312347676", 5555, 1100.00),
			new CardHolder("Abraham", "4411564312342356", 1234, 2100.00),
			new CardHolder("Charlie", "4411564312344545", 7272, 130.00),
			new CardHolder("Austen", "4411564312347411", 6543, 22000.00),
		];
	}

	public function find_cardHolder_by_account(string $accountNumber):?CardHolder{
		foreach($this->_cardHolders as $cardHolder){
			if($cardHolder->get_accountNumber() === $accountNumber){
				return  $cardHolder;
			}
		}

		return null;
	}
}

class Atm{
	private $_db;
	function __construct($db){
		$this->db = $db;
		$this->_init();
	}

	private function _init(){
		//this starts the whole show

		$this->show_welcome_message();
		$user = $this->get_user();
		$this->confirm_pin($user);

		do {
			$this->show_options($user);
			$selection = (int)readLine();

			switch ($selection) {
				case 1:
					$this->show_balance($user);
					break;
				case 2:
					$this->deposit($user);
					break;
				case 3: 
					$this->withdraw($user);
					break;
				default:
					break;
			}
		} while ($selection != 4);
		
		$this->show_exit_message();
	}

	public function deposit(CardHolder $user):void{
		print("How much would you like to deposit?\n");
		try {
			$amount = (float)readline();
			$user->set_balance($user->get_balance() + $amount);
			print("Success.  Your new balance is: {$user->get_balance()}\n");
		} catch (\Throwable $th) {
			print("There seems to have been an error, please try agian later.\n");
		}
	}

	public function withdraw(CardHolder $user):void{
		print("How much would you like to withdraw?\n");
		try{
			$amount = (float)readline();
			if($user->get_balance() > $amount){
				$user->set_balance($user->get_balance() - $amount);
				print("Success.  Your new balance is: {$user->get_balance()}\n");
			}else{
				print("Insufficent funds.  Your balance is: {$user->get_balance()}\n");
			}
		}catch(\Throwable $th){
			print("There seems to have been an error, please try agian later.\n");
		}
		

	}

	public function show_balance(CardHolder $user):void{
		print("Your balance is: {$user->get_balance()}\n");
	}

	public function show_welcome_message():void{
		print("Welcome to the Simple ATM\n");
	}

	public function show_exit_message():void{
		print("Have a great day!\n");
	}

	public function show_options(CardHolder $user):void{
		print("Welcome {$user->get_name()}!  Please select one of the options below\n");
		print("1: View Balance\n");
		print("2: Deposit\n");
		print("3: Withdraw\n");
		print("4: Exit\n");
	}

	public function get_user():CardHolder{

		while(true){
			print("Please enter your card number.\n");
			$cardNumber = readline();
			if($cardNumber == "exit"){break;}
			
			$user = $this->db->find_cardHolder_by_account($cardNumber);

			if($user != null){
				break;
			}else{
				print("Card number not recognized. Please try again.\n");
			}

			
		}

		return $user;
	}

	public function confirm_pin(CardHolder $user):void{
		while(true){
			print("Please enter your PIN.\n");
			$pin = (int)readline();

			if($user->get_pin() === $pin){
				break;
			}else{
				print("Incorrect Pin. Please try again.\n");
			}
		}	
	}


}

$db = new Database();
$atm = new Atm($db);
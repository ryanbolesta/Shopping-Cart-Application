<!--    Name:       	Ryan Bolesta
		Major:			CS/SD
        Creation Date:  October 10, 2017
		Due Date:		November 15, 2017
        Course:     	CSC242
        Professor Name: Dr. Tan
        Assignment: 	Shopping Cart (#3)
        Filename:   	item.php
        Purpose:    	Contains the item class which holds a pid, name, and
						price. Methods exist for constructing an item and 
						retrieving the attributes-->
						
<?php  
// item.php - a sample Item class 
// link: http://csit.kutztown.edu/~tan/lab/lab-05-1-item.php 
// Based on Creating a Shopping Cart Class Using Object-Oriented Programming 
//       in PHP by Larry Ullman 
// This class could be extended by individual applications. 
class Item { 
    // Item attributes are all protected: 
    protected $pid; 
    protected $name; 
    protected $price; 
     
    // Constructor populates the attributes: 
    public function __construct($pid, $name, $price)    { 
        $this->pid = $pid; 
        $this->name = $name; 
        $this->price = $price; 
    } 
     
    // Method that returns the ID 
    public function getPID() { 
        return $this->pid; 
    } 

    // Method that returns the name 
    public function getName() { 
        return $this->name; 
    } 

    // Method that returns the price 
    public function getPrice() { 
        return $this->price; 
    } 

} // End of Item class 
?>
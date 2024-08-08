<?php

class Book {
	public $title;
	public $author;
	public $price;
	public $stock;
	public $language;
	public $description;
	public $genre;
	
	public function __construct($title, $author, $price, $stock, $language, $description, $genre)  
    {  
        $this->title = $title;
	    $this->author = $author;
		$this->price = $price;
		$this->stock = $stock;
		$this->language = $language;
	    $this->description = $description;
		$this->genre = $genre;
    } 
}

?>
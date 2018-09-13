<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author 320021712
 */
class Controller {
      protected $loggedin;
	
	//constructor
	function __construct($loggedin) 
	{  
            //initialise the model
            $this->loggedin=$loggedin;
	}
        
}

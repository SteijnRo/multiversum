<?php
require_once("models/DataHandler.php");

class ContactsLogic {
    public function __construct() {
        $this->DataHandler = new DataHandler("localhost", "mysql", "mvc", "mvcUser", "mvcPass");
    }
    public function __destruct() {}
    public function createContact() {}
    public function readContact() {}
    public function readContacts() {
        try {
            
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function updateContact() {}
    public function deleteContact() {}
}
?>
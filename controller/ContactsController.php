<?php
require_once("model/ContactsLogic.php");

class ContactsController {
    public function __construct() {
        $this->ContactsLogic = new ContactsLogic();
    }
    public function __destruct() {}
    public function handleRequest(){
        try {
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function collectCreateContact() {}
    public function collectReadContact() {
        $contacts = $this->ContactsLogic->readContacts();
    }
    public function collectUpdateContact() {}
    public function collectDeleteContact() {}
}
?>
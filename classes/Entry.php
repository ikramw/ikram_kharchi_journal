<?php 
class Entries{
    public $title;
    public $content;
    public $createdAt;
    public $userID;

    function __construct($entryID, $title, $content, $createdAt, $userID){
        $this->entryID = $entryID;
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = $createdAt;
        $this->userID = $userID;

    }
}
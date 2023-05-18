<?php

use DateTime;

class Comment
{
    private string $comment;
    private User $user;
    private DateTime $CreationTime; 

    public function __construct(User $user, string $comment)
    {
        $this->user=$user;
        $this->comment=$comment;
        $this->CreationTime=new DateTime();
    }
    public function showComment()
    {
        $this->user->showProfile();
        echo "<dt>comment:</dt><dd> $this->comment  </dd>";
        echo $this->CreationTime->format('m/d/Y H:i:s'); 
    }
    public function getUser(){
        return $this->user;

    }
    public function getCreationTime()
    {
        return $this->CreationTime;
    }

}

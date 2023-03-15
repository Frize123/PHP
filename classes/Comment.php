<?php
require_once 'classes/User.php';


class Comment
{
    private string $comment;
    private User $user;


    public function __construct(User $user, string $comment)
    {
        $this->user=$user;
        $this->comment=$comment;
    }
    public function showComment()
    {
        $this->user->showProfile();
        echo "<dt>comment:</dt><dd> $this->comment  </dd>";
    }
    public function getUser(){
        return $this->user;

    }
}
<?php
require './vendor/autoload.php';
require_once 'Classes/User.php';
require_once 'Classes/Comment.php';

echo 'User 1 : ';
$user=new User(-1,'fadefadfsfasfasfafasf', 'res', '123');
$user->showProfile();

echo '<br><br><br>User 2 : ';
$user1=new User(1,'', '', 'sdgdsgsd');
$user1->showProfile();

echo '<br><br><br>User 3 : ';
$user2=new User(1,'g', 'res@inbox.ru', '');
$user2->showProfile();

echo '<br><br><br>User 4 : ';
$user3=new User('fsf','Fade', 'res@inbox.ru', 'gdsssssssssgaraagarhhagergearga');
$user3->showProfile();

echo '<br><br><br>Users and Comment : ';
$comments=[new Comment(new User(1,'Frize', 'rest@inbox.ru', '12345678'), ' user comment1'), 
new Comment(new User(2,'Vlad', 'res@inbox.ru', '12345678'), ' user comment2'), 
new Comment(new User(3,'Fade', 'res@inbox.ru', '12345678'), ' user comment3'),
new Comment(new User(4,'Dan', 'res@inbox.ru', '12345678'), ' user comment4')];

$datetime=$comments[1]->getCreationTime();
foreach($comments as $i)
{
    if($datetime < $i->getCreationTime())
        {
            $i->showComment();
        }
}

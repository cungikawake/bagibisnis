<?php
namespace App\Observers;

use App\Notifications\NewItem;
use App\Product;
use App\User;

class ItemObserver
{
    public function created(Product $item)
    {
        $author = $item->user;
        $users = User::all();
        foreach ($users as $user) {
            $user->notify(new NewItem($item,$author));
        }
    }
}
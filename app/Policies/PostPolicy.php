<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function author(User $user, Post $post): Response
    {
        return $user->id === $post->user_id
                ? Response::allow()
                : Response::deny('No tienes acceso a esta publicación');
    }

    // public function published(?User $user, Post $post){

    //     if($post->status == 2){
    //         return true;
    //     }else{
    //         return false;
    //     }

    // }

    public function published(?User $user, Post $post): Response
    {
        return $post->status == 2
                ? Response::allow()
                : Response::deny('Post no publicado');
    }
}

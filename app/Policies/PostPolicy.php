<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{   
    /**
     * Create policy fillter.
     */
    public function before(User $user, $ability)
    {
        // 관리자 권한이 있는 경우 모든 권한을 허용
        if ($user->is_admin) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     * $user: authenticated user
     * $post: The post being accessed
     */ 
    public function viewAny(User $user): bool
    {
        return True; // 모든 사용자가 게시물을 볼 수 있도록 허용
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        return True;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return True; // 모든 사용자가 게시물을 생성할 수 있도록 허용
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {   
        return $user->id === $post->user_id; // 게시물의 작성자만 수정할 수 있도록 허용
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->id === $post->user_id; // 게시물의 작성자만 삭제할 수 있도록 허용
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        return false;
    }
}

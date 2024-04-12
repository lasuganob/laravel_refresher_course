<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;

class PostAccessPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $post_user_id = Post::find($request->post->id)->user_id;

        if(auth()->user()->is_admin == 1 || auth()->user()->id == $post_user_id) {
            return $next($request);
        }

        abort(401);

    }
}

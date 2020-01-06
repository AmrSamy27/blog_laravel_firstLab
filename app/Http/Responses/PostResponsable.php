<?php
namespace App\Http\Responses;
use Illuminate\Contracts\Support\Responsable;

class PostResponsable implements Responsable
{
    public function __construct($post = null)
    {
        $this->post = $post ?? 'There Is No Post'; 
    }

    public function status()
    {

        switch($this->post) {
            case 'There Is No Post':
                return 418;
            default:
                return 200;
        }
    }

    public function toResponse($request)
    {
        return response(
            $this->post,
            $this->status(),
            ['post' => $this->post,'user'=>$this->post->user]
        );
    }
} ?>
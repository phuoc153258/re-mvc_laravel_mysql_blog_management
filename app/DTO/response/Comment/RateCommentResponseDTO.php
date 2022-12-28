<?php

namespace App\DTO\Response\Comment;

class RateCommentResponseDTO
{
    private ?int $id;
    private ?int $comment_id;
    private ?int $user_id;
    private ?int $rate_id;
    private string $created_at;
    private string $updated_at;
    private int $rate_level;
    public function __construct($rate = null)
    {
        if ($rate != null) {
            $this->id = $rate->id;
            $this->comment_id = $rate->comment_id;
            $this->user_id = $rate->user_id;
            $this->rate_id = $rate->rate_id;
            $this->created_at = formatDate($rate->created_at);
            $this->updated_at = formatDate($rate->updated_at);
            $this->rate_level = $rate->rates->level;
        }
    }

    public function toJSON()
    {
        return [
            'id' => $this->id,
            'comment_id' => $this->comment_id,
            'user_id' => $this->user_id,
            'rate_id' => $this->rate_id,
            'rate_level' => $this->rate_level,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}

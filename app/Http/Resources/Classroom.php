<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Classroom extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'info_title' => $this->info_title,
            'info_image' => $this->info_image,
            'info_description' => $this->info_description,
            'info_link' => $this->info_link,
            'info_remark' => $this->info_remark,
            'video_title' => $this->video_title,
            'video_link' => $this->video_link,
            'file1' => $this->file1,
            'file2' => $this->file2,
            'file3' => $this->file3,
            'file4' => $this->file4,
            'file5' => $this->file5,
            'remark' => $this->remark,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y'),
        ];
    }
}

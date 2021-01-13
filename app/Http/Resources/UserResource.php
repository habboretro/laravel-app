<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'username' => $this->username,
            'account_created' => $this->account_created,
            'last_login' => $this->last_login,
            'last_online' => $this->last_online,
            'motto' => $this->motto,
            'look' => $this->look,
            'gender' => $this->gender,
            'rank' => $this->rank,
            'credits' => $this->credits,
            'online' => $this->online,
            'real_name' => $this->when($request->user()->id ?? null === $this->id, $this->real_name),
            'mail' => $this->when($request->user()->id ?? null === $this->id, $this->mail),
            'mail_verified' => $this->when($request->user()->id ?? null === $this->id, $this->mail_verified),
            'account_day_of_birth' => $this->when($request->user()->id ?? null === $this->id, $this->account_day_of_birth),
            'auth_ticket' => $this->when($request->user()->id ?? null === $this->id, $this->auth_ticket),
            'ip_register' => $this->when($request->user()->id ?? null === $this->id, $this->ip_register),
            'ip_current' => $this->when($request->user()->id ?? null === $this->id, $this->ip_current),
            'machine_id' => $this->when($request->user()->id ?? null === $this->id, $this->machine_id),
            'home_room' => $this->when($request->user()->id ?? null === $this->id, $this->home_room),
            'secret_key' => $this->when($request->user()->id ?? null === $this->id, $this->secret_key),
            'pincode' => $this->when($request->user()->id ?? null === $this->id, $this->pincode),
            'extra_rank' => $this->when($request->user()->id ?? null === $this->id, $this->extra_rank),
            'permissions' => $this->permissions,
            'balance' => $this->when($request->user()->id ?? null === $this->id, $this->balance),
        ];
    }
}

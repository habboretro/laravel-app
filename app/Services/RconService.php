<?php

namespace App\Services;

use App\Models\User;
use App\Models\Permission;

class RconService
{
    /**
     * Socket creation
     *
     * @var Socket resource
     */
    protected $socket;

    /**
     * Socket connected
     *
     * @var boolean resource
     */
    protected $connected;

    /**
     * Initialise socket connection
     *
     * @return void
     */
    protected function connect(): void
    {
        if (!config('habbo.rcon.enabled')) return;
        if (!function_exists('socket_create')) abort(500, 'Please enable sockets in your php.ini!');
        $this->socket = socket_create(config('habbo.rcon.domain'), config('habbo.rcon.type'), config('habbo.rcon.protocol'));
        if (!$this->socket) abort(500, sprintf('socket_create() failed: reason: %s', socket_strerror(socket_last_error())));
        $this->connected = socket_connect($this->socket, config('habbo.rcon.host'), config('habbo.rcon.port'));
        if (!$this->connected) abort(500, sprintf('socket_connect() failed: reason: %s', socket_strerror(socket_last_error())));
    }

    /**
     * Send a packet to the tcp server.
     *
     * @param string $key
     * @param mixed|null $data
     * @return mixed
     */
    public function sendPacket(string $key, $data = null)
    {
        $this->connect();
        $data = json_encode(['key' => $key, 'data' => $data]);
        $request = socket_write($this->socket, $data, strlen($data));
        if ($request === false) abort(500, sprintf(socket_strerror(socket_last_error($this->socket))));
        $response = socket_read($this->socket, 2048);
        return json_decode($response);
    }

    /**
     * Send gift to a user.
     *
     * @param User $user
     * @param integer $item_id
     * @param string $message
     * @return mixed
     */
    public function sendGift(User $user, int $item_id, string $message = 'Here is a gift.')
    {
        return $this->sendPacket('sendgift', [
            'user_id' => $user->id,
            'itemid' => $item_id,
            'message' => $message,
        ]);
    }

    /**
     * Give credits to user.
     *
     * @param user $user
     * @param int $credits
     * @return mixed
     */
    public function giveCredits(user $user, int $credits)
    {
        return $this->sendPacket('givecredits', [
            'user_id' => $user->id,
            'credits' => $credits,
        ]);
    }

    /**
     * Give badge to a user.
     *
     * @param User $user
     * @param string $badge
     * @return mixed
     */
    public function giveBadge(User $user, string $badge)
    {
        return $this->sendPacket('givebadge', [
            'user_id' => $user->id,
            'badge' => $badge,
        ]);
    }

    /**
     * Update users motto.
     *
     * @param User $user
     * @param string $motto
     * @return mixed
     */
    public function setMotto(User $user, string $motto)
    {
        return $this->sendPacket('setmotto', [
            'user_id' => $user->id,
            'motto' => $motto,
        ]);
    }

    /**
     * Update the word filter.
     *
     * @return mixed
     */
    public function updateWordFilter()
    {
        return $this->sendPacket('updatewordfilter');
    }

    /**
     * Update user data.
     *
     * @param User $user
     * @param string $column
     * @param mixed $value
     * @return mixed
     */
    public function updateUser(User $user, string $column, $value)
    {
        return $this->sendPacket('updateuser', [
            'user_id' => $user->id,
            $column => $value
        ]);
    }

    /**
     * Update users username.
     *
     * @param User $user
     * @param string $username
     * @return mixed
     */
    public function changeUsername(User $user, string $username)
    {
        return $this->updateUser($user, 'username', $username);
    }

    /**
     * Give user points by type.
     *
     * @param User $user
     * @param int $type
     * @param int $amount
     * @return mixed
     */
    public function givePoints(User $user, int $type, int $amount)
    {
        return $this->sendPacket('givepoints', [
            'user_id' => $user->id,
            'points' => $amount,
            'type' => $type,
        ]);
    }

    /**
     * Give user diamonds.
     *
     * @param User $user
     * @param int $amount
     * @return mixed
     */
    public function giveDiamonds(User $user, int $amount)
    {
        return $this->givePoints($user, 5, $amount);
    }

    /**
     * Give user duckets.
     *
     * @param User $user
     * @param int $amount
     * @return mixed
     */
    public function giveDuckets(User $user, int $amount)
    {
        return $this->givePoints($user, 0, $amount);
    }

    /**
     * Set users rank.
     *
     * @param User $user
     * @param Permission $permission
     * @return mixed
     */
    public function setRank(User $user, Permission $permission)
    {
        return $this->sendPacket('setrank', [
            'user_id' => $user->id,
            'rank' => $permission->id,
        ]);
    }

    /**
     * Update the catalog.
     *
     * @return mixed
     */
    public function updateCatalog()
    {
        return $this->sendPacket('updatecatalog');
    }

    /**
     * Send user an alert.
     *
     * @param User $user
     * @param string $message
     * @return mixed
     */
    public function alertUser(User $user, string $message)
    {
        return $this->sendPacket('alertuser', [
            'user_id' => $user->id,
            'message' => $message,
        ]);
    }

    /**
     * Send user to a room.
     *
     * @param User $user
     * @param int $roomId
     * @return mixed
     */
    public function forwardUser(User $user, int $roomId)
    {
        return $this->sendPacket('forwarduser', [
            'user_id' => $user->id,
            'room_id' => $roomId,
        ]);
    }
}

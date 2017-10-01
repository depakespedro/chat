<?php

namespace Tests\Unit;


use App\Contracts\UserContract;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    public function testCheckRegisterRepository()
    {
        $messageRepository = app('user');

        $this->assertInstanceOf(UserContract::class, $messageRepository);

        $messageRepository = app(UserContract::class);

        $this->assertInstanceOf(UserContract::class, $messageRepository);
    }

    public function testCheckHelper()
    {
        $messageRepository = user();

        $this->assertInstanceOf(UserContract::class, $messageRepository);
    }

    public function testCreateUserWithCorrectAttribute()
    {
        $user = user()->create('test name');

        $this->assertInstanceOf(User::class, $user);

        $this->assertDatabaseHas('users', [
            'name' => $user->name,
        ]);
    }

    public function testCreateUserWithIncorrectAttribute()
    {
        $user = user()->create('te');

        $this->assertFalse($user->exists);

        $this->assertDatabaseMissing('users', [
            'name' => $user->name,
        ]);

        $errors = $user->getErrors()->toArray();

        $this->assertArrayHasKey('name', $errors);
    }

    public function testLoggedUserWithOfflineStatus()
    {
        $user = factory(User::class)->create();

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'online' => false,
        ]);

        $isLogged = user()->login($user);

        $this->assertTrue($isLogged);
    }

    public function testLoggedUserWithOnlineStatus()
    {
        $date = Carbon::now();

        $user = factory(User::class)->create([
            'online' => true,
            'last_updated_at' => $date,
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'online' => true,
            'last_updated_at' => $date,
        ]);

        $isLogged = user()->login($user);

        $this->assertFalse($isLogged);
    }

    public function testLogoutUser()
    {
        //todo подумать над реализацией, как устроены сессии в юнит тестах
    }
}
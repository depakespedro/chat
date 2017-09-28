<?php

namespace Tests\Unit;

use App\Contracts\MessageContract;
use App\Message;
use App\Repositories\MessageRepository;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessageRepositoryTest extends TestCase
{
    public function testCheckRegisterRepository()
    {
        $messageRepository = app('message');

        $this->assertInstanceOf(MessageRepository::class, $messageRepository);

        $messageRepository = app(MessageContract::class);

        $this->assertInstanceOf(MessageRepository::class, $messageRepository);
    }

    public function testCheckHelper()
    {
        $messageRepository = message();

        $this->assertInstanceOf(MessageRepository::class, $messageRepository);
    }

    public function testCreateMessageWithCorrectAttributes()
    {
        $user = factory(User::class)->create();

        $text = 'test text';

        $message = message()->create($user, $text);

        $this->assertInstanceOf(Message::class, $message);
    }

    public function testCreateMessageWithIncorrectAttributes()
    {
        $user = factory(User::class)->create();

        $text = '';

        $message = message()->create($user, $text);

        $this->assertFalse($message->exists);

        $errors = $message->getErrors()->toArray();

        $this->assertArrayHasKey('text', $errors);
    }
}
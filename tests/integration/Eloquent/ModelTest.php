<?php

use App\Journal;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;
    /**
     * @test
     * @return void
     */
    public function assign_a_created_user_on_safe()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $journal = factory(Journal::class)->create();

        $this->assertEquals($user->id, $journal->createdUser->id);
    }

    /**
     * @test
     * @return void
     */
    public function assign_a_updated_user_on_safe()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $journal = factory(Journal::class)->create();
        $this->assertEquals($user->id, $journal->updatedUser->id);
            }

    /**
     * @test
     * @return void
     */
    public function assign_a_new_updated_user_on_safe()
    {
        $userCreated = factory(User::class)->create();
        $userUpdated = factory(User::class)->create();
        $this->actingAs($userCreated);

        $journal = factory(Journal::class)->create();

        $this->actingAs($userUpdated);

        $journal->title = 'test';
        $journal->safe();

        $this->assertEquals($userUpdated->id, $journal->updatedUser->id);
    }
}

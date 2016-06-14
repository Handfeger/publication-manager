<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JournalTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;
    
    public function setUp()
    {
        parent::setUp();
        
//        factory()
    }

    /**
     * @test
     *
     * Find journal by title
     *
     * @return void
     */
    public function find_a_journal_by_title()
    {
        //TODO
//        \App\Journal
    }
}

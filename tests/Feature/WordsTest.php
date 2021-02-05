<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WordsTest extends TestCase
{
    use WithFaker;
    use DatabaseTransactions;

    public function test_anExistingWordCanBeFetched () {
        $word = 'elevator';

        $response = $this->get("api/words/$word");
        $response->assertSee($word);
    }

    public function test_aNonExistingWordCannotBeFetched () {
        $word = 'dfgdfgfd';

        $response = $this->get("api/words/$word");
        $response->assertStatus(404);
    }

    public function test_theAntonymsOfAWordCanBeFetched () {
        $word = 'elevator';

        $response = $this->get("api/words/$word/antonyms");
        $response->assertSee($word);
    }
}

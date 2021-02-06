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

    public function test_savedWordsCanBeFetched () {
        $this->withoutExceptionHandling();

        $response = $this->get("api/previous-searches");
        $response->assertSuccessful();
    }

    public function test_anExistingWordCanBeFetched () {
        $this->withoutExceptionHandling();

        $word = 'elevator';

        $response = $this->get("api/words/$word");
        $response->assertSee($word);
    }

    public function test_aWordIsSavedWhenItExists () {
        $this->withoutExceptionHandling();

        # test 
        $this->test_anExistingWordCanBeFetched();

        $this->assertDatabaseHas('previous_searches', [
            'word' => 'elevator',
        ]);
    }

    public function test_aNonExistingWordCannotBeFetched () {
        $this->withoutExceptionHandling();

        $word = 'dfgdfgfd';

        $response = $this->get("api/words/$word");
        $response->assertStatus(404);
    }

    public function test_theAntonymsOfAWordCanBeFetched () {
        $this->withoutExceptionHandling();

        $word = 'free';

        $response = $this->get("api/words/$word/antonyms");
        $response->assertSee($word);
    }
}

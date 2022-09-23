<?php

namespace Tests\Feature;

use App\Models\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function list_of_ideas_show_on_main_page()
    {
        $ideaOne = Idea::factory()->create([
            'title' => 'My first title',
            'description' => 'description of my first idea title',
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => 'My second title',
            'description' => 'description of my second idea title',
        ]);

        $response = $this->get(route('idea.index'));
        $response->assertSuccessful();
        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->description);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function singel_idea_shows_correctly_on_the_show_page()
    {
        $idea = Idea::factory()->create([
            'title' => 'My first title',
            'description' => 'description of my first idea title',
        ]);

        $response = $this->get(route('idea.show', $idea));

        $response->assertSuccessful();
        $response->assertSee($idea->title);
        $response->assertSee($idea->description);
    }

    public function ideas_pagination_works()
    {
        Idea::factory(Idea::PAGINATION_COUNT + 1)->create();

        $ideaOne = Idea::find(1);
        $ideaOne->title = 'My first idea';
        $ideaOne->save();

        $ideaEleven = Idea::find(11);
        $ideaEleven->title = 'My 11 idea';
        $ideaEleven->save();

        $response = $this->get(route('/'));
        $response->assertSee($ideaOne->title);
        $response->assertDontSee($ideaEleven->title);

        $response = $this->get(route('/?page=2'));

        $response->assertDontSee($ideaOne->title);
        $response->assertSee($ideaEleven->title);
    }

    public function same_idea_title_different_slug()
    {
        $ideaOne = Idea::factory()->create([
            'title' => 'My first title',
            'description' => 'description of my first idea title',
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => 'My first title',
            'description' => 'description of my second idea title',
        ]);

        $response = $this->get(route('idea.show', $ideaOne));

        $response->assertSuccessful();
        $this->assertTrue(request()->path() === 'ideas/my-first-idea');

        $response = $this->get(route('idea.show', $ideaTwo));
        $response->assertSuccessful();
        $this->assertTrue(request()->path() === 'ideas/my-first-idea-1');

    }
}

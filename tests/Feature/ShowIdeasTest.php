<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
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

        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);
        $statusConsidering = Status::factory()->create(['name' => 'Considering', 'classes' => 'bg-purple text-white']);

        $categoryOne = Category::factory()->create(['name' => 'category 1']);
        $categoryTwo = Category::factory()->create(['name' => 'category 2']);

        $ideaOne = Idea::factory()->create([
            'title' => 'My first title',
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
            'description' => 'description of my first idea title',
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => 'My second title',
            'category_id' => $categoryTwo->id,
            'status_id' => $statusConsidering->id,
            'description' => 'description of my second idea title',
        ]);

        $response = $this->get(route('idea.index'));
        $response->assertSuccessful();

        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);

        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->description);

        $response->assertSee($categoryTwo->name);
        $response->assertSee($categoryOne->name);

        $response->assertSee($statusConsidering->name);


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

        $category = Category::factory()->create(['name', 'Category 1']);

        Idea::factory(Idea::PAGINATION_COUNT + 1)->create([
            'category_id' => $category->id,
        ]);

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
        $category = Category::factory()->create(['name', 'Category 1']);

        $ideaOne = Idea::factory()->create([
            'category_id' => $category->id,
            'title' => 'My first title',
            'description' => 'description of my first idea title',
        ]);

        $ideaTwo = Idea::factory()->create([
            'category_id' => $category->id,
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

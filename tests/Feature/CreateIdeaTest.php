<?php

namespace Tests\Feature;

use App\Http\Livewire\CreateIdea;
use App\Models\Category;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CreateIdeaTest extends TestCase
{
    use RefreshDatabase;

    public function create_idea_form_does_not_show_when_logged_out()
    {
        $response = $this->get(route('idea.index'));
        $response->assertSuccessful();

        $response->assertSee('please login to create an idea.');
        $response->assertDontSee('let us know what you would link and we\'ll take a look over!');
    }


    public function create_idea_form_does_not_show_when_logged_in()
    {

        $response = $this->actingAs(User::factory()->create())->get(route('idea.index'));
        $response->assertSuccessful();

        $response->assertSee('let us know what you would link and we\'ll take a look over!', false);
        $response->assertDontSee('please login to create an idea.');
    }

    public function main_page_contains_create_idea_livewire_component()
    {
        $this->actingAs(User::factory()->create())
            ->get(route('idea.index'))
            ->assertSeeLivewire('create-idea');
    }

    public function create_idea_form_validation_works()
    {
        Livewire::actingAs(User::factory()->create())
            ->test(CreateIdea::class)
            ->set('title', '')
            ->set('category', '')
            ->set('description', '')
            ->call('createIdea')
            ->assertHasErrors(['title', 'category', 'description'])
            ->assertSee('this title required');
    }

    public function creating_an_idea_works_correctly()
    {
        $user = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2']);

        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);

        Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title', 'my First Idea')
            ->set('category', $categoryOne->id)
            ->set('description', 'this is my first idea description')
            ->call('createIdea')
            ->assertRedirect('/');

        $response = $this->actingAs($user)->get('idea.index');

        $response->assertSuccessful();

        $response->assertSee('My First Idea');
        $response->assertSee('This is my first idea');

        $this->assertDatabaseHas('ideas', [
            'title' => 'My First Idea'
        ]);
    }


    public function creating_tow_ideas_with_same_title_still_works_but_has_different_slug()
    {
        $user = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2']);

        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);

        Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title', 'my First Idea')
            ->set('category', $categoryOne->id)
            ->set('description', 'this is my first idea description')
            ->call('createIdea')
            ->assertRedirect('/');

        $response = $this->actingAs($user)->get('idea.index');

        $response->assertSuccessful();

        $response->assertSee('My First Idea');
        $response->assertSee('This is my first idea');

        $this->assertDatabaseHas('ideas', [
            'title' => 'My First Idea',
            'slug' => 'my-first-idea',
        ]);


        Livewire::actingAs($user)
            ->test(CreateIdea::class)
            ->set('title', 'my First Idea')
            ->set('category', $categoryOne->id)
            ->set('description', 'this is my first idea description')
            ->call('createIdea')
            ->assertRedirect('/');

        $response = $this->actingAs($user)->get('idea.index');

        $response->assertSuccessful();

        $response->assertSee('My First Idea');
        $response->assertSee('This is my first idea');

        $this->assertDatabaseHas('ideas', [
            'title' => 'My First Idea',
            'slug' => 'my-first-idea-1',
        ]);
    }

}

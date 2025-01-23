<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\Manufacturer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarSearchTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_method_returns_home_view_with_manufacturers()
    {
        $manufacturers = Manufacturer::factory()->count(5)->create();

        $response = $this->get('/');

        $response->assertViewIs('home');
        $response->assertViewHas('manufacturers');
        $this->assertCount(5, $response->viewData('manufacturers'));
    }

    public function test_search_method_returns_search_view_with_cars()
    {
        // Create a manufacturer
        $manufacturer = Manufacturer::factory()->create();
        // Create a car with the manufacturer
        $car = Car::factory()->create(['manufacturer_id' => $manufacturer->id]);
        $query = $car->model;

        $response = $this->get('/search?query='.$query);

        $response->assertViewIs('search');
        $response->assertViewHas('cars');
        $response->assertViewHas('query', $query);
        $this->assertCount(1, $response->viewData('cars'));
    }

    //$this->assertEquals($query, $response->viewData('query'));
    // $this->assertEquals($query, $response->original['query']);


    public function test_search_method_returns_empty_result_when_no_cars_match_query()
    {
        $query = 'non-existent-model';

        $response = $this->get('/search?query='.$query);

        $response->assertViewIs('search');
        $response->assertViewHas('cars');
        $response->assertViewHas('query', $query);
        $this->assertCount(0, $response->viewData('cars'));
    }

    public function test_search_method_returns_cars_from_manufacturer_name()
    {
        $manufacturer = Manufacturer::factory()->create();
        $car = Car::factory()->create(['manufacturer_id' => $manufacturer->id]);
        $query = $manufacturer->name;

        $response = $this->get('/search?query='.$query);

        $response->assertViewIs('search');
        $response->assertViewHas('cars');
        $response->assertViewHas('query', $query);
        $this->assertCount(1, $response->viewData('cars'));
    }

    public function test_search_method_returns_cars_from_model()
    {
        $manufacturer = Manufacturer::factory()->create();
        $car = Car::factory()->create(['manufacturer_id' => $manufacturer->id]);
        $query = $car->model;

        $response = $this->get('/search?query='.$query);

        $response->assertViewIs('search');
        $response->assertViewHas('cars');
        $response->assertViewHas('query', $query);
        $this->assertCount(1, $response->viewData('cars'));
    }

    public function test_search_method_returns_cars_from_year()
    {
        $manufacturer = Manufacturer::factory()->create();
        $car = Car::factory()->create(['manufacturer_id' => $manufacturer->id]);
        $query = $car->year;

        $response = $this->get('/search?query='.$query);

        $response->assertViewIs('search');
        $response->assertViewHas('cars');
        $response->assertViewHas('query', $query);
        $this->assertCount(1, $response->viewData('cars'));
    }

    public function test_search_method_returns_cars_from_color()
    {
        $manufacturer = Manufacturer::factory()->create();
        $car = Car::factory()->create(['manufacturer_id' => $manufacturer->id]);
        $query = $car->color;

        $response = $this->get('/search?query='.$query);

        $response->assertViewIs('search');
        $response->assertViewHas('cars');
        $response->assertViewHas('query', $query);
        $this->assertCount(1, $response->viewData('cars'));
    }
}

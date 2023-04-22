<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Evidence\StorageLocation;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class StorageLocationsTest extends TestCase
{
    use DatabaseTransactions;

    public function getToken()
    {
        $response = $this->post(
            'api/auth/login',
            ['email' => 'kolos@test.ru', 'password' => '12345678'],
            ['Accept' => 'application/json']
        );

        $body = json_decode($response->getContent(), true);
        return $body['access_token'];
    }

    public function test_index()
    {


        $response = $this->withToken($this->getToken())->get('api/storage-locations');

        $response->assertJsonStructure(
            [
                '*' => [
                    'id',
                    'division_id',
                    'name',
                    'created_at',
                    'updated_at',
                    'deleted_at',
                ]
            ]
        );

        $response->assertStatus(200);
    }


    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_show()
    {
        $response = $this->withToken($this->getToken())->get('api/storage-locations/1');

        $response->assertJsonStructure(
            [
                'id',
                'division_id',
                'name',
                'created_at',
                'updated_at',
                'deleted_at',
            ]
        );

        $response->assertStatus(200);
    }

    public function test_store()
    {
        $data = StorageLocation::factory()->make()->toArray();
        $response = $this->withToken($this->getToken())
            ->post('api/storage-locations', $data);

        $response->assertJsonStructure(
            [
                'id',
                'division_id',
                'name',
                'created_at',
                'updated_at',
                'deleted_at',
            ]
        );

        $response->assertStatus(201);
    }
}

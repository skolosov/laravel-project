<?php

namespace Tests\Unit;

use App\Services\EvidenceService;
use PHPUnit\Framework\TestCase;

class GetTypeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     * @throws \Exception
     */
    public function test_get_type()
    {
        $service = new EvidenceService();

        $this->assertTrue(!!$service->getType(random_int(1, 6)));
    }
}

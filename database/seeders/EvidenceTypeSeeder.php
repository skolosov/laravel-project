<?php

namespace Database\Seeders;

use App\Models\Evidence\Resources\Alcohol;
use App\Models\Evidence\Resources\Drug;
use App\Models\Evidence\Resources\Money;
use App\Models\Evidence\Resources\OtherEvidence;
use App\Models\Evidence\Resources\Transport;
use App\Models\Evidence\Resources\Weapon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Evidence\EvidenceType;

class EvidenceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EvidenceType::query()->create(
            ['name' => 'Алкоголь', 'table_name' => 'alcohols', 'model_namespace' => Alcohol::class]
        );
        EvidenceType::query()->create(
            ['name' => 'Наркотики', 'table_name' => 'drugs', 'model_namespace' => Drug::class]
        );
        EvidenceType::query()->create(
            ['name' => 'Деньги', 'table_name' => 'moneys', 'model_namespace' => Money::class]
        );
        EvidenceType::query()->create(
            ['name' => 'Транспорт', 'table_name' => 'transports', 'model_namespace' => Transport::class]
        );
        EvidenceType::query()->create(
            ['name' => 'Оружие', 'table_name' => 'weapons', 'model_namespace' => Weapon::class]
        );
        EvidenceType::query()->create(
            ['name' => 'Иные вещдоки', 'table_name' => 'other_evidences', 'model_namespace' => OtherEvidence::class]
        );
    }
}

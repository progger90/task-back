<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fakerOrigin = \Faker\Factory::create();
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));
        $v = $faker->vehicleArray();
        return [
            //'mark' => $faker->vin,  //$faker->text(10), //sentence(1),
            //'model' => $faker->firstNameMale,   //postcode,    //text(30),
            //'color' => $faker->colorName,

            'vin'               => $faker->vin,
            'registration_no'   => $faker->vehicleRegistration,
            'type'              => $faker->vehicleType,
            'fuel'              => $faker->vehicleFuelType,
            'mark'             => $v['brand'],
            'model'             => $v['model'],
            'year'              => $faker->biasedNumberBetween(1998,2017, 'sqrt'),
            'color'             => $fakerOrigin->colorName,
            'passenger_seats'   => $faker->vehicleSeatCount,
            'car_properties'    => json_encode($faker->vehicleProperties),
            'gear_box'          => $faker->vehicleGearBoxType,

        ];
    }
}

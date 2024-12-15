<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            [
                'name' => 'christian',
                'last_name' => 'algieri',
                'email' => 'chrialge@gmail.com',
                'birth_day' => '1999-12-31',
            ],
            [
                'name' => 'stefano',
                'last_name' => 'algieri',
                'email' => 'stefano@gmail.com',
                'birth_day' => '1996-11-22',
            ],
            [
                'name' => 'marcin',
                'last_name' => 'ciccio',
                'email' => 'marcin@gmail.com',
                'birth_day' => '1997-07-2',
            ],
            [
                'name' => 'Lorenzo',
                'last_name' => 'raffaeli',
                'email' => 'lollo@gmail.com',
                'birth_day' => '2001-03-18',
            ],
            [
                'name' => 'Francesco',
                'last_name' => 'rossi',
                'email' => 'chrialge@gmail.com',
                'birth_day' => '1998-10-23',
            ],
            [
                'name' => 'Paola',
                'last_name' => 'Luce',
                'email' => 'paola@gmail.com',
                'birth_day' => '2000-08-12',
            ],
        ];



        foreach ($customers as $customer) {
            $newCustomer = new Customer();
            $newCustomer->name = $customer['name'];
            $newCustomer->last_name = $customer['last_name'];
            $newCustomer->slug = Str::slug($customer['name']) . '-' . Str::slug($customer['last_name']);
            $count = Customer::where('slug', $newCustomer->slug)->count();

            if ($count > 0) {
                $newCustomer->slug = $newCustomer->slug . '-' . $count;
            }

            $newCustomer->birth_day = $customer['birth_day'];
            $newCustomer->email = $customer['email'];
            $newCustomer->save();
        }
    }
}

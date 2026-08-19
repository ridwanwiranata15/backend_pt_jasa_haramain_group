<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        //permission for posts
        Permission::create(['name' => 'customers.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'customers.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'customers.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'customers.delete', 'guard_name' => 'api']);

        //permission for categories
        Permission::create(['name' => 'services.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'services.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'services.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'services.delete', 'guard_name' => 'api']);

        //permission for sliders


        //permission for roles
        Permission::create(['name' => 'badals.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'badals.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'badals.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'badals.delete', 'guard_name' => 'api']);

        //permission for permissions
        Permission::create(['name' => 'permissions.index', 'guard_name' => 'api']);

        //permission for users
        Permission::create(['name' => 'users.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'users.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'users.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'users.delete', 'guard_name' => 'api']);

        //permission for products
        Permission::create(['name' => 'contents.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'contents.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'contents.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'contents.delete', 'guard_name' => 'api']);

        //permission for pages
        Permission::create(['name' => 'documents.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'documents.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'documents.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'documents.delete', 'guard_name' => 'api']);

        //permission for photos


        //permission for aparaturs
        Permission::create(['name' => 'document_details.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'document_details.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'document_details.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'document_details.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'document_orders.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'document_orders.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'document_orders.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'document_orders.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'foods.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'foods.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'foods.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'foods.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'food_orders.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'food_orders.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'food_orders.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'food_orders.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'guides.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'guides.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'guides.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'guides.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'guide_orders.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'guide_orders.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'guide_orders.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'guide_orders.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'handling_hotels.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'handling_hotels.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'handling_hotels.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'handling_hotels.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'handling_planes.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'handling_planes.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'handling_planes.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'handling_planes.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'hotels.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'hotels.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'hotels.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'hotels.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'money_exchanges.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'money_exchanges.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'money_exchanges.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'money_exchanges.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'orders.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'orders.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'orders.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'orders.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'price_list_hotels.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'price_list_hotels.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'price_list_hotels.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'price_list_hotels.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'price_list_planes.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'price_list_planes.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'price_list_planes.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'price_list_planes.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'transportations.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'transportations.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'transportations.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'transportations.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'routes.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'routes.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'routes.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'routes.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'tours.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'tours.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'tours.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'tours.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'transactions.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'transactions.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'transactions.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'transactions.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'transportation_orders.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'transportation_orders.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'transportation_orders.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'transportation_orders.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'travel_documents.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'travel_documents.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'travel_documents.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'travel_documents.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'type_hotels.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'type_hotels.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'type_hotels.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'type_hotels.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'wakafs.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'wakafs.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'wakafs.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'wakafs.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'wakaf_orders.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'wakaf_orders.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'wakaf_orders.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'wakaf_orders.delete', 'guard_name' => 'api']);

        Permission::create(['name' => 'wheel_chairs.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'wheel_chairs.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'wheel_chairs.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'wheel_chairs.delete', 'guard_name' => 'api']);


        Permission::create(['name' => 'wheel_chair_orders.index', 'guard_name' => 'api']);
        Permission::create(['name' => 'wheel_chair_orders.create', 'guard_name' => 'api']);
        Permission::create(['name' => 'wheel_chair_orders.edit', 'guard_name' => 'api']);
        Permission::create(['name' => 'wheel_chair_orders.delete', 'guard_name' => 'api']);
    }
}

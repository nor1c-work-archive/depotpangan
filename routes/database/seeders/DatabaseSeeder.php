<?php

namespace Database\Seeders;

use App\Models\Admin\Warehouse;
use Illuminate\Database\Seeder;
use Database\Seeders\CityTableSeeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $Warehouse = Warehouse::all();
        $WarehouseCount = $Warehouse->count();
        if ($WarehouseCount == 0)
        {
        
            Schema::disableForeignKeyConstraints();
            
            // Customers Seeders
            $this->call(CustomerTableSeeder::class);
            $this->call(CustomerAddressSeeder::class);
            
            // Supplier Seeder
            $this->call(SupplierTableSeeder::class);

            // Accounts Seeders
            $this->call(AccountSeeder::class);
            $this->call(DefaultAccountSeeder::class);
            
            // User & Permission Seeders
            $this->call(UserTableSeeder::class);
            $this->call(UserWarehouseTableSeeder::class);
            $this->call(RoleTableSeeder::class);
            $this->call(PermisssionTableSeeder::class);
            $this->call(AssignPermissionsTableSeeder::class);
            
            // Language & Currency Seeders
            $this->call(LanguageTableSeeder::class);
            $this->call(CurrencyTableSeeder::class);
            
            // Country, States, Tax, TimeZone Seeders
            $this->call(CountryTableSeeder::class);
            $this->call(StatesTableSeeder::class);
            $this->call(TaxTableSeeder::class);
            $this->call(TimezoneSeeder::class);

            // Warehouse, Purchaser Seeder
            $this->call(WarehouseTableSeeder::class);

            // Settings Seeder
            $this->call(SettingSeeder::class);
              
            
            
            
            // Payment Method and Shipping Seeder
            $this->call(PaymentMethodSeeder::class);
            $this->call(PaymentMethodSettingSeeder::class);
            $this->call(PaymentMethodDescriptionSeeder::class);
            $this->call(ShippingMethodTableSeeder::class);

            // Website Setting Seeders
            $this->call(SliderTypeSeeder::class);
            $this->call(SliderNavigationSeeder::class);
            $this->call(SlidersSeeder::class);
            $this->call(BannerSeeder::class);
            $this->call(PageTableSeeder::class);
            $this->call(ConstantBannerSeeder::class);
            $this->call(MenuBuilderTableSeeder::class);
            $this->call(HomeBannerTableSeeder::class);
            $this->call(HomePageBuilderSeeder::class);
            

            // Blog Seeders
            $this->call(BlogCategoriesSeeder::class);
            $this->call(BlogCategoryDetailSeeder::class);
            $this->call(BlogNewsSeeder::class);
            $this->call(BlogNewsDetailSeeder::class);

            // Units Seeders
            //$this->call(UnitsSeeder::class);
            //$this->call(UnitDetailSeeder::class);

            // Gallary Seeder
            $this->call(GallarySeeder::class);
            $this->call(GallaryDetailSeeder::class);
            $this->call(GallaryTagsSeeder::class);
            $this->call(TagsSeeder::class);

            // default data entry catalog seeders 
            
            $this->call(CategorySeeder::class);
            $this->call(CategoryDetailSeeder::class);
            $this->call(BrandSeeder::class);
            $this->call(AttributeSeeder::class);
            $this->call(VariationSeeder::class);
            // $this->call(VariableProductSeeder::class);
            // $this->call(SimpleProductSeeder::class);
            // $this->call(WishlistSeeder::class);

            // City Seeders
            $this->call(CityTableSeeder::class);
            
            // end
            
            

            \Artisan::call('key:generate');
            \Artisan::call('config:clear');
            \Artisan::call('config:cache');
            \Artisan::call('passport:install');
            \Artisan::call('passport:keys');
            Schema::enableForeignKeyConstraints();
           
        }    
    }
}

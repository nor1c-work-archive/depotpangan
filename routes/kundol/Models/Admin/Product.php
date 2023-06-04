<?php

namespace App\Models\Admin;

use App\Models\Admin\Setting;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\ProductDetail;
use Illuminate\Support\Facades\Gate;
use App\Models\Admin\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use SoftDeletes, HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_type', 'product_slug', 'video_url', 'gallary_id', 'price', 'discount_price', 'unit_id', 'product_weight', 'product_status', 'brand_id', 'tax_id', 'product_view', 'is_featured', 'product_min_order', 'product_max_order', 'seo_meta_tag', 'seo_desc', 'user_id', 'digital_file', 'created_by', 'updated_by', 'is_points','sku'
    ];

    public function scopeProductId($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeNotProductId($query, $id)
    {
        return $query->where('id', '!=', $id);
    }

    public function scopeActive($query)
    {
        return $query->where('product_status', 'active');
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('product_slug', $slug);
    }

    public function scopeGetProductDetailByLanguageId($query, $languageId)
    {
        return $query->with(['detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function scopeGetAttributeDetailByLanguage($query, $languageId)
    {
        return $query->with('product_attribute.attribute.attribute_detail', function ($querys) use ($languageId) {
            $querys->where('language_id', $languageId);
        });
    }

    public function scopeSortByProductDetail($query, $sortBy, $sortType, $languageId)
    {
        return $query->orderBy(ProductDetail::select($sortBy)
            ->whereColumn('product_detail.product_id', 'products.id')->where('language_id', $languageId), $sortType);
    }


    public function scopeSortByCategory($query, $sortBy, $sortType, $languageId)
    {
        return $query->whereHas('category', function($q) use ($sortBy, $sortType, $languageId){
            $q->orderBy(CategoryDetail::select($sortBy)
            ->whereColumn('product_category.category_id', 'category_detail.category_id')->where('language_id', $languageId), $sortType);
        });
        
        
        
    }

    public function scopeSortByTopSellingProduct($query, $sortBy, $sortType)
    {
        return $query->orderBy(TopSellingProduct::select($sortBy)
            ->whereColumn('top_selling_products.product_id', 'products.id'), $sortType);
    }



    public function scopeGetVariationDetailByLanguage($query, $languageId)
    {
        return $query->with('product_attribute.variation.variation.variation_detail', function ($querys) use ($languageId) {
            $querys->where('language_id', $languageId);
        });
    }

    public function scopeGetProductByPrice($query, $priceFrom, $priceTo)
    {
        $query->whereRaw('IF (`discount_price` > 0,`discount_price` >= '.$priceFrom.' && `discount_price` <= '.$priceTo.',`price` >= '.$priceFrom.' && `price` <= '.$priceTo.')');
        
        // whereBetween('price', [$priceFrom, $priceTo]);
        
        return $query->orWhereHas('product_combination', function($q) use ($priceFrom, $priceTo){
            $q->whereBetween('product_combination.price', [$priceFrom, $priceTo]);
        });
    }

    public function scopeGetCategoryDetailByLanguageId($query, $languageId)
    {
        return $query->with(['category.category.detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function scopeGetBarcodeCategoryDetailByLanguageId($query, $languageId)
    {
        return $query->with(['category.category.detail' => function ($q) use ($languageId) {
            $q->where('language_id', $languageId);
        }]);
    }

    public function scopeType($query)
    {
        $type = [];
        if (Gate::allows('isDigital')) {
            $type[] = 'digital';
        } else {
            $type[] = 'simple';
            $type[] = 'variable';
        }
        return $query->whereIn('product_type', $type);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function review()
    {
        return $this->hasMany('App\Models\Web\Review', 'product_id', 'id')->where('status', 'active');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Web\Comment', 'product_id', 'id');
    }

    public function tax()
    {
        return $this->belongsTo('App\Models\Admin\Tax', 'tax_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Admin\Brand', 'brand_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Admin\Unit', 'unit_id', 'id');
    }

    public function gallary()
    {
        return $this->belongsTo('App\Models\Admin\Gallary', 'gallary_id', 'id');
    }

    public function category()
    {
        return $this->hasMany('App\Models\Admin\ProductCategory', 'product_id', 'id');
    }

    public function detail()
    {
        return $this->hasMany('App\Models\Admin\ProductDetail', 'product_id', 'id');
    }

    public function top_selling()
    {
        return $this->hasOne('App\Models\Admin\TopSellingProduct', 'product_id', 'id');
    }

    public function product_attribute()
    {
        return $this->hasMany('App\Models\Admin\ProductAttribute', 'product_id', 'id');
    }

    public function product_combination()
    {
        return $this->hasMany('App\Models\Admin\ProductCombination', 'product_id', 'id');
    }

    public function productDetail()
    {
        return $this->hasMany('App\Models\Admin\ProductDetail', 'product_id', 'id');
    }

    public function productGallaryDetail()
    {
        return $this->hasMany('App\Models\Admin\ProductGallaryDetail', 'product_id', 'id');
    }

    public function stock()
    {
        $warehouse_id = Setting::type('pos', 'default_warehouse')->value('value');
        return $this->hasOne(AvailableQty::class, 'product_id', 'id')->where('warehouse_id', $warehouse_id);
    }

    //for csv export
    public function defaultLanguage()
    {
        $language = Language::where('is_default', 1)->first();
        return $language->id;
    }

    public function getProductName($id)
    {
        $product_detail = ProductDetail::where('product_id', $id)->where('language_id', $this->defaultLanguage())->first();
        $product_name = $product_detail->title;

        return $product_name;
    }

    public function getUnitName($id)
    {
        $product = Product::where('id', $id)->first();
        $unit_detail = UnitDetail::where('unit_id', $product->unit_id)->where('language_id', $this->defaultLanguage())->first();
        $unit_name = $unit_detail->name;

        return $unit_name;
    }

    public function getCategoryName($id)
    {
        $product_categories = ProductCategory::where('product_id', $id)->get();

        $cate_name = [];
        foreach ($product_categories as $product) {
            $cat = CategoryDetail::where('category_id', $product->category->id)
                                    ->where('language_id', $this->defaultLanguage())
                                    ->first();
            $cate_name[] = $cat->category_name; 
        }

        $list = implode(', ', $cate_name);

        return $list;
    }

    public function getAttributeName($id)
    {
        $product_attributes = ProductAttribute::where('product_id', $id)->get();

        $att_name = [];
        foreach ($product_attributes as $product) {
            $att = AttributeDetail::where('attribute_id', $product->attribute->id)
                                    ->where('language_id', $this->defaultLanguage())
                                    ->first();
            $var_name = [];
            $product_variation = ProductVariation::where('product_attribute_id', $product->id)->get();
            foreach ($product_variation as $variation) {
                    $variation = VariationDetail::where('variation_id', $variation->variation_id)->where('language_id', $this->defaultLanguage())->first();
                    $var_name[] = $variation->name;
            }

                                    // $attr_name[] = $product->attribute->name.'|'.$att->name;
            $attr_name = isset($product->attribute->attribute_detail[0]->name) ? $product->attribute->attribute_detail[0]->name : 'attribute not found';
            $att_name[] = $attr_name.'|'.implode('-',$var_name);
                                    // $product->attribute->name."|".
            // $att_name[] = $att->name;
        }

        $list = implode(', ', $att_name);

        return $list;
    }

    public function getCombinationsku($id)
    {
        $product_combinations = ProductCombination::where('product_id', $id)->get();

        $sku = [];
        foreach ($product_combinations as $product) {
            $sku[] = $product->sku;
        }

        $list = implode(', ', $sku);

        return $list;
    }

    public function getCombinationPrice($id)
    {
        $product_combinations = ProductCombination::where('product_id', $id)->get();

        $price = [];
        foreach ($product_combinations as $product) {
            $price[] = $product->price;
        }

        $list = implode(', ', $price);

        return $list;
    }

    public function getCombinationGallery($id)
    {
        $product_combinations = ProductCombination::where('product_id', $id)->get();

        $gallery_name = [];
        foreach ($product_combinations as $product) {
            $gallery = Gallary::where('id', $product->gallary_id)->first();
            $gallery_name[] = $gallery->name;
        }

        $list = implode(', ', $gallery_name);

        return $list;
    }

    public function getProductGallery($id)
    {
        $gallery_name = [];
        
        $product_galleries = ProductGallaryDetail::where('product_id', $id)->get();
        $product_first_img = Product::where('id', $id)->first();
        $gallery_name[] = $product_first_img->gallary->name;
        
        foreach ($product_galleries as $product) {
            $gallery = Gallary::where('id', $product->gallary_id)->first();
            $gallery_name[] = $gallery->name;
        }

        $list = implode(', ', $gallery_name);

        return $list;
    }

    public function getVariationName($id)
    {
        $product_combinations = ProductCombination::where('product_id', $id)->get();

        $variation_name_2 = [];
        foreach ($product_combinations as $product_combination) {
            $product_combination_dtl = ProductCombinationDtl::where('product_combination_id', $product_combination->id)->get();
            $variation_name = [];
            foreach ($product_combination_dtl as $combination_detail) {
                $variation = VariationDetail::where('variation_id', $combination_detail->variation_id)->where('language_id', $this->defaultLanguage())->first();

                $variation_name[] = $variation->name;


            }

            $variation_name_2[] = implode('-', $variation_name);
        }

        $list = implode(', ', $variation_name_2);

        return $list;
    }
    //end csv export

}

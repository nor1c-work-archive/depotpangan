<?php

namespace App\Http\Controllers\API\Admin;

use File;
use ZipArchive;
use App\Models\Admin\Tax;
use App\Models\Admin\Unit;
use App\Models\Admin\Brand;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\Admin\Gallary;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Language;
use App\Models\Admin\Attribute;
use App\Models\Admin\Variation;
use App\Models\Admin\UnitDetail;
use App\Models\Admin\ProductDetail;
use App\Http\Controllers\Controller;
use App\Models\Admin\CategoryDetail;
use App\Models\Admin\AttributeDetail;
use App\Models\Admin\ProductCategory;
use App\Models\Admin\VariationDetail;
use App\Models\Admin\ProductAttribute;
use App\Models\Admin\ProductVariation;
use App\Services\Admin\GallaryService;
use App\Models\Admin\ProductCombination;
use App\Models\Admin\ProductGallaryDetail;
use App\Models\Admin\ProductCombinationDtl;
use Image;

class ImportExportController extends Controller
{
    use ApiResponser;

    public function store(Request $request)
    {
      set_time_limit(5000);
          $zip = new ZipArchive;
          $path = $request->file("zip");
          $destination = public_path('gallary/');
          $destination2 = public_path('import/file/');

          // if directory dosnt not exist create directory
          if (!file_exists($destination)) { 
            mkdir($destination, 0777, true);
          }

          if (!file_exists($destination2)) {  
            mkdir($destination2, 0777, true);
          }

          if ($zip->open($path) === true) {
            for($i = 0; $i < $zip->numFiles; $i++) {
                $filename = $zip->getNameIndex($i);
                $fileinfo = pathinfo($filename);
                if ($fileinfo['dirname'] == 'images') {
                  copy("zip://".$path."#".$filename, $destination .$fileinfo['basename']);
                } else {
                  copy("zip://".$path."#".$filename, $destination2 .$fileinfo['basename']);
                }
            }
            $zip->close();

            $files = array_diff(scandir($destination), array('..', '.'));

            // \DB::beginTransaction();
            foreach ($files as $file) {
              $arr = explode(".", $file);
              $extension = strtolower(array_pop($arr));
              $image_name = $file;  

              // $destinationPath = public_path('/gallary');
              // $img = Image::make($image_name->path());
  
              $arr['name'] = $image_name;
              $arr['extension'] = 'image/' . $extension;
              $arr['user_id'] = \Auth::id();
              $arr['created_by'] = \Auth::id();
  
              $sql = new Gallary;
              $sql = $sql->create($arr);

            } 
            // try {

            // } catch (\Throwable $th) {
            //   // \DB::rollback();
            //   // return $this->errorResponse();
            // }

            // if ($sql) {
            //   $gallaryService = new GallaryService;
            //   $gallaryService->store($img, $destinationPath, $image_name, $sql->id);
            // }

            if($sql) {
              $product_file = fopen(public_path('import/file/products.csv'), "r");
              $skipFlag = true; //skip the first row of excel file
  
              // Fetching data from csv file row by row
              $total_product_variable = 0;
              $total_product_simple = 0;
              $total_new_category = 0;
              $total_new_attribute = 0;
              $total_new_variation = 0;
              $total_new_brand = 0;
              while ( ($data = fgetcsv($product_file,0,",")) !== FALSE )
              {
                if($skipFlag){
                  $skipFlag = false;
                  continue;
                }
                  if ($data[0] === 'variable' || $data[0] === 'Variable') {
                   
                    $get_first_img = explode(',',$data[4])[0];

                    $image = Gallary::where('name', $get_first_img)->pluck('id');

                    //brand
                    $brand = Brand::where('name', $data[9])->first();
                    $brand_id = '';
                    if ($brand) {
                      if ($brand->name == $data[9]) {
                        $brand_id = $brand->id;
                      }
                    } else {
                      $parms['name'] = $data[9];
                      $parms['brand_slug'] = $data[9];
                      $parms['created_by'] = \Auth::id();
                      $query = new Brand;
                      $brand = $query->create($parms);
                      $brand_id = $brand->id;
                      $total_new_brand++;
                    }
                    //tax
                    $tax = Tax::where('title', $data[10])->first();
                    $tax_id = '';
                    if ($tax) {
                      if ($tax->title == $data[10]) {
                        $tax_id = $tax->id;
                      }
                    } else {
                      $parms['title'] = $data[10];
                      $parms['description'] = $data[10];
                      $parms['created_by'] = \Auth::id();
                      $query = new Tax;
                      $tax = $query->create($parms);
                      $tax_id = $tax->id;
                    }
                    //unit
                    $unit = UnitDetail::where('name', $data[7])->first();
                    $unit_id = '';
                    if ($unit) {
                      if ($unit->name == $data[7]) {
                        $unit_id = $unit->unit_id;
                      }
                    } else {
                      $parms['created_by'] = \Auth::id();
                      $query = new Unit;
                      $unit = $query->create($parms);
                      $language = Language::all();
                      foreach ($language as $lan) {
                        $parms['unit_id'] = $unit->id;
                        $parms['name'] = $data[7];
                        $parms['language_id'] = $lan->id;
                        $query = new UnitDetail;
                        $unit = $query->create($parms);
                        $unit_id = $unit->unit_id;
                      }
                    }


                    //create product
                    $parms['product_type'] = $data[0];
                    $parms['sku'] = $data[2];
                    $parms['product_slug'] = $data[1];
                    $parms['video_url'] = $data[3];
                    $parms['gallary_id'] = $image[0];
                    $parms['price'] = $data[5];
                    $parms['discount'] = $data[6];
                    $parms['unit_id'] = $unit_id;
                    $parms['product_weight'] = $data[8];
                    $parms['brand_id'] = $brand_id;
                    $parms['tax_id'] = $tax_id;
    
                    $product = new Product;
                    $parms['created_by'] = \Auth::id();
                    $product = $product->create($parms);
                    $total_product_variable++;
                    
                    if ($product) {
                      //product detail
                      $language = Language::all();
                      foreach ($language as $lan) {
                        $parms['product_id'] = $product->id;
                        $parms['title'] = $data[1];
                        $parms['desc'] = $data[1];
                        $parms['language_id'] = $lan->id;
                        $query = new ProductDetail;
                        $query->create($parms);
                      }

                    //product gallary detail
                    $product_gallery =  $data[4];
                    $product_galleries = array_map('trim', explode(',', $product_gallery));
                    $firstElement = true;
                    $product_detail_gallary = '';
                    foreach($product_galleries as $product_image) {
                      if($firstElement) {
                        $firstElement = false;
                      }
                      $getImage = Gallary::where('name', $product_image)->first();
                      if ($getImage) {
                        if ($getImage->name == $product_image) {
                          $product_detail_gallary = $getImage->id;
                        } else {
                          //add gallery if dosnt exist
                          $arr = explode(".", $image);
                          $extension = strtolower(array_pop($arr));
                          $image_name = $image;  
                          $arr['name'] = $image_name;
                          $arr['extension'] = 'image/' . $extension;
                          $arr['user_id'] = \Auth::id();
                          $arr['created_by'] = \Auth::id();
              
                          $sql = new Gallary;
                          $sql = $sql->create($arr);
                          $product_detail_gallary = $sql->id;
                        }
                        $parms['product_id'] = $product->id;
                        $parms['gallary_id'] = $product_detail_gallary;
                        $query = new ProductGallaryDetail;
                        $query->create($parms);
                      }
                    }

                      //category
                      $categories = $data[11];
                      $categories = array_map('trim', explode(",", $categories));
                      $csv_cat = '';
                      foreach ($categories as $item) {
                        $category = CategoryDetail::where('category_name', $item)->first();
                        if ($category) {
                          if ($category->category_name == $item) {
                            $csv_cat = $category->category_id;
                          }
                        } else {
                          $parms['category_slug'] = $item;
                          $parms['created_by'] = \Auth::id();
                          $query = new Category;
                          $cat = $query->create($parms);
  
                          $language = Language::all();
                          foreach ($language as $lan) {
                            $parms['category_name'] = $item;
                            $parms['category_id'] = $cat->id;
                            $parms['language_id'] = $lan->id;
                            $catDetail = new CategoryDetail;
                            $new_cat =  $catDetail->create($parms);
                            $csv_cat = $new_cat->category_id;

                            $total_new_category++;
                          }
                        }
  
                        $parms['product_id'] = $product->id;
                        $parms['category_id'] = $csv_cat;
                        $query = new ProductCategory;
                        $query->create($parms);
                      }
                      
                    //get attributes from csv
                    $product_attributes =  $data[12];
                    $product_attributes =  array_map('trim', explode(',', $product_attributes));
                    
                    //get product combinations sku from csv
                    $product_combinations_sku =  $data[13];
                    $product_combinations_sku = array_map('trim', explode(',', $product_combinations_sku));
    
                    //get product combinations price from csv
                    $product_combinations_price =  $data[15];
                    $product_combinations_price = array_map('trim', explode(',', $product_combinations_price));
    
                    //get variation gallery from csv
                    $product_combinations_gallery =  $data[16];
                    $product_combinations_gallery = array_map('trim', explode(',', $product_combinations_gallery));
                    $product_combinations_gallery_id = [];
                    foreach ($product_combinations_gallery as $image) {
                      $getImage = Gallary::where('name', $image)->first();
                      if ($getImage) {
                        if ($getImage->name == $image) {
                          $product_combinations_gallery_id[] = $getImage->id;
                        }
                      } else {
                        //add gallery if dosnt exist
                        $arr = explode(".", $image);
                        $extension = strtolower(array_pop($arr));
                        $image_name = $image;  
                        $arr['name'] = $image_name;
                        $arr['extension'] = 'image/' . $extension;
                        $arr['user_id'] = \Auth::id();
                        $arr['created_by'] = \Auth::id();
            
                        $sql = new Gallary;
                        $sql = $sql->create($arr);
                        $product_combinations_gallery_id[] = $sql->id;
                      }
                    }
    
                    //get attributes, variations id and then store in product_attribute, product_variations
                    $product_attributes_and_variation =  $data[12];
                    $product_attributes_and_variation =  array_map('trim', explode(',', $product_attributes_and_variation));
                    $csv_attributes = '';
                    $csv_variations = '';
                    foreach ($product_attributes_and_variation as $item) {
                      $product_attributes =  array_map('trim', explode('|', $item));
                      $pro_attr = $product_attributes[0];
                      $product_variatin_name = $product_attributes[1];
                      $product_variatin_name =  array_map('trim', explode('-', $product_variatin_name));
    
                        $get_attribute = AttributeDetail::where('name', $pro_attr)->first();
                        if ($get_attribute) {
                          if ($get_attribute->name == $pro_attr) {
                              $csv_attributes = $get_attribute->attribute_id;
    
                          } 
                        }else {
                          //add attribute if not exist in db
                          $parms['created_by'] = \Auth::id();
                          $parms['updated_by'] = \Auth::id();
                          $attribute = new Attribute;
                          $attribute = $attribute->create($parms);
      
                          $language = Language::all();
                          foreach ($language as $lan) {
                            $parms['name'] = $pro_attr;
                            $parms['attribute_id'] = $attribute->id;
                            $parms['language_id'] = $lan->id;
                            $attributeDetail = new AttributeDetail;
                            $new_attribute =  $attributeDetail->create($parms);
                            $csv_attributes = $new_attribute->attribute_id;

                            $total_new_attribute++;
                          }
                        }
                        // then add attribute id in product attribute
                        $parms['product_id'] = $product->id;
                        $parms['attribute_id'] = $csv_attributes;
                        $product_attr = new ProductAttribute;
                        $product_attr_id = $product_attr->create($parms);
                        $product_attr_collection_id = $product_attr_id->id;
                      
                      foreach ($product_variatin_name as $variation_name) {
                        $get_variation = VariationDetail::where('name', $variation_name)->first();
                        $variation_id = '';
                        if ($get_variation) {
                          if ($get_variation->name == $variation_name) {
                            $csv_variations = $get_variation->variation_id;
                          }
                        } else {
                          //add variations if not exist
                          $parms['attribute_id'] = $csv_attributes;
                          $parms['created_by'] = \Auth::id();
                          $parms['updated_by'] = \Auth::id();
                          $variation = new Variation;
                          $variation = $variation->create($parms);
            
                          $language = Language::all();
                          foreach ($language as $lan) {
                            $parms['name'] = $variation_name;
                            $parms['variation_id'] = $variation->id;
                            $parms['language_id'] = $lan->id;
                            $variationDetail = new VariationDetail;
                            $new_variation =  $variationDetail->create($parms);
                            $variation_id = $new_variation->variation_id;
                            $csv_variations = $new_variation->variation_id;

                            $total_new_variation++;
                          }
    
                        }
                        //add variations id in product variation
                        $product_variation['product_attribute_id'] = $product_attr_collection_id;
                        $product_variation['variation_id'] = $csv_variations;
                        $query = new ProductVariation;
                        $query->create($product_variation);
    
                      }
                    } 
                    
                    //get these variations from product variation column csv
                    $product_variations =  $data[14];              
                    $product_variations = array_map('trim', explode(',', $product_variations));
                    $csv_variations = [];
                    $j = 0;
                    foreach ($product_variations as $item) {
                      //product combination
                      $ProductCombination = ProductCombination::create(
                        [
                            'product_id' => $product->id,
                            'sku' => $product_combinations_sku[$j],
                            'price' => $product_combinations_price[$j],
                            'gallary_id' => $product_combinations_gallery_id[$j],
                        ]
                      );
                      $explode = explode("-",$item);
                      foreach ($explode as $key => $value) {
                        $get_variation = VariationDetail::where('name', $value)->first();
                        $variation_id = '';
                        if ($get_variation) {
                          if ($get_variation->name == $value) {
                            $variation_id = $get_variation->variation_id;
                            $csv_variations[] = $get_variation->variation_id ;
                          }
                        }
                          //product combination detail
                          ProductCombinationDtl::insertOrIgnore(
                            [
                                'product_combination_id' => $ProductCombination->id,
                                'variation_id' => $variation_id,
                                'product_id' => $product->id,
                            ]
                          );
                      }
                      $j++;
                    }
                    }
                  } 
  
                  if ($data[0] == 'simple' || $data[0] == 'Simple') {

                    $get_first_img = explode(',',$data[4])[0];
                    $image = Gallary::where('name', $get_first_img)->pluck('id');

                    //brand
                    $brand = Brand::where('name', $data[9])->first();
                    if ($brand) {
                      if ($brand->name == $data[9]) {
                        $brand_id = $brand->id;
                      }
                    } else {
                      $parms['name'] = $data[9];
                      $parms['brand_slug'] = $data[9];
                      $parms['created_by'] = \Auth::id();
                      $query = new Brand;
                      $brand = $query->create($parms);
                      $brand_id = $brand->id;
                    }
                    //tax
                    $tax = Tax::where('title', $data[10])->first();
                    if ($tax) {
                      if ($tax->title == $data[10]) {
                        $tax_id = $tax->id;
                      }
                    } else {
                      $parms['title'] = $data[10];
                      $parms['description'] = $data[10];
                      $parms['created_by'] = \Auth::id();
                      $query = new Tax;
                      $tax = $query->create($parms);
                      $tax_id = $tax->id;
                    }
                    //unit
                    $unit = UnitDetail::where('name', $data[7])->first();
                    if ($unit) {
                      if ($unit->name == $data[7]) {
                        $unit_id = $unit->unit_id;
                      }
                    } else {
                      $parms['created_by'] = \Auth::id();
                      $query = new Unit;
                      $unit = $query->create($parms);
                      $language = Language::all();
                      foreach ($language as $lan) {
                        $parms['unit_id'] = $unit->id;
                        $parms['name'] = $data[7];
                        $parms['language_id'] = $lan->id;
                        $query = new UnitDetail;
                        $unit = $query->create($parms);
                        $unit_id = $unit->unit_id;
                      }
                    }
                    
                    //product
                    $parms['product_type'] = $data[0];
                    $parms['sku'] = $data[2];
                    $parms['product_slug'] = $data[1];
                    $parms['video_url'] = $data[3];
                    $parms['gallary_id'] = $image[0];
                    $parms['price'] = $data[5];
                    $parms['discount'] = $data[6];
                    $parms['unit_id'] = $unit_id;
                    $parms['product_weight'] = $data[8];
                    $parms['brand_id'] = $brand_id;
                    $parms['tax_id'] = $tax_id;
                    
                    $sql = new Product;
                    $parms['created_by'] = \Auth::id();
                    $sql = $sql->create($parms);
                    $total_product_simple++;
                    if ($sql) {
                      //product detail
                      $language = Language::all();
                      foreach ($language as $lan) {
                        $parms['product_id'] = $sql->id;
                        $parms['title'] = $data[1];
                        $parms['desc'] = $data[1];
                        $parms['language_id'] = $lan->id;
                        $query = new ProductDetail;
                        $query->create($parms);
                      }
                      //categories
                      $categories = $data[11];
                      $categories = array_map('trim', explode(",", $categories));
                      $csv_cat = '';
                      foreach ($categories as $item) {
                        $category = CategoryDetail::where('category_name', $item)->first();
                        if ($category) {
                          if ($category->category_name == $item) {
                            $csv_cat = $category->category_id;
                          }
                        } else {
                          //create if not exist
                          $parms['category_slug'] = $item;
                          $parms['created_by'] = \Auth::id();
                          $query = new Category;
                          $cat = $query->create($parms);
  
                          $language = Language::all();
                          foreach ($language as $lan) {
                            $parms['category_name'] = $item;
                            $parms['category_id'] = $cat->id;
                            $parms['language_id'] = $lan->id;
                            $catDetail = new CategoryDetail;
                            $new_cat =  $catDetail->create($parms);
                            $csv_cat = $new_cat->category_id;

                            $total_new_category++;
                          }
                        }
  
                        $parms['product_id'] = $sql->id;
                        $parms['category_id'] = $csv_cat;
                        $query = new ProductCategory;
                        $query->create($parms);
                      }
                      
                      
                    //product gallary detail
                      $product_gallery =  $data[4];
                      $product_galleries = array_map('trim', explode(',', $product_gallery));
                      $firstElement = true;
                      $product_detail_gallary = '';
                      foreach($product_galleries as $product_image) {
                        if($firstElement) {
                          $firstElement = false;
                        }
                        $getImage = Gallary::where('name', $product_image)->first();
                        if ($getImage) {
                          if ($getImage->name == $product_image) {
                            $product_detail_gallary = $getImage->id;
                          } else {
                            //add gallery if dosnt exist
                            $arr = explode(".", $image);
                            $extension = strtolower(array_pop($arr));
                            $image_name = $image;  
                            $arr['name'] = $image_name;
                            $arr['extension'] = 'image/' . $extension;
                            $arr['user_id'] = \Auth::id();
                            $arr['created_by'] = \Auth::id();
                
                            $new_gallery = new Gallary;
                            $new_gallery = $new_gallery->create($arr);
                            $product_detail_gallary = $new_gallery->id;
                          }
                          $parms['product_id'] = $sql->id;
                          $parms['gallary_id'] = $product_detail_gallary;
                          $query = new ProductGallaryDetail;
                          $query->create($parms);
                        }
                      }
                    }
                  }
              }
              fclose($product_file);
            } else {
              // \DB::rollback();
              return response()->json('something went wrong');
            }
            // \DB::commit();
            return response()
                  ->json([
                      'status' => 'Success',
                      'message' => 'Products have been import successfully',
                      'simple_products' => $total_product_simple,
                      'variable_products' => $total_product_variable,
                      'new_attributes' => $total_new_attribute,
                      'new_variations' => $total_new_variation,
                      'new_categories' => $total_new_category,
                      'new_brands' => $total_new_brand
            ], 200);
        }

    }

    public function export()
    {
      $destinationPath = public_path('export');
      File::delete($destinationPath.'/products.zip');
      
      $this->get_csv();

      $zip = new ZipArchive;
      $zip_name = 'export/products.zip';

      if ($zip->open(public_path($zip_name), \ZipArchive::CREATE)== TRUE)
      {
          $files = File::files(public_path('gallary/'));
          $file2 = public_path('export/products.csv');
          $zip->addEmptyDir("images");
          foreach ($files as $value){
              $path = public_path('gallary/');
              if(file_exists($path)){
                $relativeName = basename($value);
                $zip->addFile($value, 'images/'.$relativeName);
              }
              else{
                  echo"file does not exist";
              }
          }

          $zip->addFile($file2, 'products.csv');

          $zip->close();
      }

      unlink("export/products.csv");

      $headers = array(
        $_SERVER['SERVER_PROTOCOL'].' 200 OK',
        'Content-Type' => 'application/zip',
        'Content-Transfer-Encoding' => 'Binary',
        "Content-Length: ".filesize($zip_name),
        "Content-Disposition: attachment; filename=\"".basename($zip_name)."\"",
      );

      return response()
      ->json([
          'status' => 'Success',
          'message' => 'Export link created successfully',
          'data' => public_path('/').$zip_name
          ], 200); 
    }

    public function get_csv()
    {
      $products = Product::all();

      // these are the headers for the csv file. Not required but good to have one incase of system didn't recongize it properly
      $headers = array(
                'Content-Type' => 'text/csv'
              );

      //I am storing the csv file in public >> files folder. So that why I am creating files folder
      if (!File::exists(public_path()."/export")) {
          File::makeDirectory(public_path() . "/export");
      }

      //creating the download file
      $filename = public_path("export/products.csv");
      $handle = fopen($filename, 'w');

      //adding the first row
      fputcsv($handle, [
        "product_type",
        "product_name",
        "sku",
        "video_url",
        "gallary_id",
        "price",
        "discount_price",
        "unit_id",
        "product_weight",
        "brand_id",
        "tax_id",
        "product_categories",
        "products_attributes",
        "combination_sku",
        "product_variation",
        "variation_price",
        "variation_images"
      ]);

        //adding the data from the array
        foreach ($products as $product) {
          if ($product->product_type == 'variable') {
            fputcsv($handle, [
              $product->product_type,
              $product->getProductName($product->id),
              $product->sku,
              $product->video_url,
              $product->getProductGallery($product->id),
              $product->price,
              $product->discount_price ?? '',
              $product->getUnitName($product->id) ?? '',
              $product->product_weight ?? '',
              $product->brand->name ?? '',
              $product->tax->title ?? '',
              $product->getCategoryName($product->id),
              $product->getAttributeName($product->id),
              $product->getCombinationsku($product->id),
              $product->getVariationName($product->id),
              $product->getCombinationPrice($product->id),
              $product->getCombinationGallery($product->id),
          ]);

          } else {
            fputcsv($handle, [
              $product->product_type,
              $product->getProductName($product->id),
              $product->sku,
              $product->video_url,
              $product->getProductGallery($product->id),
              $product->price,
              $product->discount_price ?? '',
              $product->getUnitName($product->id) ?? '',
              $product->product_weight ?? '',
              $product->brand->name ?? '',
              $product->tax->title ?? '',
              $product->getCategoryName($product->id),
              $product->getAttributeName($product->id),
              $product->getCombinationsku($product->id),
              $product->getVariationName($product->id),
              $product->getCombinationPrice($product->id),
              // $product->getSingleProductGallery($product->id),
          ]);

          }
      }
      // return $cate;
      fclose($handle);

      //download command
      return response()->download($filename, "products.csv", $headers);
    }

    public function sample()
    {
      $file_path = public_path('sample/sample.zip');
      return response()
      ->json([
          'status' => 'Success',
          'message' => 'Sample link created successfully',
          'data' => $file_path
          ], 200); 
    }

    protected function curl( $url ) {

      if ( empty( $url) ) return false;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response);
    }

    private $api_url = 'https://api.themes-coder.com';

    public function verifyPurchaseCode(Request $request)
    {
      $request->validate([
        'purchase_code' => 'required',
      ]);

      $purchase_code = $request->purchase_code;
      // Check for empty fields
      if ( empty( $purchase_code ) ) {
        return false;
      }
      // Gets author data & prepare verification vars
      $purchase_code 	= urlencode( $purchase_code );
    //   $current_site_url = $_SERVER['REQUEST_URI'];
       $current_site_url = 'themes-coder.com';
      $url = $this->api_url. '/api.php?code=' . $purchase_code."&url=".$current_site_url;
      $response = $this->curl( $url );
      $messages = [
          'You have entered invalid purchase code. Please enter a valid purchase code!' =>'You have entered invalid purchase code. Please enter a valid purchase code!',
      ];
      if (isset($response->error) && $response->error == '404' ) {
        // return redirect()->back()->withInput($request->all())->withErrors($messages);
        return response()->json([
          'status' => 'error',
          'error' => $messages,
          'data' => $request->all()
        ]);

      }elseif(isset($response->id) and !empty($response->id)){
          $purchase_id = $response->id;
          $ids = array("31354329","31137293", "26827707", "26840547","20952416", "20757378", "22334657", "28681648", "27944998");

          if(!in_array($purchase_id,$ids)) {

            $messages = [
                'You have entered invalid purchase code. Please enter a valid purchase code!' =>'You have entered invalid purchase code. Please enter a valid purchase code!',
            ];
            return response()->json([
              'status' => 'error',
              'error' => $messages,
              'data' => $request->all()
            ]);
            // return redirect()->back()->withInput($request->all())->withErrors($messages);
          } else {
                return response()->json([
                    'status' => 'success',
                    'message' => 'valid purchase code',
                ]);
          }
      }else {
        return response()->json([
          'status' => 'error',
          'error' => $messages,
          'message' => 'in valid purchase code',
        ]);
      }
  }
}

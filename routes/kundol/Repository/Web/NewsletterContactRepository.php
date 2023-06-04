<?php

namespace App\Repository\Web;

use File;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Web\NewsletterContact;
use App\Contract\Web\NewsletterContactInterface;
use App\Http\Resources\Web\NewsletterContact as NewsletterContactResource;

class NewsletterContactRepository implements NewsletterContactInterface
{
    use ApiResponser;

    public function all()
    {
        try {
            if (isset($_GET['limit']) && is_numeric($_GET['limit']) && $_GET['limit'] > 0) {
                $numOfResult = $_GET['limit'];
            } else {
                $numOfResult = 100;
            }
            $news = new NewsletterContact;
            if (isset($_GET['searchParameter']) && $_GET['searchParameter'] != '') {
                $news = $news->searchParameter($_GET['searchParameter']);
            }
            $sortBy = ['id','name'];
            $sortType = ['ASC','DESC','asc','desc'];
            if (isset($_GET['sortBy']) && $_GET['sortBy'] != '' && isset($_GET['sortType']) && $_GET['sortType'] != '' && in_array($_GET['sortBy'],$sortBy) && in_array($_GET['sortType'],$sortType)) {
                $news = $news->orderBy($_GET['sortBy'],$_GET['sortType']);
            }

            return $this->successResponse(NewsletterContactResource::collection($news->paginate($numOfResult)) , 'Data Get Successfully!');
        } catch (\Throwable $e) {
            return $this->errorResponse();
        }

    }

    public function store($parms)
    {
        DB::beginTransaction();
        try {
            $sql = new NewsletterContact;
            $parms['created_by'] = Auth::id();
            $sql = $sql->create($parms);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->errorResponse();
        }

        if ($sql) {
            DB::commit();
            return $this->successResponse(new NewsletterContactResource($sql), 'news letter subscribed successfully');
        }
    }

    public function destroy($id)
    {
        try {
            $sql = NewsletterContact::findOrFail($id);
            $sql->delete();
        } catch (\Throwable $e) {
            return $this->errorResponse();
        }

        if ($sql) {
            return $this->successResponse('', 'NewsletterContact Delete Successfully!');
        } else {
            return $this->errorResponse();
        }
    }

    public function get_csv()
    {
        $newslettercontacts = NewsletterContact::all();

        // these are the headers for the csv file. Not required but good to have one incase of system didn't recongize it properly
        $headers = array(
                'Content-Type' => 'text/csv'
            );

        //I am storing the csv file in public >> files folder. So that why I am creating files folder
        if (!File::exists(public_path()."/export")) {
            File::makeDirectory(public_path() . "/export");
        }

        //creating the download file
        $filename = public_path("export/newslettercontact.csv");
        $handle = fopen($filename, 'w');

        //adding the first row
        fputcsv($handle, [
            "id",
            "name",
            "email",
            "date"
        ]);

        //adding the data from the array
        foreach ($newslettercontacts as $newsitem) {
            fputcsv($handle, [
                $newsitem->id,
                $newsitem->name,
                $newsitem->email,
                $newsitem->created_at,
            ]);
        }

        fclose($handle);

        $data = response()->download($filename, "newslettercontact.csv", $headers);
        //download command
        return response()->json([
            'status' => 'Success',
            'data' => $data
        ]);
    }
}

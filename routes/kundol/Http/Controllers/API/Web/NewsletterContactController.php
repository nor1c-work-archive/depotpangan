<?php

namespace App\Http\Controllers\API\Web;

use App\Contract\Web\NewsletterContactInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsletterContact;
use Illuminate\Http\Request;

class NewsletterContactController extends Controller
{
    private $newsletterContactRepository;

    public function __construct(NewsletterContactInterface $newsletterContactRepository)
    {
        $this->newsletterContactRepository = $newsletterContactRepository;   
    }

    public function index()
    {
        return $this->newsletterContactRepository->all();
    }

    public function store(NewsletterContact $request)
    {
        $parms = $request->all();
        return $this->newsletterContactRepository->store($parms);
    }

    public function destroy($id)
    {
        return $this->newsletterContactRepository->destroy($id);
    }

    public function get_csv()
    {
        return $this->newsletterContactRepository->get_csv();
    }
}

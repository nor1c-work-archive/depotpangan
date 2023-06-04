<?php

namespace App\Contract\Web;

interface NewsletterContactInterface
{
    public function all();
    
    public function store($parms);

    public function destroy($id);

    public function get_csv();
}
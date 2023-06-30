<?php

namespace App\Contract\Admin;

interface AuctionInterface {
    public function all();
    public function show($auction);
    public function store(array $parms);
    public function update(array $parms, $auction);
    public function destroy($auction);
}

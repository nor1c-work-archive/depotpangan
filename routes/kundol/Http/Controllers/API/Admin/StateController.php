<?php

namespace App\Http\Controllers\API\Admin;

use App\Models\Admin\State;
use App\Http\Requests\StateRequest;
use App\Contract\Admin\StateInterface;
use App\Repository\Admin\StateRepository;
use App\Http\Controllers\Controller as Controller;

class StateController extends Controller
{

    private $StateRepository;

    public function __construct(StateInterface $StateRepository)
    {
        $this->StateRepository = $StateRepository;
    }

    public function index()
    {
        return $this->StateRepository->all();
    }

    public function show(State $state)
    {
        return $this->StateRepository->show($state);
    }

    public function store(StateRequest $request)
    {
        $parms = $request->all();
        return $this->StateRepository->store($parms);
    }

    public function update(StateRequest $request, State $state)
    {
        $parms = $request->all();
        return $this->StateRepository->update($parms, $state);
    }

    public function destroy($id)
    {
        return $this->StateRepository->destroy($id);
    }
}

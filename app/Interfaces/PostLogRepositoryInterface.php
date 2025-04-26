<?php

namespace App\Interfaces;

interface PostLogRepositoryInterface
{
    public function postLogCreate($id, $action);
}
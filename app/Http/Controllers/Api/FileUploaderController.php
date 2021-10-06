<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Repositories\FileRepository;
use App\Traits\WebResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FileUploaderController extends ApiController
{
    private $fileRepository;

    public function __construct(FileRepository $repository)
    {
        $this->fileRepository = $repository;
    }

    /***
     * @param Request $request
     * @return WebResponse
     */
    public function post(Request $request)
    {
        try{
            return $this->successResponse(
                $this->fileRepository->upload($request),
                'successfully post image'
            );

        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return $this->errorResponse(
                '',
                $exception->getMessage()
            );
        }
    }

    /***
     * @param $request Request
     * @return WebResponse
     */
    public function remove(Request $request)
    {
        try{
            if ($this->fileRepository->remove($request)){
                return $this->successResponse(
                    $request->storage,
                    'successful remove file'
                );
            }

            return $this->errorResponse(
                null,
                'internal server error'
            );

        }catch (\Exception $exception){
            $this->errorResponse(
                null,
                $exception->getMessage()
            );
        }
        return $this->errorResponse(
            null,
            'internal server error'
        );
    }

    /***
     * @param Request $request
     * @return WebResponse
     */
    public function pull(Request $request)
    {
        try{
            return $this->successResponse(
                $this->fileRepository->pull($request),
                'success'
            );
        }catch (\Exception $exception){
            return $this->errorResponse(
                null,
                $exception->getMessage()
            );
        }
    }
}

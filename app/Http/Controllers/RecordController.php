<?php

namespace App\Http\Controllers;

use Exception;
use App\Traits\ResponseTraits;
use App\Services\RecordService;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\RecordRequests\RecordPostRequest;
use App\Http\Requests\RecordRequests\RecordIndexRequest;
use App\Http\Requests\RecordRequests\RecordUpdateRequest;

class RecordController extends Controller
{
    use ResponseTraits;

    /**
     * Display a listing of the resource.
     */
    public function index(RecordIndexRequest $request, RecordService $recordService)
    {
        try {
            $request = $request->validated();
            $records = $recordService->get($request);
            return $this->successResponse($records, 'Records get successfully');
        } catch (ValidationException $validationException) {
            return $this->validationErrorResponse($validationException);
        } catch (Exception $exception) {
            return $this->exceptionErrorResponse($exception);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecordPostRequest $request, RecordService $recordService)
    {
        try {
            $request = $request->validated();
            $record = $recordService->create($request);
            return $this->successResponse($record, 'Record create successfully');
        } catch (ValidationException $validationException) {
            return $this->validationErrorResponse($validationException);
        } catch (Exception $exception) {
            return $this->exceptionErrorResponse($exception);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id, RecordService $recordService)
    {
        try {
            $record = $recordService->show($id);
            return $this->successResponse($record, 'Record show successfully');
        } catch (ValidationException $validationException) {
            return $this->validationErrorResponse($validationException);
        } catch (Exception $exception) {
            return $this->exceptionErrorResponse($exception);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RecordUpdateRequest $request, $id, RecordService $recordService)
    {
        try {
            $request = $request->validated();
            $record = $recordService->update($request, $id);
            return $this->successResponse($record, 'Record update successfully');
        } catch (ValidationException $validationException) {
            return $this->validationErrorResponse($validationException);
        } catch (Exception $exception) {
            return $this->exceptionErrorResponse($exception);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id, RecordService $recordService)
    {
        try {
            $record = $recordService->delete($id);
            return $this->successResponse($record, 'Record delete successfully');
        } catch (ValidationException $validationException) {
            return $this->validationErrorResponse($validationException);
        } catch (Exception $exception) {
            return $this->exceptionErrorResponse($exception);
        }
    }
}
